<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job\Job;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jobs = Job::select()
            ->take(5)
            ->orderby('id', 'desc')
            ->get();
        $allJobs = Job::all()->count();
        return view('home', compact('jobs', 'allJobs'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function searchJobs(Request $request)
    {
        $job_title = $request->job_title;
        $job_region = $request->job_region;
        $job_type = $request->job_type;

        $resultJobs = Job::where('job_title', 'like', "%$job_title%")
            ->where('job_region', 'like', "%$job_region%")
            ->where('job_type', 'like', "%$job_type%")
            ->get();

        if ($resultJobs) {
            return view('jobs.search', compact('resultJobs'));
        }
    }
}
