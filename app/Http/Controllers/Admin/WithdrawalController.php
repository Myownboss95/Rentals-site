<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Withdrawal\Approved;
use App\Mail\Withdrawal\Declined;
use Mail;

class WithdrawalController extends Controller
{
    public function index()
    {
        $query = Transaction::latest()->where('type', 'withdrawal')->with('user');

        return inertia('admin.withdrawals.index', [
            'withdrawals' => $query->paginate(),
        ]);
    }


    public function approve($id)
    {
        $transaction = Transaction::findOrFail($id);
        $user = $transaction->user;
        $transaction->update([
            'status' => 'successful'
        ]);
        Mail::to($user)->send(new Approved($user, $transaction));
        session()->flash('success', 'Withdrawal approved');
        return back();
    }

    public function decline($id)
    {
        $transaction = Transaction::findOrFail($id);
        $user = $transaction->user;
        $transaction->update([
            'status' => 'failed'
        ]);
        Mail::to($user)->send(new Declined($user, $transaction));
        session()->flash('warning', 'Withdrawal declined');
        return back();
    }
}
