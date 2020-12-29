<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $guarded = [
        'approver',
        'approved_date',
    ];



    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }
}
