<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(){
        $jobs = Job::with('employer')->latest()->simplePaginate(3);

            return view('jobs.index', [
                'jobs' => $jobs
        ]);
    }
    public function create(){
        return view('jobs.create');
    }

public function show(job $job){
  // $job = Job::find($id);

  return view('jobs.show', ['job' => $job]);
}

public function store(){
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

}

public function edit(job $job){
     // $job = Job::find($id);
     return view('jobs.edit', ['job' => $job]);

}
public function update(job $job){
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    // authorize (On hold...)

    // $job = Job::findOrFail($id);

    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    return redirect('/jobs/' . $job->id);

}

public function destroy(job $job){
      //authorize
    //if the user is not authorized, redirect to home page
    //if(Auth::id()!=$job->employer_id) return redirect('/');
 //Find the job and delete it

 //Delete the job
//  $job = Job::findOrFail($id);
 $job->delete();
 //Redirect

 return redirect('/jobs');

 //redirect
 //return redirect()->route('jobs.show');





}

}
