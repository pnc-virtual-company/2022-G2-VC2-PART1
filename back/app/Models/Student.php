<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable =[
        'admin_id',
        'first_name',
        'last_name',
        'email',
        'password',
        'role',
    
        
    ];
    protected $hidden=[
        'created_at',
        'updated_at'
    ];
    public function admin(){
        return $this->belongsTo(Admin::class,'admin_id');
    }
    public function leaves(){
        return $this->hasMany(Leave::class,'student_id');
    }
}
