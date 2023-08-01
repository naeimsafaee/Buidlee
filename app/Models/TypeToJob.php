<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeToJob extends Model
{
    use HasFactory;
    protected $fillable = ['type_id' , 'job_id'];

}

