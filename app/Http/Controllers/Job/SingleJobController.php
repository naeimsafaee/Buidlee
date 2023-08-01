<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use App\Models\Job;
use Illuminate\Http\Request;

class SingleJobController extends Controller
{
    public function __invoke(Request $request , $id)
    {
        $job = Job::query()->findOrFail($id);
        $employer = Employer::query()->findOrFail($job->employer_id);
        return view('job.job' , compact('job' , 'employer'));
    }

    public function home($id)
    {
        $job = Job::query()->findOrFail($id);
        $job->employer;
        $job->skills;
        $job->benefits;
        $job->positions;
        $job->types;
        $job->employer->location_name;
        $job->employer->size;
        $job->employer->skills;
        $job->employer->galleries;
        return response()->json($job);

    }

    public function delete($id)
    {
        $job = Job::query()->findOrFail($id);
        if ($job->employer_id == auth()->guard('employer')->user()->id)
            $job->delete();

        return redirect()->route('employer_profile');
    }
}
