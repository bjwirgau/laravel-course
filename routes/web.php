<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', function() {
    return '<h1>Available Jobs</h1>';
})->name('jobs');

Route::post('/submit', function () {
    return 'Submitted';
});

// Match both get and post routes for the URL /jobs/submit
// Route::match(['get', 'post'], '/jobs/submit', function() {
//     return '<h1>Match Submitted</h1>';
// });

// Match any request type for the URL /jobs/all
Route::any('/jobs/all', function () {
    return 'Submitted';
});

Route::get('/test', function () {
    $url = route('jobs');
    return "<a href='$url'>Click Here</a>";
});

Route::get('/api/users', function() {
    return [
        'name' => 'John Doe',
        'email' => 'john@email.com'
    ];
});