<?php

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

//Route::any('admin/raffle','Admin\IndexController@raffle');
//Route::any('upload1','Admin\IndexController@upload');
//Route::any('multiupload','Admin\IndexController@multiUpload');
//Route::post('upload2','Admin\IndexController@upload2');
//登录
//Route::group(['prefix'=>'admin','namespace'=>'Admin'],function (){
//    Route::get('login','LoginController@login');
//});
//后台首页
Route::get('backend/index','Backend\IndexController@index');
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function (){
    //登录
    Route::get('login','LoginController@login');
    Route::post('login','LoginController@doLogin');
    //注册
    Route::get('sign','AdminController@sign');
    Route::post('sign','AdminController@doSign');
    //检查用户名是否存在
    Route::post('checkAdmin','AdminController@checkAdmin');
    //管理员列表
    Route::get('index','AdminController@index');
    //管理员详情
    Route::get('detail/{id}','AdminController@detail');
});



Route::get('index',function (){
    return view('layouts.adminindex');
});

//js css特效
Route::group(['prefix'=>'cssjs','namespace'=>'CSSJS'],function(){
  Route::get('mousemove','PracticeController@mouseMove');
  Route::get('highlight','PracticeController@highLight');
  Route::get('magnifying','PracticeController@magnifying');
});

//layui
Route::group(['prefix'=>'layui','namespace'=>'Layui'],function (){
    Route::get('view1','UploadController@view1');
    Route::post('upload1','UploadController@upload1');
    Route::get('view2','UploadController@view2');
    Route::post('upload2','UploadController@upload2');
    //layui demo
//    Route::get('demo','LayuiController@demo');
});

//redis测试
Route::get('testRedis','RedisController@testRedis')->name('testRedis');