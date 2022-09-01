<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Student::with(['leaves','admin'])->get();
    }

    public function amountOfstudent()
    {
        return Student::all()->count();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student=new Student();
        $student->admin_id =$request->admin_id;
        $student->first_name =$request->first_name;
        $student->last_name =$request->last_name;
        $student->gender =$request->gender;
        $student->batch =$request->batch;
        $student->email =$request->email;
        $student->phone =$request->phone;
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
        return Student::where('id',$id)->with(['leaves','admin'])->get();
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
        $student->first_name =$request->first_name;
        $student->last_name =$request->last_name;
        $student->gender =$request->gender;
        $student->batch =$request->batch;
        $student->email =$request->email;
        $student->phone =$request->phone;
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


    public function updatePassword(Request $request){
       $student=Student::where('email',$request->email)->first();
       if($student){
            $student->password=bcrypt($request->password);
            $student->save();
            return $student;
       }
       return "Invalid Email";
    }

}
