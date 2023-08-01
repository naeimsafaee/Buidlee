<?php

namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'title',
        'salary_from',
        'salary_to',
        'salary_period',
        'about',
        'level',
        'promote_in_home',
        'promote_in_category',
        'crypto',
        'is_pay',
        'expiry_at'
    ];
    protected $appends = ['Time', 'is_apply', 'is_job'];

    protected $casts = [
        'expiry_at' => 'date'
    ];

    public function getTimeAttribute(){
        return $this->created_at->diffForHumans(null, ['parts' => 1, 'options' => CarbonInterface::ROUND]);
    }

    public function employer(){
        return $this->hasOne(Employer::class, 'id', 'employer_id');
    }

    public function skills(){
        return $this->hasMany(SkilToJob::class, 'job_id', 'id');

    }

    public function benefits(){
        return $this->hasManyThrough(Benefits::class, BenefitToJob::class, 'job_id', // Foreign key on the environments table...
            'id', // Foreign key on the deployments table...
            'id', // Local key on the projects table...
            'benefit_id' // Local key on the environments table...
        );
    }

    public function positions(){
        return $this->belongsToMany(Position::class, PositionToJob::class);
    }

    public function types(){
        return $this->belongsToMany(Type::class, TypeToJob::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class, CategoryToJob::class);
    }


    public function getIsApplyAttribute(){
        if(auth()->guard('jobseeker')->check()){

            $apply = JobseekerToJob::query()
                ->where('jobseeker_id', auth()->guard('jobseeker')->user()->id)
                ->where('job_id', $this->id)
                ->whereIn('status', ['waiting' , 'accept'])->get();

            if(count($apply) > 0)
                return true;
            else
                return false;
        }
        else
            return false;
    }

    public function getIsJobAttribute(){
        if(auth()->guard('employer')->check()){

            if($this->employer_id == auth()->guard('employer')->user()->id)
                return true;
            else
                return false;
        } else
            return false;
    }
}
