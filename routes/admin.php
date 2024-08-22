<?php

use App\Http\Controllers\Admin\AboutContentController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLanguageController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ContactContentController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\HomeContentController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PriceController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SupermarketController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;



Route::get('/',function(){
    return redirect()->route('admin.dashboard');
});



Route::get('dashboard',[AdminController::class, 'dashboard'])->name('dashboard');

// Route::resource('pages', PageController::class);
Route::middleware('superadmin')->group(function(){
    Route::put('edit-setting', [AdminController::class, 'editSetting'])->name('edit');



    Route::get('home-content', [HomeContentController::class, 'index'])->name('home-content.index');
    Route::post('home-content', [HomeContentController::class, 'update'])->name('home-content.update');

    Route::get('about-content', [AboutContentController::class, 'index'])->name('about-content.index');
    Route::post('about-content', [AboutContentController::class, 'update'])->name('about-content.update');

    Route::get('contact-content', [ContactContentController::class, 'index'])->name('contact-content.index');
    Route::post('contact-content', [ContactContentController::class, 'update'])->name('contact-content.update');

    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    Route::post('setting', [SettingController::class, 'update'])->name('setting.update');

    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');

    Route::resource('admins', AdminController::class);

    Route::resource('offers', OfferController::class);

    Route::resource('supermarkets', SupermarketController::class);

    Route::resource('articles', ArticleController::class);

    Route::get('prices', [PriceController::class, 'index'])->name('prices.index');
    Route::post('prices/upload', [PriceController::class, 'upload'])->name('prices.upload');

    if(0){

        Route::get('languages', [LanguageController::class, 'index'])->name('languages.index');
        Route::post('languages', [LanguageController::class, 'store'])->name('languages.store');
        Route::put('languages', [LanguageController::class, 'update'])->name('languages.update');



        Route::get('admin_language', [AdminLanguageController::class, 'index'])->name('admin_language.index');
        Route::post('admin_language', [AdminLanguageController::class, 'store'])->name('admin_language.store');
        Route::put('admin_language', [AdminLanguageController::class, 'update'])->name('admin_language.update');
        Route::put('admin_language/updateKey', [AdminLanguageController::class, 'updateKey'])->name('admin_language.updateKey');
    }
});

