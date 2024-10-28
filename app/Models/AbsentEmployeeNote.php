<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbsentEmployeeNote extends Model
{
    protected $fillable = [
        'absent_employee_id',
        'note',
    ];

    public function absentEmployee() {
        return $this->belongsTo(AbsentEmployee::class);
    }
}
