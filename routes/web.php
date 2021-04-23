<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CoronaController;
use App\Http\Controllers\GambleController;
use App\Http\Controllers\JusoController;
use App\Http\Controllers\NasaController;
use App\Http\Controllers\OnpageController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/juso', function () {
    return view('juso.index');
});
Route::get('/mask', function () {
    return view('juso.yakguk');
});

Route::get('/address', [JusoController::class, 'index']);
Route::post('/address', [JusoController::class, 'submit']);

Route::get('/nasa', [NasaController::class, 'index']);

Route::get('/corona', [CoronaController::class, 'index']);


Route::get('/lotto', [GambleController::class, 'index']);
Route::post('/lotto', [GambleController::class, 'post']);
Route::get('/pension', [GambleController::class, 'pension']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


// website design
Route::get('/onepage', [OnpageController::class, 'responsive']);
Route::get('/calendar', [OnpageController::class, 'calendar']);

Route::resource('admin/category',CategoryController::class);