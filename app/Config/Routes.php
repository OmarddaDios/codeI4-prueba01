<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');

$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
//ejemplos
// $routes->get('/Pelicula', 'Pelicula::index');
// $routes->get('Pelicula/new', 'Pelicula::create');
$routes->group('api', ['namespace'=>'App\Controllers\Api'], function($routes){
    $routes->resource('pelicula');
    $routes->resource('categoria');
});

$routes->group('dashboard', function($routes){
    // $routes->presenter('pelicula', ['only' => 'index']);
    // $routes->resources('pelicula', ['only' => 'index']);
    // $routes->presenter('pelicula', ['only' => ['index', 'new', 'create']]);
    // $routes->get('usuario/crear','\App\Controllers\Web\Usuario::crear_usuario');
    // $routes->get('usuario/probar','\App\Controllers\Web\Usuario::probar_contrasena');
    $routes->presenter('pelicula', ['controller' => 'Dashboard\Pelicula']);
    $routes->presenter('categoria', ['except' => 'show', 'controller' => 'Dashboard\Categoria']);

});
$routes->get('login', '\App\Controllers\Web\Usuario::login', ['as'=>'usuario.login']);
$routes->post('login', '\App\Controllers\Web\Usuario::login_post', ['as'=>'usuario.login_post']);

$routes->get('register', '\App\Controllers\Web\Usuario::register', ['as'=>'usuario.register']);
$routes->post('register', '\App\Controllers\Web\Usuario::register_post', ['as'=>'usuario.register_post']);

$routes->get('logout', '\App\Controllers\Web\Usuario::logout', ['as'=>'usuario.logout']);
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
