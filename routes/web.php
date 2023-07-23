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

// ================  ROUTE(BASIC) =================

Route::get('/route_test', function() {
    return 'Hello Gusti Giustianto';
});

Route::redirect('/youtube', '/route_test');

Route::fallback(function (){
    return "404 by Gusti Giustainto";
});


// ================  ROUTE(VIEW) =================

//! CARA LANGSUNG
Route::view('/hello', 'hello', [
    'name' => 'Gusti Giustianto',
    'title' => 'Route View'
]);


//!  CARA FUNCTION 
//? SINGULAR VIEW
Route::get('/hello-again', function(){
    return view('hello', [
        'name' => 'Gusti Giustianto',
        'title' => 'Route View'
    ]);
});

//? NESTED VIEW
Route::get('/hello-world', function(){
    return view('hello.world', [
        'name' => 'Gusti Giustianto',
        'title' => 'Route View Nested'
    ]);
});
