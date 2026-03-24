<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => [
            [
                'id' => 1,
                'title' => 'Laravel Senior Developer',
                'salary' => '100000',
            ],
            [
                'id' => 2,
                'title' => 'Laravel Junior Developer',
                'salary' => '50000',
            ],
            [
                'id' => 3,
                'title' => 'Laravel Sales Manager',
                'salary' => '120000',
            ],
        ]
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/jobs/{id}', function ($id) {
    $jobs = [
        [
            'id' => 1,
            'title' => 'Laravel Senior Developer',
            'salary' => '100000',
        ],
        [
            'id' => 2,
            'title' => 'Laravel Junior Developer',
            'salary' => '50000',
        ],
        [
            'id' => 3,
            'title' => 'Laravel Sales Manager',
            'salary' => '120000',
        ]
    ];

    # search for job with the given id. Utilizes php arrow function -> https://www.php.net/manual/en/functions.arrow.php
    $job = Arr::first($jobs, fn($job) => $job['id'] == $id);

    return view('job', ['job' => $job]);
});
