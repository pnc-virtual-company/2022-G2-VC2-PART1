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
        return Leave::all();
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
        $leave->show = false;
        $leave->isChecked =false;
        $leave->save();
        return response()->json(["message"=>"leave saved successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leaves  $leaves
     * @return \Illuminate\Http\Response
     */
    public function show($leaves)
    {
        return Leave::findOrFail($leaves);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leaves  $leaves
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$leaves)
    {
       
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
