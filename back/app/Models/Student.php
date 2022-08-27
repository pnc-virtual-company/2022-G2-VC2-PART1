<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable =[
        'admin_id',
        'firstname',
        'lastname',
        'gender',
        'batch',
        'email',
        'phone',
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
