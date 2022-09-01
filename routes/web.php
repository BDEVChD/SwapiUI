<?php
use App\Http\Controllers\StarController;
use App\Http\Controllers\SearchController;

use Illuminate\Support\Facades\Route;

Route::get('/{category?}/{id?}', [Starcontroller::class, 'show']);

Route::post('/itemsearch', [Starcontroller::class, 'search']); 






