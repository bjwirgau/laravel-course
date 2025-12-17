<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', function() {
    return '<h1>Available Jobs</h1>';
})->name('jobs');

Route::get('/test', function (Request $request) {
    return [
        'method' => $request->method(),
        'url' => $request->url(),
        'path' => $request->path(),
        'fullUrl' => $request->fullUrl(),
        'ip' => $request->ip(),
        'userAgent' => $request->userAgent(),
        'header' => $request->header(),
    ];
});

Route::get('/users', function(Request $request) {
    // return $request->query('name'); // get single query param
    // return $request->only(['name', 'age']); // get specified query params
    // return $request->all(); // get all query params
    // return $request->has('name'); // returns a boolean value wether query param exists or not
    // return $request->input('name', 'Default Name'); // this works both with URL query params and form input fields. Can return default value
    // return $request->except(['name']); // Returns all query param values except the specified param
});