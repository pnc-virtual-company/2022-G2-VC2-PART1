<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable =[
        'admin_id',
        'firstname',
        'lastname',
        'gender',
        'batch',
        'email',
        'password',
        'role',
        'phone',
        'passwords'
    ];
    public function admin(){
        return $this->belongsTo(Admin::class,'admin_id');
    }
    public function leaves(){
        return $this->hasMany(Leave::class,'student_id');
    }

    protected $hidden=[
        'created_at',
        'updated_at'

    ];
}
