<?php

namespace App\Http\Controllers;
use App\Models\user;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    
  public function login(request $request){
    $validate=$request->validate([
       'email'=>'required',
       'password'=>'required'
    ]);

    if (Auth::attempt($validate)) {
        $request->session()->regenerate();

        return redirect()->intended('dashboard');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');

// $data=[
//     'email'=>$email,
//     'pass'=>$pass,
// ];




  }



}
