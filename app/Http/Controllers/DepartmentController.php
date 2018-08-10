<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log, App\Department;

class DepartmentController extends Controller
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
        $query = Department::select();

        if ($request->has('search')) {

            $search = $request->search;

            $query->where(function($q) use($search) {
                $q->where('name', 'LIKE', "%{$search}%");
            });
        }

        $departments = $query->paginate(5);

        return view('department.index', compact('departments', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //input validation
        $request->validate([
            'name' => 'required'
        ]);

        Department::create($request->all());

        return redirect()->route('department.create')
                        ->with('success', 'The Department has been created.');
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
        $department = Department::findOrFail($id);

        return view('department.edit', compact('department'));
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
        $department = Department::findOrFail($id);

        //input validation
        $request->validate([
            'name' => 'required'
        ]);

        $department->update($request->all());

        return redirect()->route('department.edit', compact('department'))
                        ->with('success', 'The Department has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::destroy($id);

        return redirect()->route('department.index')
                        ->with('success', 'The Department has been deleted.');
    }
}
