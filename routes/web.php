<?php

use Illuminate\Support\Facades\Route;
use App\Service\AppService;
use App\Service\MediaAppService;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function (AppService $appService, MediaAppService $mediaAppService) { 
    dd($appService, $mediaAppService);
});

