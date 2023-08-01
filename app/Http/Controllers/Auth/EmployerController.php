<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use App\Models\JobSeeker;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class EmployerController extends Controller
{
    public function login()
    {
        return view('auth.layouts.login-employer');
    }

    public function register()
    {
        $sizes = Size::all();
        return view('auth.layouts.register-employer' , compact('sizes'));
    }

    public function login_submit(Request $request)
    {
        Validator::make($request->all(), [

//            'username' => ['required' , 'exists:employers,company_id,email'],
            'username' => [
                'required',
                function($attribute, $value, $fail){

                   $employer = Employer::query()->where('company_id', $value)->get();
                   $employer2 = Employer::query()->where('email', $value)->get();
                    if ($employer->count() >0 || $employer2->count() >0)
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


        if (Employer::query()->where('company_id', $request->username)->get()->count() >0)
            $employer = Employer::query()->where('company_id',$request->username)->firstOrFail();

        elseif(Employer::query()->where('email', $request->username)->get()->count() >0)
            $employer = Employer::query()->where('email',$request->username)->firstOrFail();


        if(password_verify($request->password, $employer->password)){
            auth()->guard('employer')->login($employer);
            return redirect()->route('employer_profile');
        } else {
            throw ValidationException::withMessages(['password' => 'wrong information']);
        }
    }


    public function register_submit(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required'],
            'job_title' => ['required'],
            'email' => ['required' , 'unique:employers,email'],
            'company_name' => ['required'],
            'company_id' => ['required' ,'unique:employers,company_id'],
            'company_size' => ['required'],
            'password' => ['required' , 'min:8'],
            're_try_Password' => ['required' , 'same:password'],
        ], [

        ])->validate();

        $employer = Employer::query()->create([
            'name' =>$request->name ,
            'email' =>$request->email,
            'job_title' =>$request->job_title,
            'company_name' =>$request->company_name,
            'company_id' =>$request->company_id,
            'company_size' =>$request->company_size,
            'password' => Hash::make($request->password),

        ]);
        auth()->guard('employer')->login($employer);
        return redirect()->route('employer_profile');
    }
}
