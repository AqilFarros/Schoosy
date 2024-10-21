<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'school_id',
        'name',
        'slug',
        'image',
        'file',
    ];

    public function school() {
        return $this->belongsTo(School::class);
    }
}
