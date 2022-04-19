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
   public function approved($id) /* function to approve valid appointment requests*/
   {
      $data = appointment::find($id);
      $data->status='approved';
      $data->save();
      return redirect()->back();
   }
   public function canceled($id) /* function to cancel invalid appointment requests*/
   {
      $data = appointment::find($id);
      $data->status = 'Canceled';
      $data->save();
      return redirect()->back();
   }
   public function showdoctor() /* function to show doctor list*/
   {
       $data = doctor::all();
       return view('admin.showdoctor',compact('data'));
   }
   public function deletedoctor ($id) /**  function to delete doctor info from database */
   {
      $data = doctor::find($id);

      $data->delete();

      return redirect()->back();
   }
   public function updatedoctor($id) // function to show update doctor info option
   {
      $data=doctor::find($id);
      return view('admin.update_doctor', compact('data'));
   }
   /**
   *@group Update Doctor Information
   *
   *This function is used to update doctor information in the database
   *
   *@bodyParam $doctor->name for updating doctor name
   *@bodyParam $doctor->phone for updating doctor phone number
   *@bodyParam $doctor->speciality for updating doctor specialization
   *@bodyParam $doctor->room for updating doctor office room number
   *@bodyParam $image for updating doctor profile photo
   */
   public function editdoctor(Request $request, $id) /* function to update doctor info */
   {
      $doctor = doctor::find($id);

      $doctor->name = $request->name;

      $doctor->phone = $request->phone;

      $doctor->speciality = $request->speciality;

      $doctor->room = $request->room;

      $image=$request->file;

      if($image)
      {
         $imagename=time().'.'.$image->getClientOriginalExtension();

         $request->file->move('doctorimage',$imagename);

         $doctor->image=$imagename;

      }

      $doctor->save(); /*save updated info to the database*/

      return redirect()->back()->with('message','Doctor info updated succssfully');

   }
   public function emailview($id) /* function to show email notification sending option*/
   {
      $data=appointment::find($id);
      return view('admin.email_view',compact('data'));
   }
   public function sendemail(Request $request, $id) /*function to send user verification email*/
   {
      $data = appointment::find($id);

      $details=[
         'greeting'=> $request->greeting,
         'body'=> $request->body,
         'actiontext'=> $request->actiontext,
         'actionurl'=> $request->actionurl,
         'endpart'=> $request->endpart

      ];

      Notification::send($data, new SendEmailNotification($details) );
      return redirect()->back()->with('message', 'Emaild send');
   }


}
