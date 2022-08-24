<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable =[
        'first_name',
        'last_name',
        'email',
        'password',
        'position',
        'role',
        'status',
        'show',
        'reason',
    ];
    public function students(){
        return $this->hasMany(Student::class,'admin_id');
    }

    protected $hidden =[
        'created_at',
        'updated_at'
    ];
}
