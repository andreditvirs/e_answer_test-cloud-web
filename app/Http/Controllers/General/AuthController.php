<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('general.auth.index');
    }

    public function login(Request $request)
    {
        $rules = array(
            'username' => 'required|alphaNum|min:6',
            'password' => 'required|alphaNum|min:8'
        );
        $validator = Validator::make($request->all() , $rules);
        
        if ($validator->fails()){
            return redirect()->route('general.auth.index')->with('error', $validator->errors()->first());
        } else {
            $userdata = array(
                'username' => $request->get('username') ,
                'password' => $request->get('password')
            );
            
            if (Auth::attempt($userdata)){
                return redirect()->route('auth.dashboard.index');
            } else {
                return redirect()->route('general.auth.index');
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('general.auth.index');
    }
}