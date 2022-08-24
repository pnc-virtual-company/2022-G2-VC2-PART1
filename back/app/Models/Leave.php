<?php
namespace App\Models;
use DateTimeInterface;

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
        'isChecked',
        'show',
        'reason',
    ]; 
    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }

    protected $casts = [
        'show'=> 'boolean',
        'isChecked'=>'boolean'
    ];
    
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i A');
    }
    protected $hidden=[
        'created_at',
        'updated_at'
    ];
}
