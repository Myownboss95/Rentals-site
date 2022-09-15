<?php

namespace App\View\Components;

use App\Models\Settings;
use Illuminate\View\Component;

class LiveChat extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $setting = Settings::first();
        return view('components.live-chat', compact('setting'));
    }
}
