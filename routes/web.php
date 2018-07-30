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

Route::get('/', function () {
    return view('welcome');
});


//Route::get('/noticias', '\Anomaly\PostsModule\Http\Controller\PostsController@index');
//Route::get('/noticias/{categories}/{slug}', '\Anomaly\PostsModule\Http\Controller\CategoriesController@index');


//Route::get('/news', '\Anomaly\PostsModule\Http\Controller\PostsController@index');



Route::get("posts",function(){
    abort(404);
});


Route::get('/noticias',    '\Anomaly\PostsModule\Http\Controller\PostsController@index');
Route::get('/news',        '\Anomaly\PostsModule\Http\Controller\PostsController@index');

Route::get('/inicio', function(){return redirect('/');});

if(Request::segment(0)=='en'){
    Route::get('/noticias', function(){return redirect('/en/news');});
}else{
    Route::get('/news',     function(){return redirect('/noticias');});
}
