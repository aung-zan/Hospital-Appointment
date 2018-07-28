<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log, App\Client;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = '';
        $query = Client::select();

        if ($request->has('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($request) {
                $q->where('username', 'LIKE', "%{$request['search']}%")
                    ->orWhere('name', 'LIKE', "%{$request['search']}%")
                    ->orWhere('email', 'LIKE', "%{$request['search']}%");
            });
        }

        $clients = $query->paginate('5');

        return view('client.index', compact('clients', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // input vaidation
        $request->validate([
            'username'  => 'required',
            'email'     => 'required|email',
            'password'  => 'required|min:6',
        ]);

        Client::create($request->all());

        return redirect()->route('client.create')
                        ->with('success', 'The Client has been created.');
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
        $client = Client::findOrFail($id);

        return view('client.edit', compact('client'));
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
        $client = Client::findOrFail($id);

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

        $client->update($data);

        return redirect()->route('client.edit', compact('client'))
                        ->with('success', 'The Client has been updated.');
    }

    /**
     * Activate the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activate($id)
    {
        $client = Client::findOrFail($id);

        $client->deactivate = 0;
        $client->save();

        return redirect()->route('client.index')
                        ->with('success', 'The Client has been activated.');
    }

    /**
     * Deactivate the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deactivate($id)
    {
        $client = Client::findOrFail($id);

        $client->deactivate = 1;
        $client->save();

        return redirect()->route('client.index')
                        ->with('success', 'The Client has been deactivated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::destroy($id);

        return redirect()->route('client.index')
                        ->with('success', 'The Client has been deleted.');
    }
}
