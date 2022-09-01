<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;


class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Leave::with('student')->get();
    }

    public function amountOfleave()
    {
        return Leave::all()->count();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $leave= new Leave();
        $leave->student_id = $request->student_id;
        $leave->start_date = $request->start_date;
        $leave->end_date = $request->end_date;
        $leave->leave_type = $request->leave_type;
        $leave->duration = $request->duration;
        $leave->start_time = $request->start_time;
        $leave->end_time = $request->end_time;
        $leave->status = $request->status;
        $leave->reason = $request->reason;
        $leave->save();
        return response()->json(["message"=>"leave saved successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leaves  $leaves
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Leave::where("student_id", $id)->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leaves  $leaves
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $leave = Leave::findOrFail($id);
        $leave->status = $request->status;
        $leave->save();
        return response()->json($leave);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leaves  $leaves
     * @return \Illuminate\Http\Response
     */
    public function destroy($leaves)
    {

    }
}
