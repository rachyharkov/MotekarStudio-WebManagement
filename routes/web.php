<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\AuthController;
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

        // Route::prefix('posts')->controller(PostController::class)->group(function() {
        //     Route::get('/', 'index')->name('admin.posts.index');
        //     Route::get('/create', 'create')->name('admin.posts.create');
        //     Route::post('/store', 'store')->name('admin.posts.store');
        //     Route::get('/{post}/edit', 'edit')->name('admin.posts.edit');
        //     Route::put('/{post}/update', 'update')->name('admin.posts.update');
        //     Route::delete('/{post}/delete', 'destroy')->name('admin.posts.destroy');
        //     Route::post('/upload_image', 'upload_image')->name('admin.posts.uploadimage');
        // });

        // Route::prefix('productandservices')->controller(ProductAndServiceController::class)->group(function() {
        //     Route::get('/', 'index')->name('admin.productandservices.index');
        //     Route::get('/create', 'create')->name('admin.productandservices.create');
        //     Route::post('/store', 'store')->name('admin.productandservices.store');
        //     Route::get('/{productandservice}/edit', 'edit')->name('admin.productandservices.edit');
        //     Route::put('/{productandservice}/update', 'update')->name('admin.productandservices.update');
        //     Route::delete('/{productandservice}/delete', 'destroy')->name('admin.productandservices.destroy');
        // });

        // Route::prefix('projects')->controller(ProjectController::class)->group(function() {
        //     Route::get('/', 'index')->name('admin.projects.index');
        //     Route::get('/create', 'create')->name('admin.projects.create');
        //     Route::post('/store', 'store')->name('admin.projects.store');
        //     Route::get('/{project}/edit', 'edit')->name('admin.projects.edit');
        //     Route::put('/{project}/update', 'update')->name('admin.projects.update');
        //     Route::delete('/{project}/delete', 'destroy')->name('admin.projects.destroy');
        // });

        // Route::prefix('users')->controller(UserController::class)->group(function() {
        //     Route::get('/', 'index')->name('admin.users.index');
        //     Route::get('/create', 'create')->name('admin.users.create');
        //     Route::post('/store', 'store')->name('admin.users.store');
        //     Route::get('/{user}/edit', 'edit')->name('admin.users.edit');
        //     Route::put('/{user}/update', 'update')->name('admin.users.update');
        //     Route::delete('/{user}/delete', 'destroy')->name('admin.users.destroy');
        // });

        // Route::prefix('settings')->controller(SettingController::class)->group(function() {
        //     Route::get('/', 'index')->name('admin.settings.index');
        //     Route::get('/create', 'create')->name('admin.settings.create');
        //     Route::post('/store', 'store')->name('admin.settings.store');
        //     Route::get('/{setting}/edit', 'edit')->name('admin.settings.edit');
        //     Route::put('/{setting}/update', 'update')->name('admin.settings.update');
        //     Route::delete('/{setting}/delete', 'destroy')->name('admin.settings.destroy');
        // });

    });
});
