<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ContactFormController;
use App\Http\Controllers\Api\GeneralController;
use App\Http\Controllers\Api\MagazineController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\RollController;
use App\Http\Controllers\Api\SerieController;
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
Route::post('refresh-token', [AuthController::class, 'refreshToken']);
Route::get('me', [UserController::class, 'me'])->middleware('auth:api');

Route::get('get-categories', [CategoryController::class, 'getCategories']);
Route::get('get-news', [NewsController::class, 'getNews']);
Route::get('{newSlug}/get-new', [NewsController::class, 'getNew']);
Route::get('{categorySlug}/get-news-for-category', [NewsController::class, 'getNewsForCategory']);
Route::get('trend-news', [NewsController::class, 'getTrendNews']);

Route::get('get-magazines', [MagazineController::class, 'getMagazines']);
Route::get('{magazineSlug}/get-magazine', [MagazineController::class, 'getMagazine']);
Route::get('{magazineSlug}/{magazineIssueIssueMonth}/get-magazine-issue', [MagazineController::class, 'getMagazineIssue']);
Route::get('{magazineSlug}/get-news-for-magazine', [NewsController::class, 'getNewsForMagazine']);
Route::get('{magazineSlug}/get-magazine-issues', [MagazineController::class, 'getMagazineIssues']);
Route::get('{magazineSlug}/get-magazine-news', [MagazineController::class, 'getMagazineNews']);

Route::post('contact', [ContactFormController::class, 'contact']);
Route::post('subscribe', [SubscriberController::class, 'subscribe'])->middleware('auth:api');

Route::post('add-news-to-favorites', [NewsController::class, 'addNewsToFavorites'])->middleware('auth:api');
Route::get('get-favorites', [NewsController::class, 'getFavorites'])->middleware('auth:api');

Route::get('get-roll', [RollController::class, 'getRoll']);
Route::post('{roll}/roll-like', [RollController::class, 'like'])->middleware('auth:api');
Route::post('{roll}/roll-comment', [RollController::class, 'comment'])->middleware('auth:api');

Route::get('{roll}/get-likes', [RollController::class, 'getLikes'])->middleware('auth:api');
Route::get('{roll}/get-comments', [RollController::class, 'getComments'])->middleware('auth:api');

Route::post('update-profile', [UserController::class, 'updateProfile'])->middleware('auth:api');
Route::get('get-news-viewing-history', [UserController::class, 'getNewsViewingHistory'])->middleware('auth:api');
Route::post('search',[GeneralController::class, 'search']);
Route::post('change-password',[UserController::class, 'changePassword'])->middleware('auth:api');

Route::get('get-series', [SerieController::class, 'getSeries']);
Route::get('get-serie/{slug}', [SerieController::class, 'getSerie']);
Route::get('get-episode/{sectionSlug}', [SerieController::class, 'getEpisode']);
