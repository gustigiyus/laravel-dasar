<?php

use App\Http\Controllers\EncryptCookieController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\SessionController;
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

//? GROUP ROUTE DAN RESPONSE LAINNYA
Route::prefix('/response/type')->group(function(){
    Route::get('/view', [ResponseController::class, 'responseView']);
    Route::get('/json', [ResponseController::class, 'responseJson']);
    Route::get('/file', [ResponseController::class, 'responseFile']);
    Route::get('/download', [ResponseController::class, 'responseDownload']);
});

//? GROUP CONTROLLER DAN COOKIE  
Route::controller(EncryptCookieController::class)->group(function(){
    Route::get('/cookie/set', 'createCookie');
    Route::get('/cookie/get', 'getCookie');
    Route::get('/cookie/clear', 'clearCookie');
});

//? MIDDLEWARE
//* SINGLE
Route::get('/middleware/api', function(){
    return "Ok";
})->middleware(['contoh']);


Route::get('/middleware/group', function(){
    return "GROUP";
})->middleware(['pzn']);

//* GROUPING
// ! Route::middleware(['contoh'])->prefix('/middleware')->group(function(){
// !    Route::get('/api', function(){
// !         return "Ok";
// !     });
// !     Route::get('/group', function(){
// !         return "GROUP";
// !     });
// ! });

//? SESSION
Route::get('/session/create', [SessionController::class, 'craeteSession']);
Route::get('/session/get', [SessionController::class, 'getSession']);