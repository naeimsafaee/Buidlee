<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    public function __invoke(Request $request)
    {
        $jobseeker = auth()->guard('jobseeker')->user();
        return view('jobseeker.requests' , compact('jobseeker'));
    }
}
