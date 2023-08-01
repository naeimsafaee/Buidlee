<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{

    public function __invoke(Request $request)
    {
        return view('pages.contact_us');
    }

    public function submit(Request $request){
        Validator::make($request->all(), [
            'name' => ['required'],
            'email' => [ 'required', 'email'],
            'message' => ['required'],
        ], [
            'name.required' => "The telegram id is required.",
        ])->validate();

        ContactUs::query()->create([
            'name' =>$request->name,
            'email' =>$request->email,
            'message' =>$request->message,
        ]);

        return redirect()->route('home');
    }
}
