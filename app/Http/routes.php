<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Support\Facades\Mail;
Route::get('/', function () {
    return view('homepage');
});

Route::get('admin', function(){
  return view('welcome');
});
Route::get('/dashboard', 'Cakecontroller@index');

Route::get('/cakespage', 'Cakecontroller@showcontrol');

Route::post('postcakes', 'Cakecontroller@store');

Route::get('/email',function(){
  Mail::send('email',['name'=>'Sonu'], function($message){

    $message->to('sharathkoppolu@gmail.com', 'Sharath anna')->subject('Bro check this');
  });
});

Route::post('/posting', 'Cakecontroller@showcontrol');
Route::get('/posting', 'Cakecontroller@showcontrol');

Route::post('/delete', 'Cakecontroller@destroy');

Route::post('cart', 'Cartcontroller@adding');

Route::post('buying', 'Cartcontroller@adding');

Route::get('cart', 'Cartcontroller@showcart');

Route::get('checkout', 'Cartcontroller@showcart');

Route::post('remove', 'Cartcontroller@remove');
Route::post('proceed', 'Ordercontroller@buying');
Route::get('dataFrom', 'Ordercontroller@checkingout');

Route::get('cc',function(){
	return view('ccav');
});
//Route::get('remove', 'Cartcontroller@');
