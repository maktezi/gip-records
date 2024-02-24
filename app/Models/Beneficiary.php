<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    use HasFactory;

    protected $fillable = [
        'office_id',
        'fname',
        'lname',
        'sex',
        'id_number',
        'assign_to',
        'status',
        'date_started',
        'date_end',
        'attachment',
    ];

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

}
