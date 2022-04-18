<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use Notification;
use App\Notifications\SendEmailNotification;

/**
 * @group Admin Functionalities
 *
 * APIs to manage admin resources
 */

class AdminController extends Controller
{
   /**
    * Display of listing of the resources
    *
    *@return ResourceCollection
    */
   public function addview() /*function to show the interface of the 'Add Doctor' feature*/
   {
    return view('admin.add_doctor');
   }
   public function upload(Request $request) /* function to store the information of doctors into the database*/
   {
    $doctor = new doctor; /*create a variable for the database table 'doctor'*/

    $image = $request->file;
    $imageName = time().'.'.$image->getClientOriginalExtension();
    $request->file->move('doctorimage', $imageName);
    $doctor->image = $imageName;
/*
create variables for taking user inputs and storing
*/
    $doctor->name = $request->name;
    $doctor->phone = $request->number;
    $doctor->room = $request->room;
    $doctor->speciality = $request->speciality;

    $doctor->save(); // save doctor info to the database
    return redirect()->back()->with('message','Doctor Added Successfully');

   }
   public function showappointment() /*function to show requested appointment */
   {
      $data = appointment::all();
    return view('admin.showappointment', compact('data'));
   }
   
   public function approved($id)
   {
      $data=appointment::find($id);
      $data->status='approved';
      $data->save();
      return redirect()->back();
   }
   public function canceled($id)
   {
      $data=appointment::find($id);
      $data->status='Canceled';
      $data->save();
      return redirect()->back();
   }
    public function showdoctor()
   {
       $data=doctor::all();
       return view('admin.showdoctor',compact('data'));
   }
   public function deletedoctor ($id)
   {
      $data=doctor::find($id);

      $data->delete();

      return redirect()->back();
   }
   public function updatedoctor($id)
   {
      $data=doctor::find($id);
      return view('admin.update_doctor', compact('data'));
   }
   public function editdoctor(Request $request, $id)
   {
      $doctor=doctor::find($id);

      $doctor->name=$request->name;

      $doctor->phone=$request->phone;

      $doctor->speciality=$request->speciality;

      $doctor->room=$request->room;

      $image=$request->file;

      if($image)
      {
         $imagename=time().'.'.$image->getClientOriginalExtension();

         $request->file->move('doctorimage',$imagename);
   
         $doctor->image=$imagename;

      }

      $doctor->save();

      return redirect()->back()->with('message','Doctor info updated succssfully');

   }
