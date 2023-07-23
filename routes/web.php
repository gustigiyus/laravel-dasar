<?php

use App\Http\Controllers\EncryptCookieController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\ResponseController;
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

// 404 DEFUALT ROUTE (NOTFOUND)
Route::fallback(function (){
    return "404 by Gusti Giustainto";
});


// ================  ROUTE(VIEW) =================


//!--------------  CARA LANGSUNG  ---------------------!//
Route::view('/hello', 'hello', [
    'name' => 'Gusti Giustianto',
    'title' => 'Route View'
]);


//!--------------  CARA FUNCTION  ---------------------!//

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

//? WITH PARAMETER BASIC
Route::get('/products/{id}', function($productId){
    return "Product $productId";
});

Route::get('/products/{productId}/items/{itemId}', function($productId, $itemId){
    return "Product $productId, Item $itemId";
});

//? WITH WHERE (REGEX)
Route::get('/category/{id}', function($categoryId){
    return "Category $categoryId";
})->where('id', '[0-9]+');

//? WITH OPTIONAL
Route::get('/user/{id?}', function($id = '404'){
    return "User $id";
});

//? WITH NAME
Route::get('/barang/{id?}', function($id = '404'){
    return "User $id";
})->name('barang.detail');


//!--------------  CARA BEST PARTICE  ---------------------!//

Route::get('/controller/hello/requestData', [HelloController::class, 'requestData']);
Route::get('/controller/hello/{name}', [HelloController::class, 'hello']);


//? TEST INPUT POST NESTED 
Route::post('/input/hello/first', [InputController::class, 'helloFirstName']);
//? TEST INPUT POST ARRAY 
Route::post('/input/hello/array', [InputController::class, 'helloArray']);
//? TEST INPUT POST TYPE 
Route::post('/input/type', [InputController::class, 'inputType']);

//? FILE UPLOAD
Route::post('/file/upload', [FileController::class, 'upload']);

//? RESPONSE
Route::get('/response/hello', [ResponseController::class, 'response']);
Route::get('/response/header', [ResponseController::class, 'header']);

Route::get('/response/type/view', [ResponseController::class, 'responseView']);
Route::get('/response/type/json', [ResponseController::class, 'responseJson']);
Route::get('/response/type/file', [ResponseController::class, 'responseFile']);
Route::get('/response/type/download', [ResponseController::class, 'responseDownload']);

//? COOKIE
Route::get('/cookie/set', [EncryptCookieController::class, 'createCookie']);
Route::get('/cookie/get', [EncryptCookieController::class, 'getCookie']);
Route::get('/cookie/clear', [EncryptCookieController::class, 'clearCookie']);