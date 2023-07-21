<?php

use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\NewsController;

Route::get('/', function () {
    $popularNewsItems = News::orderBy('view_count', 'desc')->take(5)->get();
    $firstNewsItem = $popularNewsItems->shift(); // Remove the first item from the collection

    return view('welcome',compact('firstNewsItem', 'popularNewsItems'));
});

Route::get('/contact/us/', [App\Http\Controllers\Blade\ContactController::class, 'index'])->name('contactIndex');
Route::post('/contact/send', [App\Http\Controllers\Blade\ContactController::class, 'send'])->name('contactSend');

Route::get('/about/us/',[App\Http\Controllers\Blade\AboutController::class, 'index'])->name('about');
Route::get('/news/us/',[App\Http\Controllers\Blade\NewsController::class, 'index'])->name('news');
Route::get('/news/full/{id}', [App\Http\Controllers\Blade\NewsController::class, 'show'])->name('news-show');
Route::get('/news/category/{category_id}', [App\Http\Controllers\Blade\NewsController::class, 'getNewsByCategory'])->name('news.by.category');

Auth::routes(['vertify' => false,'reset'   => false]);

Route::middleware(['auth'])->group(function () {
    Route::resource('tags', TagsController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('about', AboutController::class);
    Route::resource('news', NewsController::class);
});

Route::get('/news/full-list/{id}',[\App\Http\Controllers\Blade\NewsController::class,'FullList']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
