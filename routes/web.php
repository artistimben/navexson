<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\VesselController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\Admin\AuthAdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceAdminController;
use App\Http\Controllers\Admin\VesselAdminController;
use App\Http\Controllers\Admin\NewsAdminController;
use App\Http\Controllers\Admin\QuoteAdminController;
use App\Http\Controllers\Admin\MessageAdminController;
use App\Http\Controllers\Admin\SettingAdminController;
use App\Http\Controllers\Admin\AboutAdminController;
use App\Http\Controllers\Admin\StraitAdminController;
use App\Http\Controllers\Admin\ProfileAdminController;
use App\Http\Controllers\Admin\GalleryAdminController;

use App\Http\Controllers\LanguageController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/lang/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/hakkimizda', [HomeController::class, 'about'])->name('about');


Route::get('/hizmetlerimiz', [ServiceController::class, 'index'])->name('services.index');
Route::get('/hizmetlerimiz/{slug}', [ServiceController::class, 'show'])->name('services.show');



Route::get('/haberler', [NewsController::class, 'index'])->name('news.index');
Route::get('/haberler/{slug}', [NewsController::class, 'show'])->name('news.show');

Route::get('/iletisim', [ContactController::class, 'index'])->name('contact');
Route::post('/iletisim', [ContactController::class, 'sendContact'])->name('contact.send');
Route::post('/teklif-al', [ContactController::class, 'sendQuote'])->name('quote.send');

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthAdminController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthAdminController::class, 'login']);
    Route::post('/logout', [AuthAdminController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('/services', ServiceAdminController::class);
        Route::resource('/vessels', VesselAdminController::class);
        Route::resource('/news', NewsAdminController::class);

        Route::get('/quotes', [QuoteAdminController::class, 'index'])->name('quotes.index');
        Route::get('/quotes/{quote}', [QuoteAdminController::class, 'show'])->name('quotes.show');
        Route::patch('/quotes/{quote}/status', [QuoteAdminController::class, 'updateStatus'])->name('quotes.updateStatus');
        Route::delete('/quotes/{quote}', [QuoteAdminController::class, 'destroy'])->name('quotes.destroy');

        Route::get('/messages', [MessageAdminController::class, 'index'])->name('messages.index');
        Route::get('/messages/{message}', [MessageAdminController::class, 'show'])->name('messages.show');
        Route::delete('/messages/{message}', [MessageAdminController::class, 'destroy'])->name('messages.destroy');

        Route::get('/settings', [SettingAdminController::class, 'index'])->name('settings.index');
        Route::post('/settings', [SettingAdminController::class, 'update'])->name('settings.update');

        Route::get('/about', [AboutAdminController::class, 'index'])->name('about.index');
        Route::post('/about', [AboutAdminController::class, 'update'])->name('about.update');

        Route::get('/straits', [StraitAdminController::class, 'index'])->name('straits.index');
        Route::post('/straits', [StraitAdminController::class, 'update'])->name('straits.update');

        Route::get('/profile', [ProfileAdminController::class, 'index'])->name('profile.index');
        Route::post('/profile', [ProfileAdminController::class, 'update'])->name('profile.update');
        Route::post('/password', [ProfileAdminController::class, 'updatePassword'])->name('password.update');

        Route::get('/gallery', [GalleryAdminController::class, 'index'])->name('gallery.index');
        Route::post('/gallery/upload', [GalleryAdminController::class, 'upload'])->name('gallery.upload');
        Route::delete('/gallery/{file}', [GalleryAdminController::class, 'destroy'])->name('gallery.destroy');
    });
});
