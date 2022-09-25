<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
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

    public function appointment(Request $request){
        $data= new appointment;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->number;
        $data->date=$request->date;
        $data->message=$request->message;
        $data->doctor=$request->doctor;
        $data->status='In Progress';
        if(auth::id()){
            $data->user_id=Auth::user()->id;
        }
       $data->save();

       return redirect()->back()->with('message','Appointment added successfully. We contract with you soon');

    }
}
