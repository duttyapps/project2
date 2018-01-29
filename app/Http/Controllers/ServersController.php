<?php

namespace App\Http\Controllers;

use App\Servers;
use Illuminate\Http\Request;

class ServersController extends Controller
{
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
        return view('panel.servers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $servers = new Servers;
        $servers->name = $request->get('name');
        $servers->host = $request->get('host');
        $servers->protocol = $request->get('protocol');
        $servers->username = $request->get('username');
        $servers->password = $request->get('password');
        $servers->deploy_path = $request->get('deploy_path');
        $servers->test_url = $request->get('test_url');

        $servers->save();

        if ($request->hasFile('key')) {
            $file = $request->file('key');

            $destinationPath = public_path('keys');
            $file->move($destinationPath, $servers->id . '.ppk');
        }

        $name = $request->get('name');
        return redirect('/deploys/create')->with('success', "Server $name created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
