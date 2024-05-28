<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('jwt.auth')->group(function () {
    Route::get('/user', [UserController::class, 'allUser']);
    Route::get('/user/{id}', [UserController::class, 'detailUser']);
    Route::delete('/user/{id}', [UserController::class, 'deleteUser']);

    Route::get('/doctor', [DoctorController::class, 'allDoctor']);
    Route::post('/doctor', [DoctorController::class, 'createDoctor']);
    Route::get('/doctor/{id}', [DoctorController::class, 'detailDoctor']);
    Route::put('/doctor/{id}', [DoctorController::class, 'updateDoctor']);
    Route::delete('/doctor/{id}', [DoctorController::class, 'deleteDoctor']);

    Route::get('/treatment', [TreatmentController::class, 'allTreatments']);
    Route::post('/treatment', [TreatmentController::class, 'createTreatment']);
    Route::get('/treatment/{id}', [TreatmentController::class, 'detailTreatment']);
    Route::put('/treatment/{id}', [TreatmentController::class, 'updateTreatment']);
    Route::delete('/treatment/{id}', [TreatmentController::class, 'deleteTreatment']);

    Route::get('/appointment', [AppointmentController::class, 'allAppointment']);
    Route::get('/appointmentByUser', [AppointmentController::class, 'allAppointmentByUser']);
    Route::post('/appointment', [AppointmentController::class, 'createAppointment']);
    Route::get('/appointment/{id}', [AppointmentController::class, 'detailAppointment']);
    Route::put('/appointment/{id}', [AppointmentController::class, 'updateAppointment']);
    Route::delete('/appointment/{id}', [AppointmentController::class, 'deleteAppointment']);
});