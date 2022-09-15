<?php

namespace App\Http\Controllers\User;

use Validator;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class DepositController extends Controller
{
    public function index()
    {
        $query = Transaction::latest()
            ->where('user_id', auth()->user()->id)
            ->where('type', 'deposit');

        return inertia('user.deposits.index', [
            'deposits' => $query->paginate(),
        ]);
    }

    public function create()
    {
        $payment_methods = PaymentMethod::latest()->where('status', 1)->get();
        return inertia('user.deposits.deposit', [
            'payment_methods' => $payment_methods,
        ]);
    }

    public function validateDeposit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'method_id' => ['required'],
            'amount' => ['required', 'numeric'],
        ]);
        $method = PaymentMethod::findOrFail($request->input('method_id'));
        session()->flash('data', $method);

        if ($validator->fails()) {
            session()->flash('validated', false);
            return back()->withErrors($validator)->withInput();
        }
        session()->flash('validated', true);
        return back()->withInput();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => ['required', 'numeric'],
            'method_id' => ['required', 'numeric', 'exists:payment_methods,id'],
            'symbol' => ['required'],
            'proof' => ['required', 'mimes:png,jpg,jpeg,webp'],
        ]);

        if ($validator->fails()) {
            session()->flash('validated', true);
            return back()->withErrors($validator)->withInput();
        }

        $user = User::findOrFail(auth()->user()->id);

        $user->transactions()->create([
            'amount' => $request->input('amount'),
            'symbol' => strtoupper($request->input('symbol')),
            'options' => ['payment_method_id' => $request->input('method_id')],
            'image' => $this->uploadProof($request->file('proof')),
            'type' => 'deposit',
        ]);

        session()->flash('success', 'Deposit initiated successfully, waiting for approval.');

        return redirect()->route('user.deposits.index');
    }

    private function uploadProof(UploadedFile $file)
    {
        $filename = time() . $file->getClientOriginalName();
        Storage::disk('public')->putFileAs('deposit_proof', $file, $filename);
        return $filename;
    }
}
