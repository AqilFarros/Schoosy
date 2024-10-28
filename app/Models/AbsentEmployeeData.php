<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbsentEmployeeData extends Model
{
    protected $fillable = [
        'absent_employee_id',
        'previllage_id',
        'status',
    ];

    public function absentEmployee()
    {
        return $this->belongsTo(AbsentEmployee::class);
    }

    public function previllage()
    {
        return $this->belongsTo(Previllage::class);
    }
}
