<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Admin::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function signUp(Request $request)
    {
        $admin = new Admin();
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->email = $request->email;
        $admin->password = $request->password;
        $admin->position = $request->position;
        $admin->save();
        return response()->json(["message" => "leave saved successfully"]);
    }
    public function logIn(Request $request)
    {
        $user = Auth::admin();
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid']);
        }

        $token = $request->user()->createToken('mytoken')->plainTextToken;
        $cookie = cookie('jwt', $token, 60 * 24); //1 day
        return response()->json(['message' => 'success', 'token' => $token])->withCookie($cookie);
    }

    public function logout(Request $request)
    {
        $cookie = Cookie::forget('jwt');
        return response()->json(['message' => 'logged out'],)->withCookie($cookie);
    }
}
