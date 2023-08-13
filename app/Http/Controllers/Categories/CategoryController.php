<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category\Category;
use App\Models\Job\Job;

class CategoryController extends Controller
{
    public function single($id)
    {
        $category = Category::find($id);

        $jobs = Job::where('cat_id', $id)->get();

        $jobsCount = Job::where('cat_id', $id)
            ->get()
            ->count();

        return view('categories.single', compact('category', 'jobs', 'jobsCount'));
    }
}
