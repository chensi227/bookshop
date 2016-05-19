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

Route::get('/', function () {
    return view('login');
});
Route::any('/category','view\BookController@toCategory');
Route::get('/product/category_id/{category_id}','view\BookController@toProduct');
Route::get('/product/{product_id}','view\BookController@toPdtContent');



Route::get('/login','view\MemberController@toLogin');
Route::get('/register','view\MemberController@toRegister');

Route::group(['prefix'=>'service'],function(){
    Route::post('validate_email','Service\ValidateController@validateEmail');
    Route::get('validate_code/create','Service\ValidateController@create');
    Route::post('validate_phone/send','Service\ValidateController@sendSMS');
    Route::post('register','Service\MemberController@register');
    Route::post('login','Service\MemberController@login');
    Route::get('category/parent_id/{parent_id}','Service\BookController@getCategoryByParentId');
    Route::get('cart/add/{product_id}','Service\CartController@addCart');

});




