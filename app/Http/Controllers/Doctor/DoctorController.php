<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    //
    function create(Request $request){
        //validate inputs
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:doctors,email',
            'hospital' => 'required',
            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|min:5|max:30|same:password',
        ]);

        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->hospital = $request->hospital;
        $doctor->password = \Hash::make($request->password);

        $save = $doctor->save();

        if ($save) {
            return redirect()->back()->with('success', 'You are now registered succesfully as Doctor');
        }else{
            return redirect()->back()->with('fail', 'Something went wrong, fail to register');
        }
    }

    function check(Request $request){
        //inputs validation
        $request->validate([
            'email' => 'required|email|exists:doctors',
            'password' => 'required|min:5|max:30'
        ],[
            'email.exists' => 'This email dont exist in database' 
        ]);

        $creds = $request->only('email', 'password');

        if (Auth::guard('doctor')->attempt($creds)) {
           return redirect()->route('doctor.home');
        }else{
            return redirect()->route('doctor.login')->with('fail', 'Incorrect Credentials');
        }
    }

    function logout(){
        Auth::guard('doctor')->logout();
        return redirect('/');
    }
}
