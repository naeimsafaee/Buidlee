<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Benefits;
use App\Models\Category;
use App\Models\Job;
use App\Models\Position;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller {

    public function __invoke(Request $request) {
//        die(json_encode(Carbon::now()->addDays(30)));

        $jobs_count = Job::all()->count();
        $jobs = Job::query()->paginate(setting('home.jobs'));
        $categories = Category::all();
        $benefits = Benefits::all();
        $positions = Position::all();
        $type = Type::all();

        foreach(Job::all() as $job)
            if ($job->expiry_at)
                if (Carbon::now() >= $job->expiry_at) {
                    $job->expiry_at = null;
                    $job->promote_in_home = false;
                    $job->promote_in_category = false;
                    $job->save();
                }

        return view('pages.home', compact('jobs_count', 'jobs', 'categories', 'benefits',
            'positions', 'type'));
    }

    public function search(Request $request) {

        $page = $request->page;
        if ($page < 1)
            $page = 1;

        $jobs = Job::query();

        if ($request->positions) {
            $positions = $request->positions;
            //            foreach($request->positions as $position)
//            die(json_encode($positions));
            $jobs = $jobs->whereHas('positions', function(Builder $query) use ($positions) {
                //                    $query->where('positions.id' , $position);
                $query->whereIn('positions.id', $positions); // where in for array
            });
        }

        if ($request->benefits) {
            $benefits = $request->benefits;
            $jobs = $jobs->whereHas('benefits', function(Builder $query) use ($benefits) {
                //                $query->where('benefits.id', $benefit);
                $query->whereIn('benefits.id', $benefits); // where in for array
            });
        }

        if ($request->types) {
            $types = $request->types;

            $jobs = $jobs->whereHas('types', function(Builder $query) use ($types) {
                //                $query->where('types.id', $type);
                $query->whereIn('types.id', $types); // where in for array

            });
        }

        if ($request->categories) {
            $categories = $request->categories;

            $jobs = $jobs->whereHas('categories', function(Builder $query) use ($categories) {
                $query->whereIn('categories.id', $categories);
            });
        }

        if ($request->date_posted) {
            $date_posted = $request->date_posted;
            switch($date_posted) {
                case 0:
                default:
                    $jobs = $jobs->orderByDesc('created_at');

                    break;
                case 1:
                    $jobs = $jobs->where('created_at', '>=', Carbon::now()->subMonth())->orderByDesc('created_at');
                    break;
                case 2:
                    $jobs = $jobs->where('created_at', '>=', Carbon::now()->subWeek())->orderByDesc('created_at');

                    break;
                case 3:
                    $jobs = $jobs->where('created_at', '>=', Carbon::now()->subDay())->orderByDesc('created_at');

                    break;
            }
        }

        $jobs = $jobs->where(
            function($query) {
                return $query
                    ->where('promote_in_category', true)
                    ->orWhere('promote_in_home', true);
            })
            ->orderByDesc('promote_in_category')->orderByDesc('created_at');

        if ($request->search)
            $jobs = $jobs->where('title', 'LIKE', "%$request->search%");

        if ($request->level && $request->level != 0)
            $jobs = $jobs->where('level', $request->level);

        $jobs = $jobs->with('employer.location_name')->paginate(setting('home.jobs'), ['*'], 'page', $page);

        return response()->json($jobs);
    }

    public function get_category(Request $request) {

        $category = Category::query()->where('name', 'LIKE', "%$request->name%")->get();

        return response()->json($category);
    }

}
