<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(["middleware" => ["auth"]], function () {

    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::resource("/posts", PostController::class);
    Route::resource("/post_categories", PostCategoryController::class);
    Route::resource("/media", MediaController::class);
    Route::resource("/advertisements", AdvertisementController::class);

    Route::get('/storage-link', function () {
        Artisan::call('storage:link');
        return "storage linked";
    });

    Route::get('/cache-clear', function () {
        Artisan::call('cache:clear');
        return "cache cleared";
    });

    Route::get('/linkstorage', function () {
        $sourceStorage = base_path() . '/storage/app/public';
        $publicStorage =  $_SERVER['DOCUMENT_ROOT'] . '/storage';
        symlink($sourceStorage, $publicStorage);
    });
});

require __DIR__ . '/auth.php';
