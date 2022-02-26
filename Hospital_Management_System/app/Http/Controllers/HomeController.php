<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // Use auth define
    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {
                $doctors = Doctor::latest()->get();
                $speacilitys = Speciality::latest()->get();
                return view('user.home', compact('doctors', 'speacilitys'));
            } else {
                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }
    }
    // =====user page and fontpages setup====
    public function home()
    {
        if (Auth::id()) {
            return redirect('home');
        } else {

            $speacilitys = Speciality::latest()->get();
            $doctors = Doctor::latest()->get();
            return view('user.home', compact('doctors', 'speacilitys'));
        }
    }
}
