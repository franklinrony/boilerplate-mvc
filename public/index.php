<?php
/**
 * Creado por equipo de desarrollo RE.
 * Fecha: 17/02/2019
 * Hora: 09:21 PM
 * Editado por:
 * Fecha:
 * Editado por:
 * Fecha:
 */
require '../'.'vendor/autoload.php';
require '../'.'twig.php';
use Bramus\Router\Router;

//Mostrar errores en el navegador
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Creear instancia del router
$router = new Router();

// Custom 404 Handler
$router->set404(function () {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    echo '404, route not found!';
});

// Static route: / (homepage)
$router->get('/', function () {
    echo 'Working fine';
});

$router->setNamespace('\pdes\controller');
$router->get('/registro/', 'UsuarioController@registro');
$router->post('/registro/','UsuarioController@registro');
$router->run();


?>