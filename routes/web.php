<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Jobs\JobController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::fallback(function () {
    return redirect()->route('login');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

Route::prefix('jobs')
    ->middleware('auth')
    ->group(function () {
        Route::post('save', [App\Http\Controllers\Jobs\JobController::class, 'saveJob'])->name('save.job');

        Route::post('apply', [App\Http\Controllers\Jobs\JobController::class, 'applyJob'])->name('apply.job');
    });

Route::get('/categories/single/{id}', [App\Http\Controllers\Categories\CategoryController::class, 'single'])
    ->middleware('auth')
    ->name('categories.single');

Route::prefix('user')
    ->middleware('auth')
    ->group(function () {
        Route::get('profile', [App\Http\Controllers\Users\ProfileController::class, 'viewProfile'])->name('profile');

        Route::get('applications', [App\Http\Controllers\Users\ProfileController::class, 'jobApplication'])->name('view.application');

        Route::get('savedJobs', [App\Http\Controllers\Users\ProfileController::class, 'savedJobs'])->name('view.saved');

        Route::get('edit-profile', [App\Http\Controllers\Users\ProfileController::class, 'editProfile'])->name('edit.profile');

        Route::post('update-profile', [App\Http\Controllers\Users\ProfileController::class, 'updateProfile'])->name('update.profile');

        Route::get('edit-cv', [App\Http\Controllers\Users\ProfileController::class, 'editCV'])->name('edit.cv');

        Route::post('update-cv', [App\Http\Controllers\Users\ProfileController::class, 'updateCV'])->name('update.cv');
    });

Route::post('/search-result', [App\Http\Controllers\HomeController::class, 'searchJobs'])->name('search.jobs');

Route::get('jobs/single/{id}', [App\Http\Controllers\Jobs\JobController::class, 'single'])->name('single.job');

Route::get('/admin/login', [App\Http\Controllers\Admins\AdminController::class, 'viewLogin'])->name('view.login');

Route::post('/admin/login-check', [App\Http\Controllers\Admins\AdminController::class, 'checkLogin'])->name('check.login');

Route::get('/admin', [App\Http\Controllers\Admins\AdminController::class, 'index'])->name('admin.dashboard');
