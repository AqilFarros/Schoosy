<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbsentClass extends Model
{
    protected $fillable = [
        'school_id',
        'classroom_id',
        'date',
    ];

    public function school() {
        return $this->belongsTo(School::class);
    }

    public function classroom() {
        return $this->belongsTo(Classroom::class);
    }

    public function absentClassNote() {
        return $this->hasMany(AbsentClassNote::class);
    }

    public function absentClassData() {
        return $this->hasMany(AbsentClassData::class);
    }
}
