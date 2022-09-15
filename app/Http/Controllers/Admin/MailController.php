<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\SendEmailMailable;
use Mail;
use Symfony\Component\Mailer\Messenger\SendEmailMessage;

class MailController extends Controller
{
    public function index()
    {
        $users = User::where('first_name', '!=', null)
            ->where('last_name', '!=', null)
            ->where('is_admin', false)
            ->get(['id', 'first_name', 'last_name', 'email', 'is_admin']);
        // dd($users);
        return inertia('admin.mail.send', compact('users'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'user' => ['required', 'numeric', 'exists:users,id'],
            'message' => ['required', 'string'],
            'attachment' => ['nullable', 'file',],
        ]);

        $user = User::find($request->input('user'));

        Mail::to($user)
            ->send(
                new SendEmailMailable(
                    $request->input('message'),
                    [$request->file('attachment')]
                )
            );
        session()->flash('success', 'Email sent successfully');
        return back();
    }
}
