<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Student::orderBy('id','asc')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        $student= new Student();
        $student->admin_id = $request->admin_id;
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;
        $student->password = $request->password;
=======
        $student=new Student();
        $student->admin_id =$request->admin_id;
        $student->firstname =$request->firstname;
        $student->lastname =$request->lastname;
        $student->gender =$request->gender;
        $student->batch =$request->batch;
        $student->email =$request->email;
        $student->phone =$request->phone;
        $student->passwords =$request->passwords;
>>>>>>> 435c95a79ad14e400b4b657874fff4af8f9a6615
        $student->save();
        return response()->json([
            'message'=>'Your create is successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Student::findOrFail($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $student=Student::findOrFail($id);
        $student->admin_id =$request->admin_id;
        $student->firstname =$request->firstname;
        $student->lastname =$request->lastname;
        $student->gender =$request->gender;
        $student->batch =$request->batch;
        $student->email =$request->email;
        $student->phone =$request->phone;
        $student->passwords =$request->passwords;
        $student->save();
        return response()->json([
            'message'=>'Your Updated is successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return Student::destroy($id);
    }

    public function signIn(Request $request)
    {
        $user = new Student();
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = Student::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
        }
        $token = $user->createToken('mytoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response()->json($response);
    }
}
