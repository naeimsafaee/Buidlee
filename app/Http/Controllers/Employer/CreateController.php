<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Benefits;
use App\Models\BenefitToJob;
use App\Models\Category;
use App\Models\CategoryToJob;
use App\Models\Job;
use App\Models\Position;
use App\Models\PositionToJob;
use App\Models\SkilToJob;
use App\Models\Type;
use App\Models\TypeToJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateController extends Controller {

    public function __invoke(Request $request) {
        $types = Type::all();
        $benefits = Benefits::all();
        $positions = Position::all();
        $categories = Category::all();
        return view('employer.create', compact('types', 'benefits', 'positions', 'categories'));
    }

    public function create_submit(Request $request) {
        Validator::make($request->all(), [
            'title' => ['required'],
            'Positions' => ['required'],
            'types' => ['required'],
            'categories' => ['required'],
            'about' => ['required'],
            'level' => ['required'],
        ], [
        ])->validate();

        $is_crypto = false;

        if ($request->has("crypto"))
            $is_crypto = true;

        $job = Job::query()->create([
            'employer_id' => auth()->guard('employer')->user()->id,
            'title' => $request->title,
            'salary_from' => $request->salary_from,
            'salary_to' => $request->salary_to,
            'salary_period' => $request->salary_id,
            'level' => $request->level,
            'about' => $request->about,
            'is_pay' => false ,
            'crypto' => $is_crypto,

        ]);

        if ($request->has('skills')) {
            foreach ($request->skills as $skill) {
                SkilToJob::query()->create([
                    'name' => $skill,
                    'job_id' => $job->id,

                ]);
            }
        }

        if ($request->has('Benefits')) {
            foreach ($request->Benefits as $benefit) {
                BenefitToJob::query()->create([
                    'benefit_id' => $benefit,
                    'job_id' => $job->id,

                ]);
            }
        }

        if ($request->has('Positions')) {
            foreach ($request->Positions as $position) {
                PositionToJob::query()->create([
                    'position_id' => $position,
                    'job_id' => $job->id,

                ]);
            }
        }

        if ($request->has('types')) {
            foreach ($request->types as $type) {
                TypeToJob::query()->create([
                    'type_id' => $type,
                    'job_id' => $job->id,

                ]);
            }
        }
        if ($request->has('categories')) {
            foreach ($request->categories as $category) {
                CategoryToJob::query()->create([
                    'category_id' => $category,
                    'job_id' => $job->id,

                ]);
            }
        }
//        return redirect()->route('job_pay' , $job->id);

        return redirect()->route('employer_promote' , $job->id );

    }

    public function promote(Request $request, $id = false) {
        $job= false ;
        if ($id){
            $job = Job::query()->findOrFail($id);
            if ($job->employer->id != auth()->guard('employer')->user()->id)
                return abort(404);
        }

        return view('employer.create2', compact('id' , 'job'));
    }

    public function delete($id) {
        $job = Job::query()->findOrFail($id);

        if ($job->is_job)
            $job->delete();

        return redirect()->route('employer_profile');
    }

}
