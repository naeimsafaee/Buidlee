<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function __invoke(Request $request)
    {
        $employer = auth()->guard('employer')->user();
        return view('employer.profile' , compact('employer'));

    }

    public function avatar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'avatarPicture' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray(),
                'data' => $request->all(),
            ], 200);
        }
        $file = $request->avatarPicture;
        $fileName = time() . '-' . rand() . '.' . $file->getClientOriginalExtension();
        Storage::disk('public')->put('files/' . $fileName, file_get_contents($file));
        $employer = auth()->guard('employer')->user();
        $employer->avatar = 'files/' . $fileName;
        $employer->save();
        return response()->json('ok');

    }
}
