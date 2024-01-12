<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
Route::post('/login/validate', [AuthController::class,'loginValidate'])->name('login.validate');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/',function(){
    return view('login');
});
Route::get('/dashboard', [HomeController::class,'dashboard'])->name('dashboard');


Route::group(['middleware' => ['AuthCheck']], function (){
Route::get('/login', [AuthController::class,'login'])->name('login');

/* Dashboard */
Route::get('/dashboard', [HomeController::class,'dashboard'])->name('dashboard');

Route::get('staff-profiles',[PatientController::class,'staffShow'])->name('staffProfile');
Route::post("staff-profiles",[PatientController::class,'store'])->name('staffProfileStore');
Route::post('staff-profiles/{id}',[PatientController::class,'update'])->name('updateStaffProfile');
Route::get('view-patients/{id}',[PatientController::class,'viewPatientHistory'])->name('viewPatientHistory');

Route::get('all-drugs',[DrugController::class,'show'])->name('allDrugs');
Route::post('all-drugs',[DrugController::class,'store'])->name('allDrugsStore');
Route::post('all-drugs/{id}',[DrugController::class,'update'])->name('updateDrugsStore');

Route::get('all-prescriptions',[PrescriptionController::class,'show'])->name('allPrescription');
Route::post('create-prescriptions',[PrescriptionController::class,'store'])->name('allPrescriptionStore');
Route::get('create-prescriptions',[PrescriptionController::class,'createShow'])->name('createPrescriptionShow');
Route::get('edit-prescriptions/{id}',[PrescriptionController::class,'edit'])->name('editPrescription');
Route::post('edit-prescriptions/{id}',[PrescriptionController::class,'update'])->name('updatePrescriptionStore');
Route::get('view-prescriptions/{id}',[PrescriptionController::class,'viewPrescription'])->name('viewPrescription');
});