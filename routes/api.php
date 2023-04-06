<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\JurusanController;
use App\http\Controllers\BukuController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/getjurusan',[JurusanController::class,'getjurusan']);
Route::get('/getbuku',[BukuController::class,'getbuku']);
Route::get('/getid/{id}',[JurusanController::class,'getid']);
Route::get('/getid/{id}',[BukuController::class,'getid']);
Route::post('createjurusan',[JurusanController::class,'createjurusan']);
Route::post('createbuku',[BukuController::class,'createbuku']);
Route::put('updatejurusan',[JurusanController::class,'updatejurusan']);
Route::put('updatebuku',[BukuController::class,'updatebuku']);
Route::delete('/deletejurusan/{id}',[JurusanController::class,'deletejurusan']);
Route::delete('/deletebuku/{id}',[BukuController::class,'deletebuku']);