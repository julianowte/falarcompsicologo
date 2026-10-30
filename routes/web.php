<?php

use App\Http\Controllers\SitemapController;
use App\Http\Controllers\TextoParaRobosController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'inicio')->name('inicio');
Route::view('/politica-de-privacidade', 'privacidade')->name('privacidade');

foreach (array_keys(config('paginas')) as $slug) {
    Route::view('/'.$slug, 'paginas.'.$slug, ['slug' => $slug])->name('paginas.'.$slug);
}

Route::get('/sitemap.xml', SitemapController::class)->name('sitemap');
Route::get('/robots.txt', [TextoParaRobosController::class, 'robots'])->name('robots');
Route::get('/llms.txt', [TextoParaRobosController::class, 'llms'])->name('llms');
