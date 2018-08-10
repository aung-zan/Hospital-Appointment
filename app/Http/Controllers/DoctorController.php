<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log, App\Doctor, App\Department;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = '';
        $departmentID = null;

        $departments = Department::orderBy('name')->pluck('id', 'name');
        $query = Doctor::select()->with('department');

        if ($request->has('search')) {
            $search = $request->search;

            $query->where(function($q) use($search) {
                $q->where('name', 'LIKE', "%{$search}%");
            });
        }

        if ($request->has('departmentSearch')) {
            $departmentID = $request->departmentSearch;

            $query->where(function($q) use($departmentID) {
                $q->where('department_id', $departmentID);
            });
        }

        $doctors = $query->paginate(5);

        return view('doctor.index', compact('doctors', 'search', 'departments', 'departmentID'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get days from constant.php
        $days = Config('constant.days');

        $departments = Department::orderBy('name')->pluck('id', 'name');

        return view('doctor.add', compact('departments', 'days'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validation($request);

        Doctor::create($request->all());

        return redirect()->route('doctor.create')
                        ->with('success', "The Doctor's informations has been saved.");
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
        // get days from constant.php
        $days = Config('constant.days');
        $doctor = Doctor::findOrFail($id);
        $departments = Department::orderBy('name')->pluck('id', 'name');

        return view('doctor.edit', compact('doctor', 'departments', 'days'));
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
        $doctor = Doctor::findOrFail($id);

        $this->validation($request);

        $doctor->update($request->all());

        return redirect()->route('doctor.edit', compact('doctor'))
                        ->with('success', "The doctor's informations has been updated.");
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

    /**
     * Validate the input request.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function validation(Request $request)
    {
        return $request->validate([
            'department_id'     => 'required',
            'name'              => 'required',
            'about'             => 'required',
            'date_from'         => 'required',
            'date_to'           => 'required',
            'start_time'        => 'required',
            'end_time'          => 'required',
        ]);
    }
}
