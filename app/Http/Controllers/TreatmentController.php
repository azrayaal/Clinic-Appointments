<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treatment;
use Illuminate\Support\Facades\Auth;

class TreatmentController extends Controller
{
    public function allTreatments()
    {
        $treatment = Treatment::All();
        return response()->json(['treatment', $treatment], 200);
    }

    public function createTreatment(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $treatment = Treatment::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return response()->json(['treatment' => $treatment], 201);
    }

    public function detailTreatment($id)
    {
        $treatment = Treatment::find($id);

        if ($treatment) {
            return response()->json($treatment, 200);
        }
        return response()->json(['message' => 'Treatment Not Found'], 200);
    }

    public function updateTreatment(Request $request, $id)
    {

        $treatment = Treatment::find($id);

        if (!$treatment) {
            return response()->json(['message' => 'Treatment Not Found'], 200);
        }

        $treatment->update([
            'name' => $request->input('name'),
            'specialization' => $request->input('specialization'),
        ]);

        return response()->json(['Treatment updated: ' => $treatment], 201);
    }

    public function deleteTreatment($id)
    {
        $treatment = Treatment::find($id);

        if ($treatment) {
            $treatment->delete();
            return response()->json(['message' => 'Treatment Deleted'], 200);
        }
    }



    /////// view ////////

    public function index()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $treatment = Treatment::all();
        $pageTitle = 'Treatment';
        $user = Auth::user();

        return view(
            'pages.treatment.view-treatment',
            compact('user', 'treatment', 'pageTitle')
        );
    }
}
