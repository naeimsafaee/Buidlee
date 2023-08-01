<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use App\Models\JobseekerToJob;
use Illuminate\Http\Request;

class RequestsController extends Controller
{

    public function __invoke(Request $request)
    {
        $employer = auth()->guard('employer')->user();
        return view('employer.requests' , compact('employer'));
    }

    public function submit(Request $request)
    {
        $job_request = JobseekerToJob::query()->findOrFail($request->request_id);
        if ($request->is_accept == '1'){
            $job_request->status = 'accept';
            $job_request->save();
        }
        else{
            $job_request->status = 'reject';
            $job_request->description = $request->description;
            $job_request->save();
        }

        return response()->json('ok');
    }
}
