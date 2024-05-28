<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Treatment;

class DoctorController extends Controller
{
    public function allDoctor()
    {
        $doctor = Doctor::All();
        return response()->json(['All Doctors', $doctor], 200);
    }

    public function createDoctor(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            // 'treatment_id' => 'required|exists:treatments,id'
        ]);

        $doctor = Doctor::create([
            'name' => $request->input('name'),
            'specialization' => $request->input('specialization'),
            // 'treatment_id' => $request->input('treatment_id')
        ]);

        return response()->json(['Doctor created: ' => $doctor], 201);
    }

    public function detailDoctor($id)
    {
        $doctor = Doctor::find ($id);

        if($doctor){
            return response()->json($doctor, 200);
        }
        return response()->json(['message' => 'Doctor Not Found'], 200);
    }

    public function updateDoctor(Request $request, $id)
    {

        $doctor = Doctor::find ($id);

        if(!$doctor){
            return response()->json(['message' => 'Doctor Not Found'], 200);
        }

        $doctor->update([
            'name'     => $request->input('name'),
            'specialization'    => $request->input('specialization'),
        ]);

        return response()->json(['Doctor updated: ' => $doctor], 201);
    }

    public function deleteDoctor($id)
    {
        $doctor = Doctor::find ($id);

        if($doctor){
            $doctor->delete();
            return response()->json(['message' => 'Doctor Deleted'], 200);
        }
    }
}
