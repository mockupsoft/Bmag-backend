<?php

use App\Http\Controllers\Admin\UserGroupController;
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
    return view('admin.index');
});

Route::get('home', function (){
    return view('home');
});

Route::group(['as' => 'role.', 'prefix' => 'role'], function () {
    Route::get('index', [UserGroupController::class, 'index'])->name('index');
    Route::get('{role}/edit', [UserGroupController::class, 'edit'])->name('edit');
    Route::post('{role}/update', [UserGroupController::class, 'update'])->name('update');
});

Auth::routes();
