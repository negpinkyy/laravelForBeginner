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

//Stores
Route::Post('/jobs/', function () {
    request()->validate([
        'title' =>['required','max:3'],
       'salary' =>['required']
    ]);
    request()->validate([
        'title' =>['required','min:3'],
       'salary' =>['required']
    ]);
   Job::create([
    'title'=>request('title'),
    'employer_id'=>1,
    'salary'=>request('salary'),
   ]);
   return redirect('/jobs');
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});
//Edit
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);
    return view('jobs.edit', ['job' => $job]);
});


//update
// Update
Route::patch('/jobs/{id}', function ($id) {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    // authorize (On hold...)

    $job = Job::findOrFail($id);

    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    return redirect('/jobs/' . $job->id);
});


//delete
Route::delete('/jobs/{id}', function ($id) {
    //authorize
    //if the user is not authorized, redirect to home page
    //if(Auth::id()!=$job->employer_id) return redirect('/');
 //Find the job and delete it

 //Delete the job
 $job = Job::findOrFail($id);
 $job->delete();
    //Redirect

    return redirect('/jobs');

    //redirect
    //return redirect()->route('jobs.show');



});

Route::get('/contact', function () {
    return view('contact');
});

