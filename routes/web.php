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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/jobs/single/{id}', [App\Http\Controllers\Jobs\JobController::class, 'single'])->name('single.job');

Route::post('/jobs/save', [App\Http\Controllers\Jobs\JobController::class, 'saveJob'])->name('save.job');

Route::post('/jobs/apply', [App\Http\Controllers\Jobs\JobController::class, 'applyJob'])->name('apply.job');

Route::get('/categories/single/{id}', [App\Http\Controllers\Categories\CategoryController::class, 'single'])->name('categories.single');

Route::get('/user/profile', [App\Http\Controllers\Users\ProfileController::class, 'viewProfile'])->name('profile');

Route::get('/user/applications', [App\Http\Controllers\Users\ProfileController::class, 'jobApplication'])->name('view.application');

Route::get('/user/savedJobs', [App\Http\Controllers\Users\ProfileController::class, 'savedJobs'])->name('view.saved');

Route::get('/user/edit-profile', [App\Http\Controllers\Users\ProfileController::class, 'editProfile'])->name('edit.profile');

Route::post('/user/update-profile', [App\Http\Controllers\Users\ProfileController::class, 'updateProfile'])->name('update.profile');

Route::get('/user/edit-cv', [App\Http\Controllers\Users\ProfileController::class, 'editCV'])->name('edit.cv');

Route::post('/user/update-cv', [App\Http\Controllers\Users\ProfileController::class, 'updateCV'])->name('update.cv');
