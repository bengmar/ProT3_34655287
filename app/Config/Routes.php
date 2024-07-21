<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('principal', 'Home::index');
$routes->get('quienes_somos', 'Home::quienes_somos');
$routes->get('acerca_de', 'Home::acerca_de');
$routes->get('ingresar', 'Home::ingresar');
$routes->get('registrarse', 'Home::registrarse');

/* Rutas para el registro de nuevo usuario*/
$routes->get('/registrarse', 'UsuarioController::registrarse');
$routes->post('/enviar_form', 'UsuarioController::formValidation');

/* Rutas del ingreso de usuario */
$routes->get('/login', 'LoginController');
$routes->post('/enviar_login', 'LoginController::auth');
$routes->get('/panel', 'PanelController::index', ['filter' => 'auth']);
$routes->get('/logout', 'LoginController::logout');

/*Ruta para eliminar usuario*/
$routes->get('/eliminar/(:num)','PanelController::eliminar/$1');

/* Ruta para actualizar datos de usuario */
$routes->get('/editarCuenta', 'UsuarioController::editarCuenta');
$routes->post('editar/(:num)', 'UsuarioController::update/$1');