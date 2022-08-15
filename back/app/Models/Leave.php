<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $fillable =[
        'start_date',
        'end_date',
        'leave_type',
        'duration',
        'time',
        'reason',
        'status'
    ];

    public function student(){
        return $this->belongsTo(Leave::class, 'student_id');
    }
}
