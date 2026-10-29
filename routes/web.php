<?php

use App\Http\Controllers\SitemapController;
use App\Http\Controllers\TextoParaRobosController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'inicio')->name('inicio');
Route::view('/politica-de-privacidade', 'privacidade')->name('privacidade');

Route::get('/sitemap.xml', SitemapController::class)->name('sitemap');
Route::get('/robots.txt', [TextoParaRobosController::class, 'robots'])->name('robots');
Route::get('/llms.txt', [TextoParaRobosController::class, 'llms'])->name('llms');
