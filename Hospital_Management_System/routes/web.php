<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SpecialityController;
use App\Models\Doctor;
use Illuminate\Support\Facades\Route;
use PhpParser\Comment\Doc;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// ===============HomeController Route============
Route::get('/home', [HomeController::class, 'redirect'])->middleware('auth', 'verified');


// ========Frontend Route are here==========
Route::get('/', [HomeController::class, 'home']);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



// ====================Admin Route are start here================
// ================Doctors Controller======================
Route::prefix('Doctor')->group(function () {
    Route::get('add', [DoctorController::class, 'AddDoctor'])->name('Doctor.add');
    Route::post('Store', [DoctorController::class, 'Store'])->name('Doctor.store');
    Route::get('index', [DoctorController::class, 'index'])->name('Doctor.index');
    Route::get('speciality', [DoctorController::class, 'speciality'])->name('Doctor.speciality');
    Route::post('store', [SpecialityController::class, 'speacialityStore'])->name('Doctor.speacialityStore');
    Route::post('appointment', [DoctorController::class, 'AppintmentStore'])->name('appointment.store');
    Route::get('edit/{doctor_id}', [DoctorController::class, 'edit'])->name('Doctor.edit');
    Route::post('update/{id}', [DoctorController::class, 'update'])->name('Doctor.update');
    Route::get('deleted/{id}', [DoctorController::class, 'deleted'])->name('Doctor.canceled');
});

// ==============user Appointment view=================
Route::prefix('Appointment')->group(function () {
    Route::get('view', [DoctorController::class, 'ViewAppointment'])->name('Appointment.view');
    Route::get('view/{id}', [DoctorController::class, 'delete'])->name('Appointment.Delete');
    Route::get('viewAdmin', [DoctorController::class, 'ViewAdmin'])->name('Appointment.ViewAdmin');
    Route::get('apporved/{id}', [DoctorController::class, 'approved'])->name('Appointment.approved');
    Route::get('canceled/{id}', [DoctorController::class, 'Canceled'])->name('Appointment.canceled');
    // ====== admin doctor email view================ and controller========
    Route::get('emailView/{id}', [DoctorController::class, 'emailView'])->name('Doctor.emailView');
    Route::post('sentemail/{id}', [DoctorController::class, 'sentemail'])->name('Doctor.sentemail');
});
