<?php

namespace App\Http\Controllers;

use App\StatusCitizen;
use Illuminate\Http\Request;

class StatusCitizenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = StatusCitizen::all();

        $ret['status'] = $status;

        return view('admin.status_citizens.index', $ret);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.status_citizens.create');
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
            'name.required' => 'Status warga tidak boleh kosong.',
            'name.min' => 'Status warga minimal 2 karakter.'
        ]);

        try {
            $status = new StatusCitizen;
            $status->name = $request->name;
            $status->description = $request->description;
            $status->save();
    
            return redirect()->route('status.index')->with(['success' => 'Status Warga "' . $status->name . '" ditambahkan.']);
        } catch (\Exception $e) {
            return redirect()->route('status.index')->with(['error' => 'Tidak dapat melanjutkan proses']);
        }

    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(StatusCitizen $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StatusCitizen $status_citizens
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusCitizen $status)
    {   
        $ret['status'] = $status;
        return view('admin.status_citizens.edit', $ret);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StatusCitizen $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusCitizen $status)
    {
        $this->validate($request, [
            'name' => 'required|string|min:2'
        ],[
            'name.required' => 'Status ekonomi tidak boleh kosong.',
            'name.min' => 'Status ekonomi minimal 2 karakter.'
        ]);

        try {
            $status->name = $request->name;
            $status->description = $request->description;
            $status->save();
    
            return redirect()->route('status.index')->with(['success' => 'Status Warga "' . $status->name . '" diubah.']);
        } catch (\Exception $e) {
            return redirect()->route('status.index')->with(['error' => 'Tidak dapat melanjutkan proses']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Economic $economic
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusCitizen $status)
    {
        try {
            $status->delete();

            return redirect()->route('status.index')->with(['success' => 'Status Warga "' . $status->name . '" dihapus.']);

        } catch (\exception $e) {
            return redirect()->route('status.index')->with(['error' => 'Tidak dapat melanjutkan proses']);
        }
    }
}
