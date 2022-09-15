<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\Bot\ActivationRequest;
use App\Mail\Bot\ActivationRequested;
use App\Mail\Bot\TradeBotLinked;
use App\Models\Bot;
use App\Models\Settings;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Mail;

class BotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(auth()->user()->id);
        $bot = $user->bots()->first();
        return inertia('user.bots.index', [
            'bot' => $bot,
            'requested' => session()->pull('requested', false)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bots = Bot::latest()->get();
        return inertia('user.bots.link', [
            'bots' => $bots
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware('active');
        $request->validate([
            'bot_id' => ['required', 'exists:bots,id'],
        ]);

        $user = User::findOrFail(auth()->user()->id);
        $bot = Bot::findOrFail($request->input('bot_id'));
        $user->bots()->attach($bot);
        session()->flash('success', 'Bot linked to your account');
        return redirect()->route('user.bots.index');
    }


    public function requestActivation()
    {
        $user = User::findOrFail(auth()->user()->id);
        $bot = $user->bots()->first();
        $setting = Settings::first();
        $user->bots()->updateExistingPivot($bot->id, [
            'status' => 'requested'
        ]);

        if (optional($setting)->notification_email) {
            Mail::to($setting->notification_email)->send(new ActivationRequest($user, $bot));
        }
        Mail::to($user)->send(new ActivationRequested($user, $bot));
        return back()->with('requested', true);
    }


    public function activate(Request $request)
    {
        $request->validate([
            'token' => ['required', 'string']
        ]);

        if (!DB::table('bot_user')->where('token', $request->input('token'))->exists()) {
            session()->flash('error', 'Invalid activation token supplied');
            return back();
        }


        DB::table('bot_user')->where('token', $request->input('token'))->update([
            'status' => 'active'
        ]);


        session()->flash('success', 'Trade bot linked successfully');
        return back();
    }

    public function reactivate($id)
    {
        $updated = DB::table('bot_user')
        ->where('id', $id)
            ->update([
                'status' => 'active'
            ]);
        if (!$updated) {
            session()->flash('error', 'Failed to reactivate trade bot');
            return back();
        }
        session()->flash('success', 'Trade bot reactivated');
        return back();
    }

    public function deactivate($id)
    {
        $updated = DB::table('bot_user')
        ->where('id', $id)
            ->update([
                'status' => 'inactive'
            ]);
        if (!$updated) {
            session()->flash('error', 'Failed to deactivate trade bot');
            return back();
        }
        session()->flash('success', 'Trade bot deactivated');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bot  $bot
     * @return \Illuminate\Http\Response
     */
    public function edit(Bot $bot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bot  $bot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bot $bot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bot  $bot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bot $bot)
    {
        $user = User::findOrFail(auth()->user()->id);
        $user->bots()->detach();
        session()->flash('success', 'Bot unlinked');
        return back();
    }
}
