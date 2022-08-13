<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\ContactCenterController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PopUpBannerController;
use App\Http\Controllers\PushNotificationController;
use App\Http\Controllers\TermConditionController;
use App\Http\Controllers\BannerFooterController;
use App\Models\PopUpBanner;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::group(['middleware' => ['auth']], function() {

    Route::resource('banner', BannerController::class);
    Route::get('/banner/delete/{id}', [BannerController::class, 'destroy'])->name('banner.delete');

    Route::resource('push-notification', PushNotificationController::class);
    Route::get('/push-notification/delete/{id}', [PushNotificationController::class, 'destroy'])->name('push-notification.delete');


    Route::get('/term-condition', [TermConditionController::class, 'index'])->name('term-condition.index');
    Route::post('/term-condition', [TermConditionController::class, 'store'])->name('term-condition.store');
    Route::post('/term-condition{id}', [TermConditionController::class, 'update'])->name('term-condition.update');

    Route::get('/contact-center', [ContactCenterController::class, 'index'])->name('contact-center.index');
    Route::post('/contact-center', [ContactCenterController::class, 'store'])->name('contact-center.store');
    Route::post('/contact-center{id}', [ContactCenterController::class, 'update'])->name('contact-center.update');

    Route::get('/pop-up-banner', [PopUpBannerController::class, 'index'])->name('pop-up-banner.index');
    Route::post('/pop-up-banner', [PopUpBannerController::class, 'store'])->name('pop-up-banner.store');
    Route::post('/pop-up-banner{id}', [PopUpBannerController::class, 'update'])->name('pop-up-banner.update');

    Route::get('/footer-banner', [BannerFooterController::class, 'index'])->name('footer-banner.index');
    Route::post('/footer-banner', [BannerFooterController::class, 'store'])->name('footer-banner.store');
    Route::post('/footer-banner{id}', [BannerFooterController::class, 'update'])->name('footer-banner.update');

    Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
    Route::post('/faq', [FaqController::class, 'store'])->name('faq.store');
    Route::get('/faq/{id}', [FaqController::class, 'edit'])->name('faq.edit');
    Route::post('/faq/{id}', [FaqController::class, 'update'])->name('faq.update');
    Route::get('/faq/delete/{id}', [FaqController::class, 'destroy'])->name('faq.delete');
















});
