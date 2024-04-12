<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DocteurController;
use App\Http\Controllers\AppointementController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\DossierPatientController;

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

Route::get('/', function () {
    return view('welcome');
});

/* Debut Back-office */
Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('Back.main');
    })->name('dashboard');
});
/* Fin Back-office */

 /* DEBUTDeconnexion */
Route::group(['middleware'=>['auth']], function (){
Route::get('/logout',[LogoutController::class, 'perform'])
->name('logout.perform');
});
/* FINDeconnexion */

/* LienClient */
Route::resource('/backoffice/patient', PatientController::class)->middleware('auth');
Route::resource('/backoffice/medecin', DocteurController::class)->middleware('auth');
Route::resource('/backoffice/rendez_vous', AppointementController::class)->middleware('auth');
Route::resource('/backoffice/role', RoleController::class)->middleware('auth');
Route::resource('/backoffice/departement', DepartementController::class)->middleware('auth');
Route::resource('/backoffice/personel', PersonnelController::class)->middleware('auth');
Route::resource('/backoffice/dossierpatient', DossierPatientController::class)->middleware('auth');