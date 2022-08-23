<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventControler;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});
Auth::routes();
Route::get('/', [EventControler::class , 'index'])->name('homepage');
Route::delete('delete/{id}', [EventControler::class , 'destroy'])->name('delete');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
