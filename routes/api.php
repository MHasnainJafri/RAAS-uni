<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\adminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('/login',[adminController::class,'login']);
Route::post('/studentlist',[adminController::class,'studentlist']);
Route::post('/teacherlist',[adminController::class,'getTeacherList']);
Route::post('/trainedstudents',[adminController::class,'trainedstudents']);
Route::post('/untrainedstudent',[adminController::class,'untrainedstudent']);
Route::post('/login',[adminController::class,'login']);
Route::get('detail',[adminController::class,'userDetail'])->middleware('auth:sanctum','abilities:admin');
Route::post('/registerstudent',[adminController::class,'addstudent'])->middleware('auth:sanctum');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
