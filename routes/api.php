<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ContactFormController;
use App\Http\Controllers\Api\MagazineController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\SubscriberController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

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

Route::post('register', [AuthController::class, 'register']);
Route::post('check-verification-code', [AuthController::class, 'checkVerificationCode']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');
Route::post('refresh-token', [AuthController::class, 'refreshToken'])->middleware('auth:api');
Route::get('me', [UserController::class, 'me'])->middleware('auth:api');

Route::get('get-categories', [CategoryController::class, 'getCategories']);
Route::get('get-news', [NewsController::class, 'getNews']);
Route::get('{newSlug}/get-new', [NewsController::class, 'getNew']);
Route::get('{categorySlug}/get-news-for-category', [NewsController::class, 'getNewsForCategory']);

Route::get('get-magazines', [MagazineController::class, 'getMagazines']);
Route::get('{magazineSlug}/get-magazine', [MagazineController::class, 'getMagazine']);
Route::get('{magazineIssueIssueDate}/get-magazine-issue', [MagazineController::class, 'getMagazineIssue']);
Route::get('{magazineSlug}/get-news-for-magazine', [NewsController::class, 'getNewsForMagazine']);
Route::get('{magazineSlug}/get-magazine-issues', [MagazineController::class, 'getMagazineIssues']);
Route::get('{magazineSlug}/get-magazine-news', [MagazineController::class, 'getMagazineNews']);

Route::post('contact', [ContactFormController::class, 'contact']);
Route::post('subscribe', [SubscriberController::class, 'subscribe'])->middleware('auth:api');

Route::post('add-news-to-favorites', [NewsController::class, 'addNewsToFavorites'])->middleware('auth:api');
Route::get('get-favorites', [NewsController::class, 'getFavorites'])->middleware('auth:api');
