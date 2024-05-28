<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use App\Models\Doctor;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {

        if (!Auth::check()) {
            return redirect('/login');
        }

        $treatmentCount = Treatment::count();
        $doctorCount = Doctor::count();
        $pageTitle = 'Home';
        $user = Auth::user();
        $userAppointments = $user->appointments;
        $userAppointmentsCount = $userAppointments->count();

        return view(
            'index',
            compact('pageTitle', 'user', 'treatmentCount', 'doctorCount', 'userAppointmentsCount')
        );
    }
}
