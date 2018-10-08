<?php

/* IMPORTANTE NO ACTUALIZAR PYRO */ 
/* CODIGO PARA INTERCEPTAR LAS RUTAS AÑADIDO EN /core/anomaly/pages-module/src/Http/Controller/PagesController.php */ 

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



Route::get("posts",function(){
    abort(404);
});

Route::get('/inicio', function(){ return redirect('/'); });

Route::get('/news',        '\Anomaly\PostsModule\Http\Controller\PostsController@index');
Route::get('/noticias',    '\Anomaly\PostsModule\Http\Controller\PostsController@index');

if(Request::segment(0)=='en'){
    Route::get('/noticias', function(){return redirect('/en/news');});
}

