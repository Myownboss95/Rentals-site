<?php

namespace App\Http\Controllers\Admin;

use DB;
use Str;
use Mail;
use App\Models\Bot;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Mail\Bot\SendActivationToken;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Builder;

class BotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $bots = Bot::latest()->paginate();
        return inertia('admin.bots.index', [
            'bots' => $bots
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('admin.bots.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => ['required', 'string', 'unique:bots'],
            // 'description' => ['required', 'string'],
            'profit_percentage' => ['required', 'numeric'],
            'loss_percentage' => ['required', 'numeric'],
            'trades_per_day' => ['required', 'numeric', 'max:4']
        ]);

        
        Bot::create($valid);
        return Redirect::back()->withErrors(['msg' => 'Added to Cart']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bot  $bot
     * @return \Illuminate\Http\Response
     */
    public function show(Bot $bot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bot  $bot
     * @return \Illuminate\Http\Response
     */
    public function edit(Bot $bot)
    {
        return inertia('admin.bots.edit', [
            'bot' => $bot
        ]);
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
        $valid = $request->validate([
            'name' => ['required', 'string', Rule::unique('bots')->ignore($bot)],
            // 'description' => ['required', 'string'],
            'profit_percentage' => ['required', 'numeric'],
            'loss_percentage' => ['required', 'numeric'],
            'trades_per_day' => ['required', 'numeric']
        ]);

        $bot->update($valid);
        session()->flash('success', 'Bot updated successfully');
        return redirect()->route('admin.bots.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bot  $bot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bot $bot)
    {
        $bot->delete();
        return redirect()->route('admin.bots.index');
    }

    public function showBotActivationRequest()
    {

        $requests = DB::table('bot_user')
        ->where('bot_user.status', 'requested')
        ->join('bots', 'bot_user.bot_id', 'bots.id')
        ->join('users', 'bot_user.user_id', 'users.id')
        ->select([
            'bot_user.*',
            'bots.name AS bot_name',
            'users.first_name',
            'users.last_name',
            'users.email',
            'users.image'
        ])->paginate();

        return inertia('admin.bots.activation', [
            'requests' => $requests
        ]);
    }

    public function generateBotActivationToken($id)
    {
        DB::table('bot_user')->where('id', $id)->update([
            'token' => Str::random(12),
        ]);
        $payload = DB::table('bot_user')
        ->where('bot_user.id', $id)
            ->join('users', 'bot_user.user_id', 'users.id')
            ->select('bot_user.*', 'users.email', 'users.first_name', 'users.id')
            ->first();
        Mail::to($payload->email)->send(new SendActivationToken($payload));
        session()->flash('success', 'Activation Token Generated and sent to user\'s email');
        return back();
    }
}
