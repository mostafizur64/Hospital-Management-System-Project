<?php

namespace App\Http\Controllers;

use Str;
use App\Models\Doctor;
use App\Models\Speciality;
use App\Models\Appointment;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
// use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\Types\Null_;
use Notification;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // ================Create doctor page==
    public function AddDoctor()
    {
        return view('doctor.create');
    }
    // ============Store Doctors page===========
    public function Store(Request $request)
    {


        $request->validate([
            'name' => 'required|unique:doctors,name',
            'email' => 'required',
            'phone' => 'required',
            'room_no' => 'required',
            'image' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $imagae = $request->file('image');
            $imange_name = hexdec(uniqid()) . '.' . $imagae->getClientOriginalExtension();
            Image::make($request->file('image'))->resize(320, 240)
                ->save('uploads/doctors_photo/' . $imange_name);
            $img_url = 'uploads/doctors_photo/' . $imange_name;
        }


        Doctor::insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'room_no' => $request->room_no,
            'image' => $img_url,
        ]);



        return redirect()->back()->with('doctors_info', 'Doctors Information added Successfully!');
    }
    // ===========Doctors view part=================
    public function index()
    {

        $speacilitys = Speciality::latest()->get();
        $doctors = Doctor::latest()->get();
        return view('doctor.index', compact('doctors', 'speacilitys'));
    }
    // ============Doctor edit part are here ====================

    public function edit($doctor_id)
    {
        $doctor_info = Doctor::findorFail($doctor_id);
        return view('doctor.edit', compact('doctor_info'));
    }
    // ==============Doctor info update are here===================
    public function update(Request $request, $id)
    {
        $old_imagess = $request->old_image;
        if ($request->hasFile('image')) {
            unlink($old_imagess);
            $imagae = $request->file('image');
            $imange_name = hexdec(uniqid()) . '.' . $imagae->getClientOriginalExtension();
            Image::make($request->file('image'))->resize(320, 240)
                ->save('uploads/doctors_photo/' . $imange_name);
            $img_url = 'uploads/doctors_photo/' . $imange_name;
        }

        Doctor::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'room_no' => $request->room_no,
            'image' => $img_url,
        ]);
        return back()->with('doctorINfoUpdated', 'Doctor info are updated successfully!');
    }
    // ===================doctor info are deleted here===========
    public function deleted($id)
    {
        $images = Doctor::findOrFail($id);
        $image_deleted = $images->image;
        unlink($image_deleted);
        Doctor::findOrFail($id)->delete();
        return back()->with('doctorINfodeleted', 'Doctor info are Deleted successfully!');
    }


    // ===============Doctors speciality added===================
    public function speciality()
    {
        return view('doctor.speciality');
    }
    // ===========Doctors Appointment store===========
    public function AppintmentStore(Request $request)
    {
        $request->validate([
            'client_name' => 'required',
            'email' => 'required',
            'date' => 'required',
            'doctor_name' => 'required',
            'number' => 'required',
            'message' => 'required',
        ]);
        $appointment = new Appointment();
        $appointment->client_name = $request->client_name;
        $appointment->email = $request->email;
        $appointment->date = $request->date;
        $appointment->doctor_name = $request->doctor_name;
        $appointment->number = $request->number;
        $appointment->message = $request->message;
        $appointment->status = 'In Progress';
        if (Auth::id()) {
            $appointment->user_id = Auth::user()->id;
        }


        $appointment->save();
        return redirect()->back()->with('appointment', 'Your appointment added successfully!');
    }
    // ==========view Appointment controller===================
    public function ViewAppointment()
    {
        $appointments = Appointment::where('user_id', Auth::id())->latest()->get();
        return view('user.viewAppointment.appointment', compact('appointments'));
    }
    // ==========appointment delete================
    public function delete($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return redirect()->back()->with('AppointmentDelete', 'Appointment deleted successfully!');
    }
    // =======Appointment view to doctor================
    public function ViewAdmin()
    {
        $appointment = Appointment::all();
        return view('doctor.appointment.admin-view-appointment', compact('appointment'));
    }
    // ==============Appointment admin approved controller=============
    public function approved($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'Approved';
        $appointment->save();
        return back()->with('approved', 'Your appointmnet has been approved!');
    }
    public function Canceled($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'Canceled';
        $appointment->save();
        return back()->with('Canceled', 'Your appointmnet has been approved!');
    }
    // ===============Sent Email by admin===================
    public function emailView($id)
    {
        $data = Appointment::find($id);
        return view('doctor.appointment.sentemail', compact('data'));
    }
    public function sentemail(Request $request, $id)
    {
        $data = Appointment::find($id);
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'action_text' => $request->action_text,
            'action_url' => $request->action_url,
            'endpart' => $request->endpart,
        ];
        Notification::send($data, new
            SendEmailNotification($details));
        // Notification::send($data, new BillingNotification($billData));
        // Notification::send($data, new BillingNotification($billData));
        return redirect()->back()->with('sendEmail', 'Email Sent Successfully!');
    }
}
