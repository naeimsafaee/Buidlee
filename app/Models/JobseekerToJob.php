<?php

namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobseekerToJob extends Model
{
    use HasFactory;
    protected $fillable = ['jobseeker_id' , 'employer_id' , 'job_id' , 'description' , 'status'];
    protected $appends = ['Time'];

    public function getTimeAttribute(){

        return $this->created_at->diffForHumans(null, ['parts' => 1, 'options' => CarbonInterface::ROUND]);

    }

    public function job()
    {
        return $this->hasOne(Job::class, 'id', 'job_id');
    }

    public function jobseeker()
    {
        return $this->hasOne(JobSeeker::class, 'id', 'jobseeker_id');
    }

    public function employer()
    {
        return $this->hasOne(Employer::class, 'id', 'employer_id');
    }
}
