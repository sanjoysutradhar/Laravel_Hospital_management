<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
// use Notification;

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
    public function show_appointments(){
        $appoint=Appointment::all();
        return view('admin.appointments',compact('appoint'));
    }

    public function approved($id){
        $data=Appointment::find($id);
        $data->status='Approved';
        $data->save();
        return redirect()->back();
    }
    public function canceled($id){
        $data=Appointment::find($id);
        $data->status='Canceled';
        $data->save();
        return redirect()->back();
    }
    public function show_doctors(){
        $data=Doctor::all();
        return view('admin.show_doctors',compact('data'));
    }
    public function delete_doctor($id){
        $data=Doctor::find($id);

        $data->delete();
        return redirect()->back();
    }
    public function update_doctor($id){
        $data=Doctor::find($id);
         return view('admin.update_doctor',compact('data'));
    }

    public function edit_doctor(Request $request,$id){
        $data=Doctor::find($id);
        $data->name=$request->name;
        $data->phone=$request->phone;
        $data->speciality=$request->speciality;
        $data->room=$request->room;
        $image=$request->file;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();//save with extension
            $request->file->move('DoctorImage',$imagename);//save to public -> DoctorImage folder
            $data->image=$imagename;
        }
        
        $data->save();

        return redirect()->back()->with('message','Doctor Details Updated successfully');
    }

    public function send_email($id){
        $data=Appointment::find($id);
        return view('admin.send_email',compact('data'));
    }
    public function sendmail(Request $request,$id){

        $data=Appointment::find($id);

        $details=[
            'greeting'=>$request->greeting,
            'body'=>$request->body,
            'actiontext'=>$request->actiontext,
            'actionurl'=>$request->actionurl,
            'endpart'=>$request->endpart,
        ];
        Notification::send($data,new SendEmailNotification($details));

        return redirect()->back()->with('message','Message sent successfully');
    }
}
 