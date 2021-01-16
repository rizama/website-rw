<?php

namespace App\Http\Controllers;

use App\Person;
use App\Education;
use App\Economic;
use App\StatusCitizen;
use App\Job;
use App\Eviden;
use Illuminate\Http\Request;
use DB;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persons = Person::with('education', 'job', 'economic', 'status', 'eviden')->get();

        $ret['persons'] = $persons;

        return view('admin.persons.index', $ret);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $educations = Education::all();
        $jobs = Job::all();
        $economic = Economic::all();
        $status = StatusCitizen::all();

        $ret['educations'] = $educations;
        $ret['jobs'] = $jobs;
        $ret['economic'] = $economic;
        $ret['status'] = $status;

        return view('admin.persons.create', $ret);
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
            'name' => 'required|string|min:2',
            'rt' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'date_of_birth' => 'required',
            'place_of_birth' => 'required',
            'education' => 'required',
            'job' => 'required',
            'economic' => 'required',
            'status' => 'required',
            'address' => 'nullable',
            'eviden' => 'mimes:jpg,png,jpeg,pdf|max:2048'
        ],[
            'name.required' => 'Nama tidak boleh kosong.',
            'name.min' => 'Nama minimal 2 karakter.'
        ]);

        DB::beginTransaction();

        try {
            $person = new Person;

            $person->name = $request->name;
            $person->job_id = $request->job;
            $person->education_id = $request->education;
            $person->economic_conditions_id = $request->economic;
            $person->citizens_status_id = $request->status;
            $person->rt_number = $request->rt;
            $person->address = $request->address;
            $person->gender = $request->gender;
            $person->date_of_birth = $request->date_of_birth;
            $person->place_of_birth = $request->place_of_birth;
            $person->religion = $request->religion;
            $person->save();
            
            $personId = $person->id;

            $eviden = new Eviden;
            $evidenId = null;

            if($request->file()) {
                $file = $request->file('eviden');

                $fileName = time().'_'.$file->getClientOriginalName();
                $filePath = $file->storeAs('uploads', $fileName, 'public');

                $eviden->person_id = $personId;
                $eviden->type = $request->status;
                $eviden->file_name = time().'_'.$file->getClientOriginalName();
                $eviden->mime = $file->getMimeType();
                $eviden->save();

                $evidenId = $eviden->id;
            }
            
            $person->evidens_id = $evidenId;

            $person->save();

            DB::commit();
        
            return redirect()->route('persons.index')->with(['success' => 'Penduduk "' . $person->name . '" ditambahkan.']);
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return redirect()->route('persons.index')->with(['error' => 'Tidak dapat melanjutkan proses']);
        }

    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Person  $Person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        $ret['person'] = $person->load('education', 'job', 'economic', 'status', 'eviden');
        return view('admin.persons.show', $ret);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Person $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        $educations = Education::all();
        $jobs = Job::all();
        $economic = Economic::all();
        $status = StatusCitizen::all();

        $ret['educations'] = $educations;
        $ret['jobs'] = $jobs;
        $ret['economic'] = $economic;
        $ret['status'] = $status;

        $ret['person'] = $person->load('education', 'job', 'economic', 'status', 'eviden');
        // dd($ret['person']);
        return view('admin.persons.edit', $ret);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        $this->validate($request, [
            'name' => 'required|string|min:2',
            'rt' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'date_of_birth' => 'required',
            'place_of_birth' => 'required',
            'education' => 'required',
            'job' => 'required',
            'economic' => 'required',
            'status' => 'required',
            'address' => 'nullable',
            'eviden' => 'mimes:jpg,png,jpeg,pdf|max:2048'
        ],[
            'name.required' => 'Nama tidak boleh kosong.',
            'name.min' => 'Nama minimal 2 karakter.'
        ]);

        // dd($person, $request->all());

        DB::beginTransaction();

        try {

            $person->name = $request->name;
            $person->job_id = $request->job;
            $person->education_id = $request->education;
            $person->economic_conditions_id = $request->economic;
            $person->citizens_status_id = $request->status;
            $person->rt_number = $request->rt;
            $person->address = $request->address;
            $person->gender = $request->gender;
            $person->date_of_birth = $request->date_of_birth;
            $person->place_of_birth = $request->place_of_birth;
            $person->religion = $request->religion;
            $person->save();
            
            $personId = $person->id;
            
            if($request->file()) {
                $eviden = new Eviden;

                $file = $request->file('eviden');

                $fileName = time().'_'.$file->getClientOriginalName();
                $filePath = $file->storeAs('uploads', $fileName, 'public');

                $eviden->person_id = $personId;
                $eviden->type = $request->status;
                $eviden->file_name = time().'_'.$file->getClientOriginalName();
                $eviden->mime = $file->getMimeType();
                $eviden->save();

                $evidenId = $eviden->id;
                
                $person->evidens_id = $evidenId;
            }
            

            $person->save();

            DB::commit();
        
            return redirect()->route('persons.index')->with(['success' => 'Penduduk "' . $person->name . '" diubah.']);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('jobs.index')->with(['error' => 'Tidak dapat melanjutkan proses']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        try {
            $person->delete();

            return redirect()->route('persons.index')->with(['success' => 'Penduduk "' . $person->name . '" dihapus.']);

        } catch (\exception $e) {
            return redirect()->route('persons.index')->with(['error' => 'Tidak dapat melanjutkan proses']);
        }
    }
}
