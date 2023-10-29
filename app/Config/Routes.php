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
$routes->get('/', 'Home::index');

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

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');


$routes->get('dashboard_bibliotecario', 'Dashboard::dashbiblio');
$routes->get('dashboard_administrador', 'Dashboard::dashadmin');
$routes->get('dashboard_estudiante', 'Dashboard::dashestu');

$routes->get('tablaUsuarios', 'ControllerUsuarios::cargarUsuarios');
$routes->post('guardarUsuario','ControllerUsuarios::guardarUsuario');
$routes->get('eliminar_usuario/(:num)', 'ControllerUsuarios::eliminarUsuario/$1');
$routes->get('verusuario/(:num)', 'ControllerUsuarios::verUsuario/$1');
$routes->post('actualizarusuario','ControllerUsuarios::actualizarUsuario');



$routes->get('tablaPrestamos', 'ControllerPrestamos::cargarPrestamos');
$routes->post('guardarPrestamo','ControllerPrestamos::guardarPrestamo');
$routes->get('eliminarprestamo/(:num)', 'ControllerPrestamos::eliminarPrestamo/$1');
$routes->get('verPrestamo/(:num)', 'ControllerPrestamos::verPrestamo/$1');
$routes->post('actualizarPrestamo','ControllerPrestamos::actualizarPrestamo');


$routes->get('tablaLibros', 'ControllerLibros::cargarLibros');
$routes->post('guardarLibro','ControllerLibros::guardarLibro');
$routes->get('eliminarLibro/(:num)', 'ControllerLibros::eliminarLibro/$1');
$routes->get('verLibro/(:num)', 'ControllerLibros::verLibro/$1');
$routes->post('actualizarLibro','ControllerLibros::actualizarLibro');

$routes->get('creditos','ControllerCreditos::creditos');

