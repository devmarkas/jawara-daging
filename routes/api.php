<?php

use App\Http\Controllers\API\BannerController;
use App\Http\Controllers\API\ContactCenterController;
use App\Http\Controllers\API\FaqController;
use App\Http\Controllers\API\PopUpBannerController;
use App\Http\Controllers\API\PushNotificationController;
use App\Http\Controllers\API\TermConditionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/banner', [BannerController::class, 'index']);
Route::get('/notification', [PushNotificationController::class, 'index']);
Route::get('/term-condition', [TermConditionController::class, 'index']);
Route::get('/contact-center', [ContactCenterController::class, 'index']);
Route::get('/pop-up-banner', [PopUpBannerController::class, 'index']);
Route::get('/faq', [FaqController::class, 'index']);


