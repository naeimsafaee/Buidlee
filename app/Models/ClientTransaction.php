<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientTransaction extends Model {
    use HasFactory;

    protected $fillable = [
        'code',
        'client_id',
        'amount',
        'paid',
        'job_id',
        'is_job_pay',
    ];

}
