<?php

use Illuminate\Support\Facades\Route;

Route::get('/weight-logs', function () {
    return view('dashboard');
});
