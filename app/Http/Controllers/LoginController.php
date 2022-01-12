<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function form(){
        return view('login');
    }

    public function traitement(){

        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        $result = auth()->attempt([
            'email' => request('email'),
            'password' => request('password')
        ]);

        if($result)
        {
            return redirect('/index');
        }
        return back()->withInput()->withErrors([
            'email' => 'Your credentials are incorrect'
        ]);
    }
}
