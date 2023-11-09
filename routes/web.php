<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('auth', 'permissions')->group(function () {
    Route::resource('company', CompanyController::class);
    Route::resource('employee', EmployeeController::class);
});

Route::middleware('auth', 'accessPermissions')->group(function () {
    Route::resource('permission', PermissionController::class);
});

Route::middleware('auth', 'accessRoles')->group(function () {
Route::post('role/revoke-permission', [RoleController::class, 'revokePermission'])->name('role.revokePermission');
Route::post('role/{role}', [RoleController::class, 'givePermission'])->name('role.permissions');
Route::resource('role', RoleController::class);
});
