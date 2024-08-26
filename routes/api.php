<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Front\AboutContentController;
use App\Http\Controllers\Api\Front\AdController;
use App\Http\Controllers\Api\Front\ArticleController;
use App\Http\Controllers\Api\Front\CompanyController;
use App\Http\Controllers\Api\Front\HomeContentController;
use App\Http\Controllers\Api\Front\OfferController;
use App\Http\Controllers\Api\Front\SettingController;
use App\Http\Controllers\Api\Front\SupermarketController;
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


Route::get('/about-contents', [AboutContentController::class, 'index']);
Route::get('/home-contents', [HomeContentController::class, 'index']);
Route::get('/offers', [OfferController::class, 'index']);
Route::get('/offers/{id}', [OfferController::class, 'show']);
Route::get('/settings', [SettingController::class, 'index']);
Route::get('/supermarkets', [SupermarketController::class, 'index']);
Route::get('/supermarkets/{id}', [SupermarketController::class, 'show']);
Route::get('articles', [ArticleController::class, 'index']);
Route::get('articles/{id}', [ArticleController::class, 'show']);
Route::get('companies', [CompanyController::class, 'index']);
Route::get('companies/{id}', [CompanyController::class, 'show']);
Route::get('/ads', [AdController::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();


});
