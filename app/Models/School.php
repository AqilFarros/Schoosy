<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'image',
        'email',
        'address',
        'phone',
        'website',
        'code',
        'approve',
    ];
}
