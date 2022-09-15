<?php

namespace App\Http\Controllers\Admin;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    //
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settings = Settings::first();
        return inertia('admin.settings.settings',compact('settings'));
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
            'phone' => ['required'],
            'email' => ['required', 'email'],
            'notification_email' => ['required', 'email'],
            'twitter' => ['nullable', 'url'],
            'facebook' => ['nullable', 'url'],
            'instagram' => ['nullable', 'url'],
            'chat_script' => ['nullable'],
        ]);
        DB::beginTransaction();
        try {
            Settings::create($valid);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        return redirect()->route('admin.settings.create')->withSuccess('Settings Saved successfully');
    }
    public function update(Request $request, Settings $setting) {

        $valid = $request->validate([
            'phone' => ['required'],
            'email' => ['required', 'email'],
            'notification_email' => ['required', 'email'],
            'twitter' => ['nullable', 'url'],
            'facebook' => ['nullable', 'url'],
            'instagram' => ['nullable', 'url'],
            'chat_script' => ['nullable'],
        ]);
        DB::beginTransaction();
        try {
        $setting->update($valid);
        DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return redirect()->route('admin.settings.create')->withSuccess('Settings Saved successfully');
    }


}
