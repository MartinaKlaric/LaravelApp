<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\GenreController;
//use App\Http\Requests\StoreMediaRequest;

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

Route::view('/home', 'welcome', ['title' => 'Welcome Page'])
    ->name('home')
    ->withoutMiddleware('token');

Route::get('/genre', GenreController::class);

Route::resources([
    'movie' => MovieController::class,
    'media' => MediaController::class
]);

Route::resource('member', MemberController::class)
    ->except(['store', 'edit'])
    ->parameter('member', 'id');

Route::get('/foo', function(){
    return [1, 2, 3];
});

Route::prefix('admin')->group(function(){
    Route::get('/csrf', function(Request $request){
        dd($request);
        return 'foo';
    });
    
    Route::get('/redirect', function(){
        return to_route('home');
    });
});

