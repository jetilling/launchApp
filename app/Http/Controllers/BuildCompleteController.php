<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuildCompleteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the Build Confirmation Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('buildComplete');
    }
}
