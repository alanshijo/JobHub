<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job\JobApplication;
use App\Models\Job\Job;
use Auth;

class ProfileController extends Controller
{
    public function viewProfile()
    {
        return view('users.profile');
    }

    public function jobApplication()
    {
        $jobs = JobApplication::where('user_id', Auth::user()->id)->get();

        $jobIds = $jobs->pluck('job_id');

        $matchingJobs = Job::whereIn('id', $jobIds)->get();

        return view('users.applications', compact('matchingJobs'));
    }
}
