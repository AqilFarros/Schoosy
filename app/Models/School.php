<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'user_id',
        'image',
        'email',
        'address',
        'phone',
        'website',
        'code',
        'approve',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function previllage()
    {
        return $this->hasMany(Previllage::class);
    }

    public function classroom()
    {
        return $this->hasMany(Classroom::class);
    }

    public function book()
    {
        return $this->hasMany(Book::class);
    }

    public function absentClass()
    {
        return $this->hasMany(AbsentClass::class);
    }

    public function absentEmployee()
    {
        return $this->hasMany(AbsentEmployee::class);
    }
}
