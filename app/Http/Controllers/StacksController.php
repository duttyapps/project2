<?php

namespace App\Http\Controllers;

use App\Deploys;
use App\Http\Requests\CreateStacksRequest;
use App\Stacks;
use Illuminate\Http\Request;

class StacksController extends Controller
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
        return view('panel.stacks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStacksRequest $request)
    {
        $stacks = new Stacks;
        $stacks->name = $request->get('name');
        $stacks->save();

        return redirect('/')->with('success', 'Stack {$stacks->name} created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        session(['stack_id' => $id]);
        $stacks = Stacks::orderBy('name', 'asc')->get();
        $deploys = Deploys::where('stack_id', $id)->orderBy('deploys.id', 'desc')->with('stacks')->get();
        return view('panel.index', ['stacks' => $stacks, 'deploys' => $deploys]);
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
