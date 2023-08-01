<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ChangePasswordController extends Controller
{

    public function index(Request $request)
    {
        return view('jobseeker.changepassword');
    }

    public function submit(Request $request)
    {
        Validator::make($request->all(), [
            'old_password' => ['required'],
            'password' => ['required' , 'min:8'],
            'password2' => ['required' ]
        ], [
            'old_password.required' => "required",
            'password.required' => "required",
            'password.min' => "password must be at least 8 characters",
            'password2.required' => "required",
        ])->validate();

        $jobseeker = auth()->guard('jobseeker')->user();
        if(password_verify($request->old_password, $jobseeker->password)){
            $jobseeker->password = Hash::make($request->password);
            $jobseeker->save();
            return redirect()->route('jobseeker_profile');
        } else {
            throw ValidationException::withMessages(['password' => 'wrong information']);
        }
    }
}
