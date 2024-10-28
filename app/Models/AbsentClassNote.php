<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbsentClassNote extends Model
{
    protected $fillable = [
        'absent_class_id',
        'note',
    ];

    public function absentClass() {
        return $this->belongsTo(AbsentClass::class);
    }
}
