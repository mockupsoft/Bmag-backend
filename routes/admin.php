<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EpisodeController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\MagazineController;
use App\Http\Controllers\Admin\MagazineIssueController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\RollCommentController;
use App\Http\Controllers\Admin\RollController;
use App\Http\Controllers\Admin\SeasonController;
use App\Http\Controllers\Admin\SerieController;
use App\Http\Controllers\Admin\SettingController;
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

Route::group(['middleware' => 'auth'], function () {
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

    Route::group(['as' => 'roll.', 'prefix' => 'roll'], function () {
        Route::get('{magazine}/index', [RollController::class, 'index'])->name('index');
        Route::get('{magazine}/create', [RollController::class, 'create'])->name('create');
        Route::post('{magazine}/store', [RollController::class, 'store'])->name('store');
    });

    Route::group(['as' => 'roll-comments.', 'prefix' => 'roll-comments'], function () {
        Route::get('index', [RollCommentController::class, 'index'])->name('index');
        Route::get('{rollComment}/edit', [RollCommentController::class, 'edit'])->name('edit');
        Route::post('{rollComment}/update', [RollCommentController::class, 'update'])->name('update');
    });

    Route::group(['as' => 'settings.', 'prefix' => 'settings'], function () {
        Route::get('edit', [SettingController::class, 'edit'])->name('edit');
        Route::post('update', [SettingController::class, 'update'])->name('update');
    });

    Route::group(['as' => 'file.', 'prefix' => 'file'], function () {
        Route::get('index', [FileController::class, 'index'])->name('index');
        Route::get('create', [FileController::class, 'create'])->name('create');
        Route::post('store', [FileController::class, 'store'])->name('store');
    });

    Route::group(['as' => 'serie.', 'prefix' => 'serie'], function () {
        Route::get('index', [SerieController::class, 'index'])->name('index');
        Route::get('create', [SerieController::class, 'create'])->name('create');
        Route::post('store', [SerieController::class, 'store'])->name('store');
        Route::get('{serie}/edit', [SerieController::class, 'edit'])->name('edit');
        Route::post('{serie}/update', [SerieController::class, 'update'])->name('update');
    });

    Route::group(['as' => 'season.', 'prefix' => 'season'], function () {
        Route::get('{serieId}/index', [SeasonController::class, 'index'])->name('index');
        Route::get('{serieId}/create', [SeasonController::class, 'create'])->name('create');
        Route::post('{serieId}/store', [SeasonController::class, 'store'])->name('store');
        Route::get('{season}/edit', [SeasonController::class, 'edit'])->name('edit');
        Route::post('{season}/update', [SeasonController::class, 'update'])->name('update');
    });

    Route::group(['as' => 'episode.', 'prefix' => 'episode'], function () {
        Route::get('{serieId}/{seasonId}/index', [EpisodeController::class, 'index'])->name('index');
        Route::get('{serieId}/{seasonId}/create', [EpisodeController::class, 'create'])->name('create');
        Route::post('{serieId}/{seasonId}/store', [EpisodeController::class, 'store'])->name('store');
        Route::get('{season}/edit', [EpisodeController::class, 'edit'])->name('edit');
        Route::post('{season}/update', [EpisodeController::class, 'update'])->name('update');
    });
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
