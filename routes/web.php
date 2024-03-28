<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientPaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RadiographyController;
use App\Models\Patient;
use Illuminate\Support\Facades\Route;
use Morilog\Jalali\Jalalian;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    $patient = Patient::all()->count();
    $date = Jalalian::forge('today')->format(' %Y-%m-%d');
    $today = Patient::all()->where('registrationDate', '1402-09-29');
    $get = Patient::all()->where('registrationDate', '1402-09-29');

    // dd($today);
    return view('admin.dashboard', compact('patient', 'today'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // PatientController
    Route::resource('patient', PatientController::class);
    Route::post('/Patient/newPatient', [PatientController::class, 'newPatient'])->name('patient.newPatient');
    Route::get('/Patient/getData', [PatientController::class, 'getData'])->name('patient.getData');
    Route::post('/Patient/easyCreate', [PatientController::class, 'easyCreate'])->name('patient.easyCreate');
    Route::get('/Patient/{id}/details', [PatientController::class, 'details'])->name('patient.details');
    Route::get('/Patient/{id}/treatment', [PatientController::class, 'treatment'])->name('patient.treatment');
    Route::get('/Patient/{id}/changeStatus/{status}', [PatientController::class, 'changeStatus'])->name('patient.changeStatus');
    Route::delete('/Patient/delete', [PatientController::class, 'delete'])->name('patient.delete');

    // PatientPaymentController
    Route::get('/patientPayment/data', [PatientPaymentController::class, 'data'])->name('patientPayment.data');
    Route::delete('/patientPayment/delete', [PatientPaymentController::class, 'delete'])->name('patientPayment.delete');
    Route::resource('patientPayment', PatientPaymentController::class);
    Route::get('/patientPayment/{id}/payment', [PatientPaymentController::class, 'payment'])->name('patientPayment.payment');
    Route::get('/patientPayment/showData', [PatientPaymentController::class, 'showData'])->name('patientPayment.showData');
    // Route::get('/patientPayment/credit', [PatientPaymentController::class, 'credit'])->name('patientPayment.credit');
    Route::post('/patientPayment/saveDebit', [PatientPaymentController::class, 'saveDebit'])->name('patientPayment.saveDebit');
    Route::post('/patientPayment/saveCredit', [PatientPaymentController::class, 'saveCredit'])->name('patientPayment.saveCredit');

    // RadiographyController
    Route::resource('radiography', RadiographyController::class);
});

require __DIR__.'/auth.php';
