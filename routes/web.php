<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\myController;

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

Route::get('/', function () {
    return view('home');
})->name('home');

// Route::group(['middleware' => ['auth']], function() {

    Route::get('/devenir-admin', [myController::class, 'becomeAdmin'])->name('becomeAdmin');
    Route::post('/devenir-admin', [myController::class, 'register'])->name('register');
    
    Route::get('/se-connecter', [myController::class, 'loginVue'])->name('loginVue');
    Route::post('/se-connecter', [myController::class, 'login'])->name('login');
    
    Route::get('/admin/home', [myController::class, 'adminHome'])->name('adminHome');

    Route::get('/logout', function(){
        Auth::logout();
        $info = "Vous vous ếtes déconnectés !";
        return redirect()->route('home')->with('info', $info);
    })->name('logout');

    Route::get('/admin/admins-list', [myController::class, 'admins'])->name('admins');
    Route::post('/disableAdmin/{id}', [myController::class, 'disableAdmin'])->name('disableAdmin');
    Route::post('/ableAdmin/{id}', [myController::class, 'ableAdmin'])->name('ableAdmin');

    
// });


