<?php

namespace App\Http\Controllers;

use App\Deploys;
use App\Http\Requests\CreateDeployRequest;
use App\Notifications\TaskCompleted;
use App\Servers;
use App\Stacks;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class DeploysController extends Controller
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
        $servers = Servers::orderBy('name', 'asc')->get();
        $stacks = Stacks::orderBy('name', 'asc')->get();
        return view('panel.deploys.create', ['servers' => $servers, 'stacks' => $stacks]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDeployRequest $request)
    {
        $deploys = new Deploys;
        $deploys->name = $request->get('name');
        $deploys->git_url = $request->get('git_url');
        $deploys->git_branch = $request->get('git_branch');
        $deploys->stack_id = $request->get('stack_id');
        $deploys->server_id = $request->get('server_id');
        $deploys->save();

        $deploys->notify(new TaskCompleted($request->get('name')));

        // getting project files from git
        $command_line = 'git clone -b ' . $request->get('git_branch') . ' ' . $request->get('git_url') . ' ./gh';
        exec($command_line);
        /*$process = new Process($command_line);
        $process->run();

        $result = $process->getOutput();

        dd($command_line);*/

        $result = null;

        return redirect('/')->with(['success' => $result/*"Deployment $deploys->name created successfully!"*/, 'cmd_result' => $result]);
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
        //
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
        //
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
