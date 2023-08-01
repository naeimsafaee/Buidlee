<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model {
    use HasFactory;

    protected $fillable = [
        'address',
        'currency',
        'amount',
        'charge_code',
        'job_id',
        'client_id',
        'is_category'
    ];
}
