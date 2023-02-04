<?php

use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InboxController;
use App\Http\Controllers\Admin\PortofolioController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

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

Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::prefix('web_management')->group(function() {

        Route::prefix('dashboard')->controller(DashboardController::class)->group(function() {
            Route::get('/', 'index')->name('admin.dashboard');
            Route::get('/visitor-stats', 'visitorStats')->name('admin.dashboard.visitor-stats');
        });

        Route::prefix('inbox')->controller(InboxController::class)->group(function() {
            Route::get('/', 'index')->name('admin.inbox.index');
        });

        Route::prefix('posts')->controller(PostController::class)->group(function() {
            Route::get('/', 'index')->name('admin.post.index');
            Route::post('/store', 'store')->name('admin.post.store');
            Route::post('/update', 'update')->name('admin.post.update');
            Route::delete('/{post}/delete', 'destroy')->name('admin.post.destroy');
            Route::post('/upload_image', 'upload_image')->name('admin.post.uploadimage');
            Route::get('/getpostcategories', 'get_post_categories')->name('admin.post.getpostcategories');
        });


        Route::prefix('portofolios')->controller(PortofolioController::class)->group(function() {
            Route::get('/', 'index')->name('admin.portofolio.index');
            Route::post('/store', 'store')->name('admin.portofolio.store');
            Route::post('/update', 'update')->name('admin.portofolio.update');
            Route::delete('/{post}/delete', 'destroy')->name('admin.portofolio.destroy');
            Route::post('/upload_image', 'upload_image')->name('admin.portofolio.uploadimage');
        });

        Route::prefix('services')->controller(ServiceController::class)->group(function() {
            Route::get('/', 'index')->name('admin.service.index');
            Route::post('/store', 'store')->name('admin.service.store');
            Route::post('/update', 'update')->name('admin.service.update');
            Route::delete('/{post}/delete', 'destroy')->name('admin.service.destroy');
            Route::post('/upload_image', 'upload_image')->name('admin.service.uploadimage');
        });

        Route::prefix('post_categories')->controller(PostCategoryController::class)->group(function() {
            Route::post('/store', 'store')->name('admin.post_category.store');
        });
    });
});
