<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'image',
        'school_id',
    ];

    public function school() {
        return $this->belongsTo(School::class);
    }

    public function previllage() {
        return $this->hasMany(Previllage::class);
    }
}
