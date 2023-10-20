<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use  Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function login(){
        // echo Hash::make('admin@123');
        // $2y$10$Re0wosGs3lUL2aaq2Oir2eMSiEc5J4/E7X7E1T/DrFzRivx.Bi4jK
        // exit();
        return view('admin.login');
    }
    public function makeLogin(Request $request){
        $data = array(
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'admin'
        );
            if(Auth::attempt($data)){
                return redirect()->route('admin.dashboard');
            }
            else{
                // return back()->withErrors(['message' =>'invalid email or password']);
                return back()->withErrors('invalid email or password');

            }
    }
    public function dashboard(){
        return view ('admin.dashboard');
    }
    public function logout(){
        Auth::logout();
        return redirect()-> route('admin.login');
    }
}
