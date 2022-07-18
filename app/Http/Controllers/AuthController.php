<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function viewSignIn()
    {
        if(auth::check()){
            return redirect()->back();
        }
        return view('admin.login');
    }
    public function viewSignUp()
    {

        return view('admin.register');
    }
    public function adminSignUp(Request $request)
    {

        $password = bcrypt($request['password']);
        Admin::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$password,
            'level'=>$request->level,
        ]);
        return redirect()->route('admin.login');
    }
    public function adminSignIn(Request $request)
    {
        if(Auth::attempt([

            'email'=>$request->email,
            'password'=>$request->password,
        ]))
        {

            return redirect()->route('admin.index');
        }

        return redirect()->back();
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

}
