<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable =[
        'first_name',
        'last_name',
        'email',
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
