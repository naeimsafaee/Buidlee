<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        Validator::make($request->all(), [
            'galleryPicture' => ['image' , 'mimes:jpg,png'],
        ], [])->validate();

        $file = $request->galleryPicture;
        $fileName = time() . '-' . rand() . '.' . $file->getClientOriginalExtension();
        Storage::disk('public')->put('files/' . $fileName, file_get_contents($file));

        Gallery::query()->create([
            'file' => 'files/' . $fileName ,
            'employer_id' => auth()->guard('employer')->user()->id,
        ]);

        return response()->json('ok');
    }
}
