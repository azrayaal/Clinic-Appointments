<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TreatmentController;
use \App\Http\Controllers\DoctorController;
use \App\Http\Controllers\AppointmentController;
use \App\Http\Controllers\AuthController;
use \App\Http\Middleware\JwtMiddleware;
use \App\Http\Controllers\Controller;

Route::get('/login', [AuthController::class, 'viewLogin']);
Route::post('/login', [AuthController::class, 'clientLogin']);
Route::get('/register', [AuthController::class, 'viewRegister']);
Route::post('/register', [AuthController::class, 'clientRegister']);

// Route::group(['middleware' => 'jwt.verify'], function () {

// Route::middleware(JwtMiddleware::class)->group(function () {
Route::get('/', [Controller::class, 'index']);
Route::get('/treatment', [TreatmentController::class, 'index']);
Route::get('/doctor', [DoctorController::class, 'index']);
Route::get('/appointment', [AppointmentController::class, 'index']);
Route::get('/appointment/create', [AppointmentController::class, 'viewAppointment']);
Route::post('/appointment/create', [AppointmentController::class, 'clientCreateAppointment']);
Route::get('/appointment/edit/{id}', [AppointmentController::class, 'viewEditAppointment']);
Route::put('/appointment/edit/{id}', [AppointmentController::class, 'clientEditAppointment']);
Route::delete('/appointment/delete/{id}', [AppointmentController::class, 'clientDeleteAppointment']);


Route::post('/logout', [AuthController::class, 'logout']);
// });
// });

// Route::middleware(\App\Http\Middleware\RestrictedMiddleware::class)->group(function () {

// });