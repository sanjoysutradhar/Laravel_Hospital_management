<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect(){
        if(Auth::id()){
            if (Auth::user()->usertype=='0'){
                $doctor = doctor::all();
                return view('user.home',compact('doctor'));
            }
            else{
                return view('admin.home');
            }
        }
        else{
            return redirect()->back();
        }
    }
    public function index(){
        if(auth::id()){
           return redirect('home') ;
        }
        else{
            $doctor = doctor::all();
            return view('user.home',compact('doctor'));
        }
       
    }
}
