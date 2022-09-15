<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tradeable;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TradeableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tradeables = Tradeable::latest();
        return inertia('admin.tradeables.index', [
            'tradeables' => $tradeables->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('admin.tradeables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'type' => ['required'],
        ]);

        Tradeable::create($data);

        return redirect()->route('admin.tradeables.index')->withSuccess('Asset created');
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
        $tradeable = Tradeable::findOrFail($id);
        return inertia('admin.tradeables.edit', compact('tradeable'));
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
        $data = $request->validate([
            'name' => ['required', Rule::unique('tradeables')->ignore($id)],
            'type' => ['required']
        ]);
        $tradeable = Tradeable::findOrFail($id);
        $tradeable->update($data);
        return redirect()->route('admin.tradeables.index')->withSuccess('Asset updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tradeable::where('id', $id)->delete();
        return back()->withSuccess('Asset deleted');
    }
}
