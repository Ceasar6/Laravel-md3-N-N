<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table='students';

    function roles()
    {
        return $this->belongsToMany('App\Role','role-student','student_id','role_id');
    }
}
