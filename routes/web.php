<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/profile', function () {
    return view('admin.profile');
});
Route::get('/data-pekerjaan', function () {
    return view('admin.data-pekerjaan');
});
Route::get('/data-masyarakat', function () {
    return view('admin.data-masyarakat');
});

Route::get('/', function () {
    return view('home');
});
Route::get('/statistic', function () {
    return view('statistic');
});
