<?php

use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InboxController;
use App\Http\Controllers\Admin\PortofolioController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\SeoSettingController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SocialmediaController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Visitor\VisitorController;
use App\Models\SocialMedia;
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

Route::prefix('/')->controller(VisitorController::class)->group(function() {
    Route::get('/', 'index')->name('visitor.index');
    Route::get('/{page:slug}', 'fetch_page')->name('visitor.fetch_page');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::prefix('web_management')->group(function() {

        Route::prefix('dashboard')->controller(DashboardController::class)->group(function() {
            Route::get('/', 'index')->name('admin.dashboard');
            Route::get('/visitor-stats', 'visitorStats')->name('admin.dashboard.visitor-stats');
        });

        // Route::prefix('inbox')->controller(InboxController::class)->group(function() {
        //     Route::get('/', 'index')->name('admin.inbox.index');
        // });

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

        Route::prefix('social_media')->controller(SocialmediaController::class)->group(function() {
            Route::get('/', 'index')->name('admin.social_media.index');
            Route::post('/store', 'store')->name('admin.social_media.store');
            Route::post('/update', 'update')->name('admin.social_media.update');
            Route::delete('/{post}/delete', 'destroy')->name('admin.social_media.destroy');
            Route::post('/upload_image', 'upload_image')->name('admin.social_media.uploadimage');
        });

        Route::prefix('post_categories')->controller(PostCategoryController::class)->group(function() {
            Route::post('/store', 'store')->name('admin.post_category.store');
        });

        Route::prefix('seo_settings')->controller(SeoSettingController::class)->group(function() {
            Route::get('/', 'index')->name('admin.seo_setting.index');
            Route::post('/update', 'update')->name('admin.seo_setting.update');
        });
    });
});
