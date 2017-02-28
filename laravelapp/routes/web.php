<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*获取参数*/
/*Event::listen('illuminate.query',function($query){
    var_dump($query);
});*/

function rq($key = null,$default = null)
{
    if(!key) return Request::all();
    return Request::get($key,$default);
}

function user_ins()
{
    return new App\Model\User;
}

function question_ins()
{
    return new App\Model\Question;
}

Route::any('api/signup', function () {
    return user_ins()->signup();
});

Route::any('api/login', function () {
    return user_ins()->login();
});

Route::any('api/logout', function () {
    return user_ins()->logout();
});

Route::any('test', function () {
    return user_ins()->is_logged_in();
});

Route::any('api/question/add', function () {
    return question_ins()->add();
});

Route::any('api/question/change', function () {
    return question_ins()->change();
});

Route::any('api/question/read', function () {
    return question_ins()->read();
});

Route::any('test/testredis','testcontroller@testredis');
Route::any('test/testredis2','testcontroller@testredis2');

Route::any('check/login','User\UserController@check_login');


Route::any('login','User\UserController@login');
//登录页面

Route::group(['middleware' => ['web','user']], function () {

    Route::any('/','Index\IndexController@index');
    //后台首页路由

});
