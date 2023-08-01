<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionToJob extends Model
{
    use HasFactory;
    protected $fillable = ['position_id' , 'job_id'];

}
