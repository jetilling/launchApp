<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Uuid;

class EntranceCodeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('enterCode');
    }

    /**
     * Verify the provided code is correct and store the 
     * user's email.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function verifyCode(Request $request)
    {   
        $arguments = request()->validate([
            'email' => 'required',
            'code' => 'required',
            'first_name' => 'required'
        ]);
        
        if ($arguments['code'] === env('LAUNCH_CODE')) {

            $user = User::firstOrCreate(
                ['email'=>$arguments['email']],
                ['first_name'=>$arguments['first_name'], 'uuid'=>Uuid::generate(4)]
            );
            Auth::login($user, TRUE);
            return redirect('/build/basics');
        }
        dd('NOPE');
        
    }
}
