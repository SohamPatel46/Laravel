<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

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

Route::get("/soham",function(){
    return view('soham');
});

//Route::get("/user",[UserController::class,'index']);
Route::get("/user",[UserController::class,'eloquent_advance']);

Auth::routes();     //  ??
 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/upload',function(Request $request){
    //dd($request->all());        just gets the image name
    //dd($request->image);        get all details of 'image'-> name of input field in form
    //dd($request->hasfile('image'));      returns a boolean
    $request->image->store('FolderName','public');       //by default '/storage/app/' , but here in '/storage/public'
    return 'SuccessFully uploaded';
});