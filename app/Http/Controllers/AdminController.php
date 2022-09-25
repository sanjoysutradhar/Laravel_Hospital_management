<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addview(){
        //return response('<h1>Hello World</h1>');
        return view('admin.add_doctor');
    }

    public function upload(Request $request){
        $doctor=new doctor();
        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();//save with extension
        $request->file->move('DoctorImage',$imagename);//save to public -> DoctorImage folder
        $doctor->image=$imagename;
        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->speciality=$request->speciality;
        $doctor->room=$request->room;

        $doctor->save();

        return redirect()->back()->with('message','Doctor added successfully');

    }
}
