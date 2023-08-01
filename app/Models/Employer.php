<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employer extends Authenticatable{
    use HasFactory;

    protected $table = 'employers';

    protected $hidden = ['password'];

    protected $fillable = [
        'avatar',
        'name',
        'email',
        'job_title',
        'company_size',
        'company_name',
        'company_id',
        'password',
        'ceo',
        'website',
        'social',
        'location',
        'salary_from',
        'salary_to',
        'salary_period',
    ];

    public function jobs(){
        return $this->hasMany(Job::class, 'employer_id', 'id')
            ->where('promote_in_home' , true)->orWhere('promote_in_category' , true)->orderByDesc('id');
    }

    public function requests(){
        return $this->hasMany(JobseekerToJob::class, 'employer_id', 'id')->orderByDesc('created_at');
    }

    public function size(){
        return $this->belongsTo(Size::class, 'company_size', 'id');
    }


    public function location_name(){
        return $this->belongsTo(Location::class, 'location', 'id');
    }

    public function skills(){
        return $this->hasMany(SkilToEmployer::class, 'employer_id', 'id');
    }

    public function galleries(){
        return $this->hasMany(Gallery::class, 'employer_id', 'id');
    }

}

