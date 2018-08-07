<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log, App\Client;

class ClientProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client', ['only' => ['edit', 'update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $profile = Client::findOrFail($id);

        return view('client_profile.edit', compact('profile'));
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
        $profile = Client::findOrFail($id);

        // input vaidation
        $request->validate([
            'username'  => 'required',
            'email'     => 'required|email',
            'password'  => 'nullable|min:6',
        ]);

        if ($request->password === null) {
            $data = $request->except('password');
        } else {
            $data = $request->all();
        }

        $profile->update($data);

        return redirect()->route('profile.edit', compact('profile'))
                        ->with('success', 'The Profile has been updated.');
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
