<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class JobSeeker extends Authenticatable
{
    use HasFactory;
    protected $table = 'jobseekers';
    protected $hidden = ['password'];
    protected $fillable = ['username' , 'name' , 'email' , 'gender' , 'password' , 'job_title' , 'cv' , 'avatar'];

    public function requests()
    {
        return $this->hasMany(JobseekerToJob::class, 'jobseeker_id', 'id')->orderByDesc('created_at');
    }
}
