<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MemberController;

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

// Route::view('/home', 'welcome', ['title' => 'WelcomePage'])
//           ->name('home')
//           ->withoutMiddleware('token');

Route::get('/home', function(){
    return view('welcome', ['title' => 'Welcome Page']);
})->name('home')->withoutMiddleware('token');

Route::controller(MediaController::class)
   ->middleware('token:foo123')    
   ->group(function(){                        
    Route::get('/media', 'index');

    Route::get('/media/{name?}', 'show')->whereAlpha('name');
    
    Route::get('/media/{id}', 'showById');
});

Route::apiResource('movie', MovieController::class);

Route::get('/foo', function(){
    return [1, 2, 3];
});

Route::resource('member', MemberController::class)->except(['store', 'edit']);

Route::prefix('admin')->middleware('token:bar123')->group(function(){
    Route::get('/csrf', function () { 
        return "foo";
    });
    
    Route::get('/redirect', function(){
        return to_route('home');
    });
});

