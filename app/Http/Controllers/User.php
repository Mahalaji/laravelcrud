<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Auth;
use App\Models\Userdetails;
use App\Models\Login;
use Yajra\DataTables\Facades\DataTables;




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
     function updateprofile(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'mobilenumber' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required|integer',
            'country' => 'required',
            'address' => 'required',
        ]);
        $Userdetails = Userdetails::find($request->id); 
        
        if (!$Userdetails) {
            return redirect()->back()->withErrors(['error' => 'User not found']);
        }
    
        $Userdetails->first_name = $request->first_name;
        $Userdetails->last_name = $request->last_name;
        $Userdetails->gender = $request->gender;
        $Userdetails->email = $request->email;
        $Userdetails->mobilenumber = $request->mobilenumber;
        $Userdetails->city = $request->city;
        $Userdetails->state = $request->state;
        $Userdetails->pincode = $request->pincode;
        $Userdetails->country = $request->country;
        $Userdetails->address = $request->address;
        $Userdetails->password = $request->password;

    
        $Userdetails->save();
        session(['user' => $Userdetails]); 
    
        return redirect('/dashboard')->with('success', 'Profile updated successfully');
    }
    function adminpassword(Request $request){
        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
        ]);
        $user = Login::where('id', $request->id)->first();

        if ($user && $user->password == $request->oldpassword) {
            $user->update([
                'password'=>$request->newpassword
            ]);
            session(['user' => $user]); 
            return redirect('/dashboard');
        }
        
        return back()->withErrors(['password' => 'Invalid oldpassword'])->withInput();        
    }
    
    public function getUsersAjax(Request $request)
    {
        try {
            $query = Userdetails::select('id', 'first_name', 'gender', 'email', 'city', 'state', 'mobilenumber', 'country');
            return DataTables::of($query)
                ->addColumn('edit', function ($row) {
                    return '<a href="/edit-user/' . $row->id . '" class="btn btn-sm btn-primary">Edit</a>';
                })
                ->addColumn('delete', function ($row) {
                    return '<form action="/delete-user/' . $row->id . '" method="POST" onsubmit="return confirm(\'Are you sure?\');">
                                ' . csrf_field() . '
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>';
                })
                ->rawColumns(['edit', 'delete'])
                ->make(true);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
    public function edituser($id)
    {
        $user = Userdetails::find($id); 
    
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }
 
        if (!is_object($user)) {
            return redirect()->back()->with('error', 'Invalid user data');
        }
    
        return view('edituser', compact('user'));
    } 
    public function updateuserdetails(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'mobilenumber' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required|integer',
            'country' => 'required',
            'address' => 'required',
        ]);
    
        $Userdetails = Userdetails::find($request->id); 
        
        if (!$Userdetails) {
            return redirect()->back()->withErrors(['error' => 'User not found']);
        }
    
        $Userdetails->first_name = $request->first_name;
        $Userdetails->last_name = $request->last_name;
        $Userdetails->gender = $request->gender;
        $Userdetails->email = $request->email;
        $Userdetails->mobilenumber = $request->mobilenumber;
        $Userdetails->city = $request->city;
        $Userdetails->state = $request->state;
        $Userdetails->pincode = $request->pincode;
        $Userdetails->country = $request->country;
        $Userdetails->address = $request->address;
        $Userdetails->password = $request->password;

    
        $Userdetails->save();
    
        return redirect('/users')->with('success', 'User Details updated successfully');
    }
    public function deleteuser($id){
        $Userdetails = Userdetails::find($id); 

    if (!$Userdetails) {
        return redirect()->back()->withErrors(['error' => 'User not found']);
    }

    $Userdetails->delete();

    return redirect('/users')->with('success', 'User deleted successfully');
    }
  
}
