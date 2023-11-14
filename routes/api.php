<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\API\CompanyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api')->group(function () {
Route::resource('company', CompanyController::class);
Route::resource('employee', EmployeeController::class);
});

Route::controller(EmployeeController::class)->group(function () {
    Route::post('login','loginUser');
});
Route::controller(EmployeeController::class)->group(function () {
    Route::get('user','getUserDetail');
    Route::get('users','users');
    Route::get('logout','userLogout');
})->middleware('auth:api');
