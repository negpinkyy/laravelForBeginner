<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;


Route::get('/', function () {
// $jobs=Job::all();
// dd($jobs);

   return view('home');
});
Route::get('/jobs', function ()  {
$jobs=Job::with('employer')->cursorPaginate(3);
//$jobs=Job::with('employer')->paginate(3);
    return view(
  'jobs',[
        'jobs'=>$jobs,
       ]);
});
Route::get('/jobs/{id}', function ($id)  {

    $job =Job::find($id);
    // dd($job);
    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
