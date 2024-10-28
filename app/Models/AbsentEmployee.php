<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbsentEmployee extends Model
{
    protected $fillable = [
        'school_id',
        'date',
    ];

    public function school() {
        return $this->belongsTo(School::class);
    }

    public function absentEmployeeNote() {
        return $this->hasMany(AbsentEmployeeNote::class);
    }

    public function absentEmployeeData() {
        return $this->hasMany(AbsentEmployeeData::class);
    }
}
