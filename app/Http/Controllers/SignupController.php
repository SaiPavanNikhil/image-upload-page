<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Signup;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function showForm()
    {
        return view('signup');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'Fname' => 'required|string|max:255',
            'Lname'=> 'required|string|max:255',
            'Uname'=> 'required|max:255',
            'Email'=> 'required|email|unique:signup,email',
            'Pass'=> 'required|min:8',
            'ConPass'=> 'required|same:Pass',
        ]);

        $array = [
            'first_name'=> $request->input('Fname'),
            'last_name'=> $request->input('Lname'),
            'Username' => $request->input('Uname'),
            'email'=> $request->input('email'),
            'password'=> Hash::make($request->Pass),
        ];
        print_r($array); 
        Signup::create($array);

        return redirect()->back();
    }
}
