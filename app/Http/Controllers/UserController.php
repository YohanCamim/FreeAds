<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function form(){
        return view('register');
    }

    public function traitement(){

        request()->validate([
            'name' => ['required', 'min:5'],
            'email' => ['required', 'email'],
            'phonenumber' => ['required'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required']
        ]);
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'phonenumber' => request('phonenumber'),
            'password' => password_hash('password', PASSWORD_BCRYPT)
        ]);
    }

    public function index(){
        return view('profile');
    }
    public function majNameEmail(){

        $id = Auth::id();
        $validatedData = request()->validate([
            'newName' => ['required', 'min:5'],
            'newEmail' => ['required', 'email'],
            'newPhonenumber' => ['required']
        ]);
        
        User::whereId($id)->update([
            'name' => request('newName'),
            'email' => request('newEmail'),
            'phonenumber' => request('newPhonenumber')
        ]);

        return redirect('/profile');

    }

}
