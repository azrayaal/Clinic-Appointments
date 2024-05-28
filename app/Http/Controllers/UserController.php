<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function allUser()
    {
        $user = User::All();
        return response()->json(['user', $user], 200);
    }

    public function detailUser($id)
    {
        $user = User::find ($id);

        if($user){
            return response()->json(['user', $user], 200);
        }
        return response()->json(['message' => 'User Not Found'], 200);
    }

    public function deleteUser($id)
    {
        $user = User::find ($id);

        if($user){
            $user->delete();
            return response()->json(['message' => 'User Deleted'], 200);
        }
    }
}
