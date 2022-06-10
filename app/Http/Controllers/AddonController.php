<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addon;
use App\Http\Requests\AddonStoreRequest;
use App\Http\Requests\PaymentUpdateRequest;

class AddonController extends Controller
{
    /**
     * Display all the addons.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addons = Addon::all();

        return view('admin.addon.index', compact('addons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\AddonStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddonStoreRequest $request)
    {
        $validated = $request->validated();
        Addon::create($validated);

        return redirect()->back()->with('flash_success', "New Addon saved!");
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
        $addon = Addon::find($id);

        return view('admin.addon.edit', compact('addon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PaymentUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentUpdateRequest $request, $id)
    {
        $updateAddon = Addon::find($id);
        $updateAddon->addon_title = $request->addon_title;
        $updateAddon->addon_price = $request->addon_price;
        $updateAddon->update();

        return redirect()->back()->with('flash_success', "Addon updated!");
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
