<?php

use App\Http\Controllers\UserWeightSettingController;
use App\Http\Controllers\WeightManagementController;
use Illuminate\Support\Facades\Route;

Route::get('/register/step2',[UserWeightSettingController::class,'index']);
Route::post('/register/step2',[UserWeightSettingController::class,'create']);

Route::get('/weight-logs/target-setting',[UserWeightSettingController::class,'show']);
Route::get('/weight-logs/dashboard',[WeightManagementController::class,'index']);
Route::get('/weight-logs/search',[WeightManagementController::class,'search']);
Route::post('/weight-logs/create',[WeightManagementController::class,'create']);
