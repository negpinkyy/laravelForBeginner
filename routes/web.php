<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(3);

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});
Route::get('/jobs/create', function () {
    return view('jobs.create');
});
Route::Post('/jobs/', function () {
   //  request()
   Job::create([
    'title'=>'Frontend',
    'employer_id'=>1,
    'salary'=>'$30,000'
   ]);
   return redirect('/jobs');
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('job.show', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});

