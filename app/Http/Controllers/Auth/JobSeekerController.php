<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\JobSeeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class JobSeekerController extends Controller
{
    public function login()
    {
        return view('auth.layouts.login-jobseeker');
    }

    public function register()
    {
        return view('auth.layouts.register-jobseeker');

    }

    public function login_submit(Request $request)
    {
        Validator::make($request->all(), [
            'username' => [
                'required',
                function($attribute, $value, $fail){

                    $JobSeeker = JobSeeker::query()->where('username', $value)->get();
                    $JobSeeker2 = JobSeeker::query()->where('email', $value)->get();
                    if ($JobSeeker->count() >0 || $JobSeeker2->count() >0)
                        return ;
                    else
                        return $fail('the username or email does not exists');

                },
            ],

            'password' => ['required' ]
        ], [
            'username.required' => "required",
            'password.required' => "required",
        ])->validate();

        if (JobSeeker::query()->where('username', $request->username)->get()->count() >0)
            $jobseeker = JobSeeker::query()->where('username',$request->username)->firstOrFail();

        elseif(JobSeeker::query()->where('email', $request->username)->get()->count() >0)
            $jobseeker = JobSeeker::query()->where('email',$request->username)->firstOrFail();

        if(password_verify($request->password, $jobseeker->password)){
            auth()->guard('jobseeker')->login($jobseeker);
            return redirect()->route('jobseeker_profile');
        } else {
            throw ValidationException::withMessages(['password' => 'wrong information']);
        }
    }

    public function register_submit(Request $request)
    {
        Validator::make($request->all(), [
            'username' => ['required' ,'unique:jobseekers,username'],
            'name' => ['required'],
            'email' => ['required' , 'unique:jobseekers,email'],
            'gender' => ['required'],
            'password' => ['required' , 'min:8'],
            're_try_Password' => ['required' , 'same:password'],
        ], [])->validate();

        $jobseeker = JobSeeker::query()->create([
            'username'=>$request->username ,
            'name' =>$request->name ,
            'email' =>$request->email,
            'gender' =>'female',
            'password' => Hash::make($request->password),

        ]);
        auth()->guard('jobseeker')->login($jobseeker);
        return redirect()->route('jobseeker_profile');
    }
}
