<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgetPassword;
use App\Models\Employer;
use App\Models\JobSeeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ForgetPasswordController extends Controller{

    public function step_1(Request $request){
        return view('auth.forget_password.step_one');
    }

    public function step_2(Request $request){
        return view('auth.forget_password.step_two');
    }

    public function step_3($reset_link){

        return view('auth.forget_password.step_three', compact('reset_link'));
    }

    public function employer_submit(Request $request){
        Validator::make($request->all(), [
            'email' => ['required', 'exists:employers,email'],
        ], [
            'email.required' => "required",
            'email.exists' => "email does not exits",
        ])->validate();

        $reset_link = $this->generateRandomString();

        $employer = Employer::query()->where('email', $request->email)->first();

        $employer->reset_link = $reset_link;
        $employer->save();

        Mail::to(["email" => $request->email])->send(new ForgetPassword($reset_link));


        return redirect()->route('forget2');
    }

    public function jobseeker_submit(Request $request){
        Validator::make($request->all(), [
            'email' => ['required', 'exists:jobseekers,email'],
        ], [
            'email.required' => "required",
            'email.exists' => "email does not exits",
        ])->validate();

        $reset_link = $this->generateRandomString();

        $jobseeker = JobSeeker::query()->where('email', $request->email)->first();

        $jobseeker->reset_link = $reset_link;
        $jobseeker->save();

        Mail::to(["email" => $request->email])->send(new ForgetPassword($reset_link));

        return redirect()->route('forget2');
    }

    function generateRandomString($length = 10){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for($i = 0; $i < $length; $i++){
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function forget(Request $request){
        Validator::make($request->all(), [
            'reset_link' => ['required'],
            'password' => ['required', 'min:8'],
            'password2' => ['required', 'same:password'],
        ])->validate();

        $employer = Employer::query()->where('reset_link', $request->reset_link)->first();
        $jobseeker = JobSeeker::query()->where('reset_link', $request->reset_link)->first();

        if($employer){
            $employer->password = Hash::make($request->password);
            $employer->reset_link = null;
            $employer->save();
        } elseif($jobseeker) {
            $jobseeker->password = Hash::make($request->password);
            $jobseeker->reset_link = null;
            $jobseeker->save();
        } else {
            return abort(404);
        }

        return redirect()->route('login');
    }

}
