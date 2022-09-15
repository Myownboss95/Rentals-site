<?php

namespace App\Http\Controllers\Admin;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use function Pest\Laravel\get;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        //
        $paymentMethod = PaymentMethod::latest();
        return inertia('admin.payment.index', [
            'payment' => $paymentMethod->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return inertia('admin.payment.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => ['required', Rule::unique('payment_methods')],
            'status' => ['required'],
            'wallet' => ['required', 'string'],
            'symbol' => ['required', 'string'],
            'roi' => ['required', 'numeric'],
            'image' => ['required','mimes:png,jpg,jpeg'],
            'svg' => ['required','mimes:png,jpg,jpeg']
        ]);

        PaymentMethod::create(array_merge($data, [
            'symbol' => strtoupper($request->input('symbol')),
            'image' => $this->uploadFile($request),
            'svg' => $this->uploadLogo($request)
        ]));

        return redirect()->route('admin.payment-method.index')->withSuccess('Asset created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentMethod $paymentMethod )
    {
        //
        // $paymentMethod = PaymentMethod::findOrFail($id);
        // dd($paymentMethod);
        return inertia('admin.payment.edit', ['payment' => $paymentMethod]);
    }

    private function uploadFile(Request $request)
    {
        if(!$request->hasFile('image')) return null;
        $uploadedFile = $request->file('image');
        $filename = time().$uploadedFile->getClientOriginalName();

        Storage::disk('public')->putFileAs(
            'payment_methods',
          $uploadedFile,
          $filename
        );
        return $filename;
    }
    private function uploadLogo(Request $request)
    {
        if(!$request->hasFile('svg')) return null;
        $uploadedFile = $request->file('svg');
        $filename = time().$uploadedFile->getClientOriginalName();

        Storage::disk('public')->putFileAs(
            'payment_methods',
          $uploadedFile,
          $filename
        );
        return $filename;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        //
        // dd($request->all());
        $data = $request->validate([
            'name' => ['required', Rule::unique('payment_methods')->ignore($paymentMethod)],
            'status' => ['required'],
            'wallet' => ['required', 'string'],
            'symbol' => ['required', 'string'],
            'roi' => ['required', 'numeric'],
         ]);

        $file = $this->uploadFile($request);
        is_null($file) ?: $data['image'] = $file;


        $svg = $this->uploadLogo($request);
        is_null($svg) ?: $data['svg'] = $svg;

        // if($this->uploadFile($request) == null){
        //     $paymentMethod->update($data);
        //     return redirect()->route('admin.payment-method.index')->withSuccess('Asset updated');
        // }
        $accounts = Account::where('coin_id', $request->id)->get();
        $accountsData = [
            'type' => $data['name'],
            'status' => $data['status'],
            'symbol' => $data['symbol'],
        ];
         is_null($file) ? 'yes': $accountsData['image'] = $file;
         is_null($svg) ?'yes': $accountsData['svg'] = $svg;

        DB::beginTransaction();
        try {
            $paymentMethod->update($data);
            foreach($accounts as $account){
                $acc = Account::find($account->id);
                // dd(count($accounts));
                $acc->update($accountsData);
            }
           
            DB::commit();
        } catch (\Throwable $th) { 
            DB::rollBack();
            throw $th;
        }
        
        
        return redirect()->route('admin.payment-method.index')->withSuccess('Asset updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        PaymentMethod::where('id', $id)->delete();
        return back()->withSuccess('Asset deleted');
    }
}
