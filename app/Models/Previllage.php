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
}
