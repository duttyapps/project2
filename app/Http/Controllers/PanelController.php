<?php

namespace App\Http\Controllers;

use App\Deploys;
use App\Stacks;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index()
    {
        $stacks = Stacks::orderBy('name', 'asc')->get();
        $deploys = Deploys::orderBy('deploys.id', 'desc')->with('stacks')->paginate(10);
        return view('panel.index', ['stacks' => $stacks, 'deploys' => $deploys]);
    }
}