<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Treatment;
use App\Models\User;

class AppointmentController extends Controller
{
    public function allAppointment()
    {
        $appointments = Appointment::with(['user', 'doctor', 'treatment'])->get();
        return response()->json(['appointments' => $appointments], 200);
    }

    public function createAppointment(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|exists:users,id',
            'doctor_id' => 'required|exists:doctors,id',
            'treatment_id' => 'required|exists:treatments,id',
            'date' => 'required|date_format:Y-m-d'
        ]);

        $appointment = Appointment::create([
            'user_id' => $request->input('user_id'),
            'doctor_id' => $request->input('doctor_id'),
            'treatment_id' => $request->input('treatment_id'),
            'date' => $request->input('date')
        ]);

        return response()->json(['appointment' => $appointment], 201);
    }

    public function detailAppointment($id)
    {
        $appointment = Appointment::find ($id);

        if($appointment){
            $appointments = Appointment::with(['user', 'doctor', 'treatment'])->get();
            return response()->json(['appointments' => $appointments], 200);
        }
        return response()->json(['message' => 'Appointment Not Found'], 200);
    }

    public function updateAppointment(Request $request, $id)
    {
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return response()->json(['message' => 'Appointment Not Found'], 404);
        }

        $this->validate($request, [
            'user_id' => 'sometimes|exists:users,id',
            'doctor_id' => 'sometimes|exists:doctors,id',
            'treatment_id' => 'sometimes|exists:treatments,id',
            'date' => 'sometimes|date_format:Y-m-d'
        ]);

        $appointment->update($request->only(['user_id', 'doctor_id', 'treatment_id', 'date']));

        return response()->json(['message' => 'Appointment updated', 'appointment' => $appointment], 200);
    }

    public function deleteAppointment($id)
    {
        $appointment = Appointment::find ($id);

        if($appointment){

            $appointment->delete();
            return response()->json(['message' => 'Appointment Deleted'], 200);
        }
      
    }
}
