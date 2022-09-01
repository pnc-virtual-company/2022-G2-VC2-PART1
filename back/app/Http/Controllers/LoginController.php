<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Admin;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function studentLogin(Request $request)
    {
        $user = Student::where('email', $request->email)->first();
        //check password
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => "Invaliid password"]);
        }
        $token = $user->createToken('myToken')->plainTextToken;
        return response()->json(['token' => $token, 'message' => 'success', 'id' => $user['id'], 'role' => $user['role'], 'email' => $user['email']], 200);
    }

    public function adminLogin(Request $request)
    {
        $user = Admin::where('email', $request->email)->first();
        //check password
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => "Invaliid password"]);
        }
        $token = $user->createToken('myToken')->plainTextToken;
        return response()->json(['token' => $token, 'message' => 'success', 'id' => $user['id'], 'role' => $user['role'], 'email' => $user['email']], 200);
    }
}
