<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\home;


Route::get('/',[home::class,'fetchpost']);
Route::post('/postdata',[home::class,'postdata']);
Route::get('/addpost',[home::class,'addpost']);
Route::get('/delpost/{id}',[home::class,'delpost']);
Route::get('/editpost/{id}',[home::class,'editpost']);
Route::post('/updatepost',[home::class,'updatepost']);
Route::get('/login',[home::class,'login']);
Route::post('/userlogin',[home::class,'userlogin']);
Route::get('/dashboard',[home::class,'dashboard']);
Route::get('/logout',[home::class,'logout']);
Route::get('/changepass',[home::class,'changepass']);
Route::post('/changepassword',[home::class,'changepassword']);
