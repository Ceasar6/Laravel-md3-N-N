<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    public function students()
    {
        return $this->belongsToMany('App\Student','role-student','role_id','student_id');
    }
}
