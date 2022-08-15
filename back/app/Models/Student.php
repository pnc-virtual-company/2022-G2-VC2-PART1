<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable =[
        'first_name',
        'last_name',
        'email',
        'password',
        'role',
    ];

    public function admin(){
        return $this->belongsTo(Student::class, 'admin_id');
    }

    public function leaves(){
        return $this->hasMany(Leaves::class, 'student_id');
    }
}
