<?php

namespace App\Http\Controllers;

use App\Economic;
use Illuminate\Http\Request;

class EconomicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $economics = Economic::all();

        $ret['economics'] = $economics;

        return view('admin.economic_conditions.index', $ret);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.economic_conditions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|min:2'
        ],[
            'name.required' => 'Status ekonomi tidak boleh kosong.',
            'name.min' => 'Nama pekerjaan minimal 2 karakter.'
        ]);

        try {
            $economic = new Economic;
            $economic->name = $request->name;
            $economic->description = $request->description;
            $economic->save();
    
            return redirect()->route('economics.index')->with(['success' => 'Status Ekonomi "' . $economic->name . '" ditambahkan.']);
        } catch (\Exception $e) {
            return redirect()->route('economics.index')->with(['error' => 'Tidak dapat melanjutkan proses']);
        }

    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Economic $economic
     * @return \Illuminate\Http\Response
     */
    public function edit(Economic $economic)
    {
        $ret['economic'] = $economic;
        return view('admin.economic_conditions.edit', $ret);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Economic $economic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Economic $economic)
    {
        $this->validate($request, [
            'name' => 'required|string|min:2'
        ],[
            'name.required' => 'Status ekonomi tidak boleh kosong.',
            'name.min' => 'Status ekonomi minimal 2 karakter.'
        ]);

        try {
            $economic->name = $request->name;
            $economic->description = $request->description;
            $economic->save();
    
            return redirect()->route('economics.index')->with(['success' => 'Status Ekonomi "' . $economic->name . '" diubah.']);
        } catch (\Exception $e) {
            return redirect()->route('economics.index')->with(['error' => 'Tidak dapat melanjutkan proses']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Economic $economic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Economic $economic)
    {
        try {
            $economic->delete();

            return redirect()->route('economics.index')->with(['success' => 'Status Ekonomi "' . $economic->name . '" dihapus.']);

        } catch (\exception $e) {
            return redirect()->route('economics.index')->with(['error' => 'Tidak dapat melanjutkan proses']);
        }
    }
}
