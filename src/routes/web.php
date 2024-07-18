<?php

use App\Http\Controllers\WeightManagementController;
use Illuminate\Support\Facades\Route;

Route::get('/weight-logs',[WeightManagementController::class,'index']);
