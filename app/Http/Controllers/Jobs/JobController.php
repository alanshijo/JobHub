<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job\Job;
use App\Models\Job\SaveJob;
use App\Models\Job\JobApplication;
use App\Models\Category\Category;
use Auth;

class JobController extends Controller
{
    public function single($id)
    {
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

        $appliedCount = JobApplication::where('job_id', $id)
            ->where('user_id', Auth::user()->id)
            ->count();

        $categories = Category::all();

        return view('jobs.single', compact('job', 'relatedJobs', 'relatedJobsCount', 'savedCount', 'appliedCount', 'categories'));
    }

    public function saveJob(Request $request)
    {
        $savedJob = SaveJob::create([
            'job_id' => $request->job_id,
            'user_id' => $request->user_id,
        ]);

        if ($savedJob) {
            return redirect('/jobs/single/' . $request->job_id . '')->with('success', 'Job saved successfully.');
        }
    }

    public function applyJob(Request $request)
    {
        if (Auth::user()->cv_file == null) {
            return redirect('/jobs/single/' . $request->job_id . '')->with('no_cv', 'Upload your resume before you continue.');
        } else {
            $applyJob = JobApplication::create([
                'cv_file' => Auth::user()->cv_file,
                'user_id' => Auth::user()->id,
                'job_id' => $request->job_id,
            ]);
        }

        if ($applyJob) {
            return redirect('/jobs/single/' . $request->job_id . '')->with('applied', 'Your application has been submitted successfully.');
        }
    }
}
