<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/jobs', function (){
    $jobs = Job::with('employer')->cursorPaginate(3);
    return view('jobs', ['jobs' => $jobs]);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/jobs/{id}', function ($id) {
    # search for job with the given id. Utilizes php arrow function -> https://www.php.net/manual/en/functions.arrow.php
    $job = Job::find($id);
    if (!$job) {
        return redirect('/jobs');
    }
    return view('job', ['job' => $job]);
});
