<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Previllage extends Model
{
    protected $fillable = [
        'user_id',
        'school_id',
        'name',
        'role',
        'classroom_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function classroom()
    {
        return $this->hasOne(Classroom::class);
    }

    public function absentClassData()
    {
        return $this->hasMany(AbsentClassData::class);
    }

    public function absentEmployeeData()
    {
        return $this->hasMany(AbsentEmployeeData::class);
    }
}
