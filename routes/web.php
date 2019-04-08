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
Route::get('aa', function () {
    return view('www.repeat');
});

Route::any('insert','NewsController@insert');

Route::get('captcha',function () {
    $captcha = new \Laravist\GeeCaptcha\GeeCaptcha(env('GEECAPTCHAID'), env('GEECAPTCHAkey'));
    echo $captcha->GTServerIsNormal();
});

Route::post('/verify', function () {
    $captcha = new \Laravist\GeeCaptcha\GeeCaptcha(env('GEECAPTCHAID'), env('GEECAPTCHAkey'));
    if ($captcha->isFromGTServer()) {
        if($captcha->success()){
            return 'success';
        }
        return 'no';
    }
    if ($captcha->hasAnswer()) {
        return "answer";
    }
    return "no answer";
});


Route::any('test','TestController@index');

// your routes here
Route::get('/', function () {
    return view('www.index.index');
});

Route::any('list','NewsController@getList');


Route::any('{type}/add','addController@index');

Route::any('user/login','UserController@login');
Route::any('user/register','UserController@register');


Route::any('user/addmember','UserController@addMember');

Route::any('user/info','UserController@userInfo');
Route::any('user/editinfo','UserController@editInfo');

Route::any('user/dologin','UserController@doLogin');
Route::any('user/outlogin','UserController@outLogin');

Route::any('user/sendmessage','UserController@sendMessage');

Route::any('user/verify','UserController@verify');

Route::any('all','NewsController@all');


//*********************other*****************************
Route::any('family','OtherController@family');



Route::any('{type}','NewsController@index');



