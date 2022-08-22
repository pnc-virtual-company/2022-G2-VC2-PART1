<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $fillable =[
        'student_id',
        'start_date',
        'end_date',
        'leave_type',
        'duration',
        'start_time',
        'end_time',
        'status',
        'show',
        'reason',
    ]; 
    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }
}
