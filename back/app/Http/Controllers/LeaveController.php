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
        $leave->admin_id = $request->admin_id;
        $leave->student_id = $request->student_id;
        $leave->start_date = $request->start_date;
        $leave->end_date = $request->end_date;
        $leave->leave_type = $request->leave_type;
        $leave->duration = $request->duration;
        $leave->time = $request->time;
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
        $leave= Leave::findOrFail($leaves);
        $leave->admin_id = $request->admin_id;
        $leave->student_id = $request->student_id;
        $leave->start_date = $request->start_date;
        $leave->end_date = $request->end_date;
        $leave->leave_type = $request->leave_type;
        $leave->duration = $request->duration;
        $leave->time = $request->time;
        $leave->status = $request->status;
        $leave->reason = $request->reason;
        $leave->save();
        return response()->json(["message"=>"updated saved successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leaves  $leaves
     * @return \Illuminate\Http\Response
     */
    public function destroy($leaves)
    {
        return Leave::destroy($leaves);
    }
}
