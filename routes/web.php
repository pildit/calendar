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
    return view('welcome');
});

/*
Route::get('/admin/dashboard', function () {
    return view('admin.calendar.dashboard');
})->middleware(['auth'])->name('dashboard');
*/

Route::get('/admin/calendar', 'App\Http\Controllers\CalendarController@index')->middleware(['auth'])->name('admin.calendar.index');

Route::get('/admin/events/create', 'App\Http\Controllers\EventsController@create')->middleware(['auth'])->name('admin.events.create');

Route::post('/admin/events/store', 'App\Http\Controllers\EventsController@store')->name('admin.events.store');

require __DIR__.'/auth.php';
