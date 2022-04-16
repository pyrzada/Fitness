<?php

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
    return view('welcome')->with(['plans' => \App\Models\Plan::all()]);
});
Route::get('/legs', function () {
    return view('pages.legs');
});
Route::get('/chest', function () {
    return view('pages.chest');
});
Route::get('/abs', function () {
    return view('pages.abdomen');
});
Route::get('/arms', function () {
    return view('pages.arms');
});

Route::get('/weekly', function () {
    return view('pages.weekly');
})->middleware('auth');

//Route::group(['middleware'=>'auth'],func)
Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/plan', ['App\Http\Controllers\PlanController', 'adminView'])->name('admin-plans');
    Route::post('/plan', ['App\Http\Controllers\PlanController', 'create'])->name('admin-create-plans');
    Route::post('/plan/delete', ['App\Http\Controllers\PlanController', 'delete'])->name('admin-delete-plans');

});

require __DIR__ . '/auth.php';
