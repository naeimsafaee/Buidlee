<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ChangePasswordController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('employer.changepassword');
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

        $employer = auth()->guard('employer')->user();
        if(password_verify($request->old_password, $employer->password)){
            $employer->password = Hash::make($request->password);
            $employer->save();
            return redirect()->route('employer_profile');
        } else {
            throw ValidationException::withMessages(['password' => 'wrong information']);
        }
    }

}
