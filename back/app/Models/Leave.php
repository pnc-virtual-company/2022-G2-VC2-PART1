<?php

namespace App\Models;
use DateTimeInterface;

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
        'start_time',
        'end_time',
        'status',
        'reason',
    ]; 
}
