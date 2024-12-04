<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Userdetails;
use App\Models\Login;


use function Laravel\Prompts\select;

class User extends Controller
{
    function adduser(Request $request){
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'gender'=>'required',
            'email'=>'required',
            'password'=>'required',
            'confirmpassword'=>'required_with:password|same:password',
            'mobilenumber'=>'required',
            'city'=>'required',
            'state'=>'required',
            'pincode'=>'required|integer|',
            'country'=>'required',
            'address'=>'required'
        ]);
        $Userdetails=new Userdetails();
        $Userdetails->first_name=$request->first_name;
        $Userdetails->last_name=$request->last_name;
        $Userdetails->gender=$request->gender;
        $Userdetails->email=$request->email;
        $Userdetails->password=$request->password;
        $Userdetails->mobilenumber=$request->mobilenumber;
        $Userdetails->city=$request->city;
        $Userdetails->state=$request->state;
        $Userdetails->pincode=$request->pincode;
        $Userdetails->country=$request->country;
        $Userdetails->address=$request->address;
        $Userdetails->save();
        if($Userdetails){
            return redirect('/login');
        }
        else{
            return "not done";
        }

    }
   function loginvalidation(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
  

        $user = Login::where('email', $request->email)->first();

        if ($user && $user->password === $request->password) {
            session(['user' => $user]); 
            return redirect('/dashboard');
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }
}