<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', function() {
    $title = 'Available Jobs';
    $jobs = [
        'Software Engineer',
        'Data Scientist',
        'Product Manager',
        'UX Designer'
    ];

    // Method 1
    // return view('jobs.index', [
    //     'title' => 'Available Jobs'
    // ]);

    // Method 2
    // return view('jobs.index')
    //     ->with('title', $title)
    //     ->with('jobs', $jobs);

    // Method 3
    return view('jobs.index', compact('title', 'jobs'));

})->name('jobs');

Route::get('/jobs/create', function() {
    return view('jobs.create');
})->name('jobs.create');