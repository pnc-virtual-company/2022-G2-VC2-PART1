<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
class AdminController extends Controller
{
    public function index()
    {
        return Admin::all();
    }
    

    public function show($id)
    {
        return Admin::findOrFail($id);
    }

     public function updateImage(Request $request, $id)
    {

        $admin = Admin::findOrFail($id);
        $path = public_path('image');
        if (!file_exists($path) ) {
            mkdir($path, 0777, true);
        }
        $file = $request->file('image');
        if($file!=null){
            $fileName = uniqid() . '_' . trim($file->getClientOriginalName());
            $file->move($path, $fileName);
            $admin->image = asset('image/' . $fileName);
            $admin->save();
            return response()->json(["message" => "admin update successfully"]);
        }
        
    }


    
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    public function signUp(Request $request)
    {
        $admin = new Admin();
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->email = $request->email;
        $admin->position = $request->position;
        $admin->save();
        return response()->json(["message" => "admin saved successfully"]);
    }

    public function logout()
    {
        auth('sanctum')->user()->tokens()->delete();
        return response()->json(['mes' => 'Logged out Successfully']);
    }
}
