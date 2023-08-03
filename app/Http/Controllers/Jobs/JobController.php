<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job\Job;

class JobController extends Controller
{
    public function single($id){
        
        $job = Job::find($id);
        
        $relatedJobs = Job::where('cat_id', $job->cat_id)
                  ->where('id', '!=', $job->id)
                  ->take(5)
                  ->get();

        $relatedJobsCount = Job::where('cat_id', $job->cat_id)
                  ->where('id', '!=', $job->id)
                  ->take(5)
                  ->count();

        return view('jobs.single', compact('job', 'relatedJobs', 'relatedJobsCount'));
    }
}
