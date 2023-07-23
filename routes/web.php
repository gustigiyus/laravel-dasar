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

Route::get('/route_test', function() {
    return 'Hello Gusti Giustianto';
});

Route::redirect('/youtube', '/route_test');

Route::fallback(function (){
    return "404 by Gusti Giustainto";
});
