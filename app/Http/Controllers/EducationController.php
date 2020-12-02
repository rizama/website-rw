<?php

namespace App\Http\Controllers;

use App\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educations = Education::all();

        $ret['educations'] = $educations;

        return view('admin.educations.index', $ret);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.educations.create');
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
            'name.required' => 'Nama pendidikan tidak boleh kosong.',
            'name.min' => 'Nama pendidikan minimal 2 karakter.'
        ]);
        try {
            $education = new Education;
            $education->name = $request->name;
            $education->description = $request->description;
            $education->save();
    
            return redirect()->route('educations.index')->with(['success' => 'Pendidikan "' . $education->name . '" ditambahkan.']);
        } catch (\Exception $e) {
            return redirect()->route('educations.index')->with(['error' => 'Tidak dapat melanjutkan proses']);
        }

    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        $ret['education'] = $education;
        return view('admin.educations.edit', $ret);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Education $education)
    {
        $this->validate($request, [
            'name' => 'required|string|min:2'
        ],[
            'name.required' => 'Nama pendidikan tidak boleh kosong.',
            'name.min' => 'Nama pendidikan minimal 2 karakter.'
        ]);
        try {   
            $education->name = $request->name;
            $education->description = $request->description;
            $education->save();
    
            return redirect()->route('educations.index')->with(['success' => 'Pendidikan "' . $education->name . '" diubah.']);
        } catch (\Exception $e) {
            return redirect()->route('educations.index')->with(['error' => 'Tidak dapat melanjutkan proses']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        try {
            $education->delete();

            return redirect()->route('educations.index')->with(['success' => 'Pendidikan "' . $education->name . '" dihapus.']);

        } catch (\exception $e) {
            return redirect()->route('educations.index')->with(['error' => 'Tidak dapat melanjutkan proses']);
        }
    }
}
