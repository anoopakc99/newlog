<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Home;


class LoginController extends Controller
{
    public function index()
    {
       
        return view('loginpage');
    }

   

    public function login(Request $request){
        // validate data 
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // login code 

        if(\Auth::attempt($request->only('email','password'))){
            return redirect('dashboard');
        }

        return redirect('login')->withError('Login details are not valid');

        }

        public function dashboard()
        {
        $role = Auth::user()->role;
        if($role=='1')
        {
            $data = Home::all();
            return view('admin.dashboard', compact('data'));
           
        }
        else{
            return view('dashboard');
        }
    }

    public function logout(){
        \Session::flush();
        \Auth::logout();
        return redirect('');
    }

    //dashboard


}
