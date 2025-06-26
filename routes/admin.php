<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MagazineController;
use App\Http\Controllers\Admin\MagazineIssueController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\UserController;
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
    return view('admin.dashboard');
});

Route::get('home', function (){
    return view('home');
});

Route::get('gosterge-paneli', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::group(['as' => 'role.', 'prefix' => 'role'], function () {
    Route::get('index', [UserGroupController::class, 'index'])->name('index');
    Route::get('create', [UserGroupController::class, 'create'])->name('create');
    Route::post('store', [UserGroupController::class, 'store'])->name('store');
    Route::get('{role}/edit', [UserGroupController::class, 'edit'])->name('edit');
    Route::post('{role}/update', [UserGroupController::class, 'update'])->name('update');
});

Route::group(['as' => 'user.', 'prefix' => 'user'], function () {
    Route::get('index', [UserController::class, 'index'])->name('index');
    Route::get('create', [UserController::class, 'create'])->name('create');
    Route::post('store', [UserController::class, 'store'])->name('store');
    Route::get('{user}/edit', [UserController::class, 'edit'])->name('edit');
    Route::post('{user}/update', [UserController::class, 'update'])->name('update');
});

Route::group(['as' => 'news.', 'prefix' => 'news'], function () {
    Route::get('index', [NewsController::class, 'index'])->name('index');
    Route::get('create', [NewsController::class, 'create'])->name('create');
    Route::post('store', [NewsController::class, 'store'])->name('store');
    Route::get('{newsId}/edit', [NewsController::class, 'edit'])->name('edit');
    Route::post('{newsId}/update', [NewsController::class, 'update'])->name('update');

    Route::get('index/not-approved', [NewsController::class, 'notApproved'])->name('not-approved');
});

Route::group(['as' => 'category.', 'prefix' => 'category'], function () {
    Route::get('index', [CategoryController::class, 'index'])->name('index');
    Route::get('create', [CategoryController::class, 'create'])->name('create');
    Route::post('store', [CategoryController::class, 'store'])->name('store');
    Route::get('{category}/edit', [CategoryController::class, 'edit'])->name('edit');
    Route::post('{category}/update', [CategoryController::class, 'update'])->name('update');
});

Route::group(['as' => 'magazine.', 'prefix' => 'magazine'], function () {
    Route::get('index', [MagazineController::class, 'index'])->name('index');
    Route::get('create', [MagazineController::class, 'create'])->name('create');
    Route::post('store', [MagazineController::class, 'store'])->name('store');
    Route::get('{magazine}/edit', [MagazineController::class, 'edit'])->name('edit');
    Route::post('{magazine}/update', [MagazineController::class, 'update'])->name('update');
});

Route::group(['as' => 'magazine-issue.', 'prefix' => 'magazine-issue'], function () {
    Route::get('{magazine}/index', [MagazineIssueController::class, 'index'])->name('index');
    Route::get('{magazine}/create', [MagazineIssueController::class, 'create'])->name('create');
    Route::post('{magazine}/store', [MagazineIssueController::class, 'store'])->name('store');
    Route::get('{magazine}/{magazineIssue}/edit', [MagazineIssueController::class, 'edit'])->name('edit');
    Route::post('{magazineIssue}/update', [MagazineIssueController::class, 'update'])->name('update');
});

Auth::routes();


Route::get('/auth/google', function () {
    $query = http_build_query([
        'client_id'     => env('GOOGLE_CLIENT_ID'),
        'redirect_uri'  => env('GOOGLE_REDIRECT_URI'),
        'response_type' => 'code',
        'scope'         => 'openid email profile',
        'access_type'   => 'offline',
        'prompt'        => 'consent',
    ]);

    dd('https://accounts.google.com/o/oauth2/v2/auth?' . $query);

    return redirect('https://accounts.google.com/o/oauth2/v2/auth?' . $query);
});

Route::get('/auth/google/callback', function (Illuminate\Http\Request $request) {
    $code = $request->get('code');

    // 1. Access token al
    $response = Http::asForm()->post('https://oauth2.googleapis.com/token', [
        'client_id'     => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect_uri'  => env('GOOGLE_REDIRECT_URI'),
        'grant_type'    => 'authorization_code',
        'code'          => $code,
    ]);

    $accessToken = $response->json()['access_token'];

    // 2. Kullanıcı bilgilerini al
    $googleUser = Http::withHeaders([
        'Authorization' => 'Bearer ' . $accessToken,
    ])->get('https://www.googleapis.com/oauth2/v3/userinfo')->json();

    // 3. Kullanıcıyı kaydet veya login
    $user = User::updateOrCreate(
        ['email' => $googleUser['email']],
        ['name' => $googleUser['name'], 'google_id' => $googleUser['sub']]
    );

    Auth::login($user);

    return redirect('/dashboard');
});
