<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MyHomeController extends Controller
{
    public function index(): View
    {
        return view('myhome.index');
    }

    public function indexForm():View
    {
        return view('myhome.indexForm');
    }
}
