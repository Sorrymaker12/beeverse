<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LanguageController;

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
    return redirect('/home');
});

Route::get('/home', [UserController::class, 'index_home']);
Route::get('/login', [UserController::class, 'index_login']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'index_register']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/payment', [UserController::class, 'index_payment']);
Route::post('/payment', [UserController::class, 'payment']);
Route::post('/paymentover', [UserController::class, 'payment_over']);
Route::post('/paymentfromover', [UserController::class, 'payment_from_over']);
Route::get('/logout', [UserController::class, 'logout'])->middleware('usermiddleware');
Route::get('/profile/{id}', [UserController::class, 'index_profile'])->middleware('usermiddleware');
Route::post('/wish', [UserController::class, 'wish'])->middleware('usermiddleware');
Route::get('/friends', [UserController::class, 'index_friends'])->middleware('usermiddleware');
Route::post('/accept', [UserController::class, 'accept'])->middleware('usermiddleware');
Route::get('/avatar', [UserController::class, 'index_avatar'])->middleware('usermiddleware');
Route::get('/topup', [UserController::class, 'index_topup'])->middleware('usermiddleware');
Route::post('/topup', [UserController::class, 'topup'])->middleware('usermiddleware');
Route::get('/buy', [UserController::class, 'index_buy'])->middleware('usermiddleware');
Route::post('/buy', [UserController::class, 'buy'])->middleware('usermiddleware');
Route::get('/gift', [UserController::class, 'index_gift'])->middleware('usermiddleware');
Route::post('/gift', [UserController::class, 'gift'])->middleware('usermiddleware');
Route::get('/showoff', [UserController::class, 'index_showoff'])->middleware('usermiddleware');
Route::post('/changepp', [UserController::class, 'changepp'])->middleware('usermiddleware');
Route::get('/myprofile', [UserController::class, 'index_myprofile'])->middleware('usermiddleware');
Route::get('/settings', [UserController::class, 'index_settings'])->middleware('usermiddleware');
Route::post('/invis', [UserController::class, 'invis'])->middleware('usermiddleware');
Route::post('/vis', [UserController::class, 'vis'])->middleware('usermiddleware');
Route::post('/search', [UserController::class, 'search']);
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => [LanguageController::class, 'switchLang']]);
