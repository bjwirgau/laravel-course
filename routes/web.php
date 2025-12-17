<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', function() {
    return '<h1>Available Jobs</h1>';
})->name('jobs');

Route::get('/test', function () {
    return response('<h1>Hello World!</h1>', 200)->header('Content-Type', 'text/html');
});

Route::get('/json', function() {
    return response()->json(['name' => 'John Doe'])->cookie('name', 'John Doe');;
});

Route::get('/read-cookie', function(Request $request) {
    $cookieValue = $request->cookie('name');
    
    return response()->json(['cookie' => $cookieValue]);
});

Route::get('/download', function() {
    return response()->download(public_path('favicon.ico'));
});

Route::get('/notfound', function () {
    return new Response('Not Found', 404);
});