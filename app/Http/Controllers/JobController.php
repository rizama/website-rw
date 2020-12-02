<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::all();

        $ret['jobs'] = $jobs;

        return view('admin.jobs.index', $ret);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jobs.create');
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
            'name.required' => 'Nama pekerjaan tidak boleh kosong.',
            'name.min' => 'Nama pekerjaan minimal 2 karakter.'
        ]);

        try {
            $job = new Job;
            $job->name = $request->name;
            $job->description = $request->description;
            $job->save();
    
            return redirect()->route('jobs.index')->with(['success' => 'Pekerjaan "' . $job->name . '" ditambahkan.']);
        } catch (\Exception $e) {
            return redirect()->route('jobs.index')->with(['error' => 'Tidak dapat melanjutkan proses']);
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
     * @param  \App\Job $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        $ret['job'] = $job;
        return view('admin.jobs.edit', $ret);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $this->validate($request, [
            'name' => 'required|string|min:2'
        ],[
            'name.required' => 'Nama pendidikan tidak boleh kosong.',
            'name.min' => 'Nama pendidikan minimal 2 karakter.'
        ]);

        try {
            $job->name = $request->name;
            $job->description = $request->description;
            $job->save();
    
            return redirect()->route('jobs.index')->with(['success' => 'Pekerjaan "' . $job->name . '" diubah.']);
        } catch (\Exception $e) {
            return redirect()->route('jobs.index')->with(['error' => 'Tidak dapat melanjutkan proses']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        try {
            $job->delete();

            return redirect()->route('jobs.index')->with(['success' => 'Pekerjaan "' . $job->name . '" dihapus.']);

        } catch (\exception $e) {
            return redirect()->route('jobs.index')->with(['error' => 'Tidak dapat melanjutkan proses']);
        }
    }
}
