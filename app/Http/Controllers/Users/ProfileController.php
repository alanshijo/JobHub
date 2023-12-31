<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job\JobApplication;
use App\Models\Job\Job;
use App\Models\Job\SaveJob;
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

    public function savedJobs()
    {
        $jobs = SaveJob::where('user_id', Auth::user()->id)->get();

        $jobIds = $jobs->pluck('job_id');

        $matchingJobs = Job::whereIn('id', $jobIds)->get();

        return view('users.savedJobs', compact('matchingJobs'));
    }

    public function editProfile()
    {
        return view('users.editProfile');
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $request->validate(
            [
                'full_name' => 'required|alpha_spaces',
            ],
            [
                'full_name.alpha_spaces' => 'The field must contain only alphabetic characters.',
            ],
        );

        $user->update([
            'name' => $request->full_name,
            'job_title' => $request->job_title,
            'bio' => $request->bio,
            'fb' => $request->fb,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
        ]);

        if ($user) {
            return redirect('/user/profile')->with('success', 'Profile updated successfully.');
        }
    }

    public function editCV()
    {
        return view('users.editCV');
    }

    public function updateCV(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $request->validate([
            'cv_file' => 'required|file|mimes:pdf,docx',
        ]);

        if ($request->hasFile('cv_file')) {
            $cvFile = $request->file('cv_file');
            $fileName = time() . '_' . $cvFile->getClientOriginalName();
            $destinationPath = public_path('assets/cvs');
            $cvFile->move($destinationPath, $fileName);

            $user->cv_file = $fileName;
            $user->save();
        }

        return redirect('/user/profile')->with('success', 'CV updated successfully.');
    }
}
