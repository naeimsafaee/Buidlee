<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Location;
use App\Models\Size;
use App\Models\SkilToEmployer;
use Illuminate\Http\Request;

class EditProfileController extends Controller
{

    public function __invoke(Request $request)
    {
        $employer = auth()->guard('employer')->user();
        $sizes = Size::all();
        $locations = Location::all();
        $categories = Category::all();
        return view('employer.editprofile', compact('employer', 'sizes', 'locations', 'categories'));
    }

    public function edit(Request $request)
    {
        $web = $request->website ;
        if(! str_contains($request->website, 'http'))
            $web = 'http://' . $request->website ;

        $social = $request->social;
        if(! str_contains($request->social, 'http'))
            $social = 'http://' . $request->social ;

        $employer = auth()->guard('employer')->user();
        $employer->company_name = $request->company_name;
        $employer->ceo = $request->ceo;
        $employer->email = $request->email;
        $employer->website = $web;
        $employer->location = $request->location;
        $employer->social = $social;
        $employer->address = $request->address;
        $employer->about = $request->about;
        $employer->save();

        return redirect()->route('employer_profile');
    }
}
