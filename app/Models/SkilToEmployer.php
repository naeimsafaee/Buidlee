<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkilToEmployer extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'employer_id'];
}
