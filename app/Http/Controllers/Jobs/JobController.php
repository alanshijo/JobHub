<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job\Job;
use App\Models\Job\SaveJob;
use Auth;

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

        $savedCount = SaveJob::where('job_id', $id)
        ->where('user_id', Auth::user()->id)
        ->count();

        return view('jobs.single', compact('job', 'relatedJobs', 'relatedJobsCount', 'savedCount'));
    }

    public function saveJob(Request $request){

        $savedJob = SaveJob::create([
            'job_id' => $request->job_id,
            'user_id' => $request->user_id

    ]);

    if($savedJob){
        return redirect('/jobs/single/'.$request->job_id.'')->with('success', 'Job saved successfully.');
    }

    }
}
