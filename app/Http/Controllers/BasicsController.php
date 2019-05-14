<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use \App\ProjectDetails;

class BasicsController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the Build Basics Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('build');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $arguments = request()->validate([
            'name' => ['required', 'min:2'],
            'frontend_framework' => 'required',
            'routing' => 'required',
            'project_type' => 'required'
        ]);

        $userUUID = Auth::user()->uuid;
        $arguments["user_uuid"] = $userUUID;

        $project = ProjectDetails::create($arguments);

        Cache::put('project' . $userUUID, $project->id);

        return response()->json([
            'success' => true
        ]);
    }

    
}
