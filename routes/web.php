<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

// Index
Route::get('/', function () {
    return view('home');
});

// Job List
Route::get('/jobs', function ()  {
    $job = Job::with('employer')->latest()->simplePaginate(6);

    return view('jobs.index', [
        'jobs' => $job
    ]);
});

// Create (visit page)
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Show -> details of job
Route::get('/jobs/{id}', function ($id)  {
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});

// Create (form submit)
Route::post('/jobs', function ()  {
    
    // Input validation
    request()->validate([
        'title' => ['required', 'min:8'],
        'salary' => ['required']
    ]);

    // DB insert input
    Job::create([
        'title'=>request('title'),
        'salary'=>request('salary'),
        'employer_id'=>1
    ]);

    return redirect('/jobs');
});

// Edit
Route::get('/jobs/{id}/edit', function ($id)  {
    $job = Job::find($id);
    return view('jobs.edit', ['job' => $job]);
});

// Update
Route::patch('/jobs/{id}', function ($id)  {

    // Validate the input
    request()->validate([
        'title' => ['required', 'min:8'],
        'salary' => ['required']
    ]);
    // Authorize (is the user has permission) on hold...

    // Update the job
    $job = Job::findOrFail($id); // if null automatic fail

    $job->update([
        'title' => request('title'),
        'salary' => request('salary')
    ]);

    // and persist
    // Redirect to the job page
    return redirect('/jobs/' . $job->id);

});

// Destroy
Route::delete('/jobs/{id}', function ($id)  {
    // authorize

    // delete the job
    Job::findOrFail($id)->delete();

    // redirect
    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
