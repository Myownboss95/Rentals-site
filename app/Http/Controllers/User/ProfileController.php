<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\LocationService;
use DB;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $user = User::find(auth()->user()->id);
         $service = new LocationService();
         $transactions = $user->transactions()->limit(6)->get();
         $referrals = $user->referrals()->get();
        //  dd($referrals);
         $hostname = $_SERVER['HTTP_HOST'].'/'; 
        // dd($hostname);
        //  dd($user);
         return inertia('user.profile.index', ['user'=>$user, 'countries' => $service->countries(), 'referrals'=>$referrals,
         'transactions'=>$transactions, 'hostname'=>$hostname]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::findOrFail(request()->user()->id);
        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:191'],
            'last_name' => ['required', 'string', 'max:191'],
            'phone' => ['required', 'string', 'max:191'],
            'country' => ['required', 'string', 'max:191'],
            // 'state' => ['required', 'string', 'max:191'],
            'city' => ['required', 'string', 'max:191'],
            'address' => ['required', 'string', 'max:191'],
            'zip_code' => ['required', 'string', 'max:191'],
        ]);
        DB::beginTransaction();
        try {
        $user->update($data);
        DB::commit();
        } catch(\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        session()->flash('success', 'Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
