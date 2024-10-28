<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbsentClassData extends Model
{
    protected $fillable = [
        'absent_class_id',
        'previllage_id',
        'status',
    ];

    public function absentClass() {
        return $this->belongsTo(AbsentClass::class);
    }

    public function previllage() {
        return $this->belongsTo(Previllage::class);
    }
}
