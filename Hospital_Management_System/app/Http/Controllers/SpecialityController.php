<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function speacialityStore(Request $request)
    {
        $request->validate([
            'speciality_name' => 'required|unique:specialities,speciality_name',
        ]);
        $specilatiy = new Speciality();
        $specilatiy->speciality_name = $request->speciality_name;
        $specilatiy->save();
        return redirect()->back()->with('specialityadded', 'Speciality added Successfully!');
    }
}
