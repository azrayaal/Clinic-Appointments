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

    public function createUser(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return response()->json(['user' => $user], 201);
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
