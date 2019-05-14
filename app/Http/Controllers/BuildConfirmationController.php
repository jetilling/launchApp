<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use GuzzleHttp\Client;
use \App\ProjectDetails;

class BuildConfirmationController extends Controller
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
        $userUUID = Auth::user()->uuid;
        $project_id = Cache::get('project' . $userUUID);
        $project = ProjectDetails::where('id', $project_id)->first();

        return view('confirm', compact('project'));
    }

    /**
     * Display the Build Confirmation Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirm()
    {   
        $body = array("Name"=>request()['name'], "uniqueID"=>strval(time()));
        if (request()['frontend_framework'] == "react") {
            $body['useReact'] = true;
        } else {
            $body['useReact'] = false;
        }

        $client = new \GuzzleHttp\Client(["base_uri" => "http://10.0.1.189:8001"]);
        $options = ['json' => $body]; 
        $response = $client->post("/api/build-project", $options);

        echo $response->getBody();

    }
}
