<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Transaction\Approved;
use App\Mail\Transaction\Declined;
use App\Models\Deposit;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Mail;

class DepositController extends Controller
{
    public function index()
    {
        $deposits = Transaction::latest()->where('type', 'deposit')->with('user');

        return inertia('admin.deposits.index', [
            'deposits' => $deposits->paginate(),
        ]);
    } 

    public function approve($id)
    {
        $transaction = Transaction::findOrFail($id)?->load('user');
        $user = $transaction->user;
        $account = $user->accounts()->where('symbol', $transaction->symbol)->first();
        $account->account += $transaction->amount;
        $transaction->status = 'successful';
        $transaction->save();
        $account->save();
        Mail::to($user)->send(new Approved($user, $transaction));
        session()->flash('success', 'Deposit approved');
        return back();
    }

    public function decline($id)
    {
        $transaction = Transaction::findOrFail($id)?->load('user');
        $user = $transaction->user;
        $account = $user->accounts()->where('symbol', $transaction->symbol)->first();
        $transaction->status = 'failed';
        $transaction->save();
        $account->save();
        Mail::to($user)->send(new Declined($user, $transaction));
        session()->flash('warning', 'Deposit declined');
        return back();
    }
}
