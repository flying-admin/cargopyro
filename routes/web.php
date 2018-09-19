<?php


/*
if( Request::is('/') && count($_GET) > 0 ){

    //dd(Request::url());


    $rutas_old = [
        'empresa' => [
            'historia',
            'nuestra-filosofia',
            'politica-empresa',
            'calidad',
            'responsabilidad-social-corporativa',
        ],

        'servicios' => [
            'servicios',
            'transporte-terrestre',
            'transporte-maritimo',
            'transporte-aereo',
            'aduanas',
            'proyectos',
            'almacenes',
            'seguros',
            'cross-trade',
        ],

        'noticias' => [
            'noticias',
        ],

        'contacto' => [
            'contacto',
        ],

        'inicio' => [
            'inicio',
        ],

    ];

    $rutas = [
        'inicio' => [
            'es' => "/inicio",
            'en' => "/home",
        ],
        'servicios' => [
            'es' => "/servicios",
            'en' => "/services",
        ],
        'empresa' => [
            'es' => "/empresa",
            'en' => "/company",
        ],
        'noticias' => [
            'es' => "/noticias",
            'en' => "/news",
        ],
        'contacto' => [
            'es' => "/contacto",
            'en' => "/contact",
        ],

    ];

    if( isset( $_GET['p'] ) && $_GET['p'] != '' ){
        if( $_GET['p'] == "utilidades" ){
            abort(404);
        }

        foreach ( $rutas_old as $k => $value ) {
            //var_dump ( $rutas_old[$k] );

            if (in_array($_GET['p'], $rutas_old[$k])) {
                //var_dump("ruta: " . $k);

                if (isset($_GET['i'])) {
                    return redirect('/en'.$rutas[$k]['en'], 301);
                } else {
                    return redirect($rutas[$k]['es'], 301);
                }
            }
        }
        return redirect('/', 301);
    }

}
*/

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




