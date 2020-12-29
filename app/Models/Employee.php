<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'employee_id',
        'date_of_entry',
        'department',
        'position',
        'status',
        'leave_balance',
        'path',
    ];

    public function user(){
        return $this->hasOne('App\Models\User');
    }

    public function leave(){
        return $this->hasOne('App\Models\Leave');
    }
}
