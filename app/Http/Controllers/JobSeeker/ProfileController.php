<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobseekerToJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller{

    public function __invoke(Request $request){
        $jobseeker = auth()->guard('jobseeker')->user();
        return view('jobseeker.profile', compact('jobseeker'));
    }

    public function avatar_submit(Request $request){
        $file = $request->avatarPicture;
        $fileName = time() . '-' . rand() . '.' . $file->getClientOriginalExtension();
        Storage::disk('public')->put('files/' . $fileName, file_get_contents($file));
        $jobseeker = auth()->guard('jobseeker')->user();
        $jobseeker->avatar = 'files/' . $fileName;
        $jobseeker->save();
        return redirect()->route('jobseeker_profile');

    }

    public function profile_submit(Request $request){


        Validator::make($request->all(), [
            'cv' => ['file', 'mimes:jpg,pdf,png'],
            'email' => ['email'],
        ], [])->validate();

        $jobseeker = auth()->guard('jobseeker')->user();

        if($request->file('cv')){
            $file = $request->cv;
            $fileName = 'files/' .  time() . '-' . rand() . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->put($fileName, file_get_contents($file));
            $jobseeker->cv = $fileName;
        }

        $jobseeker->name = $request->name;
        $jobseeker->job_title = $request->job_title;
        $jobseeker->email = $request->email;
        $jobseeker->gender = $request->gender;
        $jobseeker->save();
        return redirect()->route('jobseeker_profile');
    }

    public function apply($id){
        $job = Job::query()->findOrFail($id);
        JobseekerToJob::query()->create([
            'jobseeker_id' => auth()->guard('jobseeker')->user()->id,
            'job_id' => $job->id,
            'employer_id' => $job->employer->id,
        ]);

        return response()->json('ok');
    }

    public function delete_cv(Request $request){
        $jobseeker = auth()->guard('jobseeker')->user();
        $jobseeker->cv = null;
        $jobseeker->save();
        return redirect()->route('jobseeker_profile');

    }
}
