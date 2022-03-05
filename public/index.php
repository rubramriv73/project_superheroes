<?php
/**
 * @author Ruben Ramirez Rivera
 */
require_once("../app/Config/constantes.php");
require_once("../vendor/autoload.php");

use App\Controllers\SuperheroesController;
use App\Controllers\AuthController;

use App\Core\Router;

$router = new Router();
$router->add(array(
    'name'=>'home', 
    'path'=>'/^\/$/', 
    'action'=>[SuperheroesController::class, 'LastSuperheroesAction']));

$router->add(array(
    'name'=>'login', 
    'path'=>'/^\/login$/', 
    'action'=>[AuthController::class, 'LoginAction']));

$router->add(array(
    'name'=>'login', 
    'path'=>'/^\/logout$/', 
    'action'=>[AuthController::class, 'CloseAction']));

$router->add(array(
    'name'=>'registroCiudadano', 
    'path'=>'/^\/register\/ciudadano$/', 
    'action'=>[AuthController::class, 'RegistroCiudadanoAction']));

$router->add(array(
    'name'=>'addSuperheroe', 
    'path'=>'/^\/register\/superheroe$/', 
    'action'=>[AuthController::class, 'RegistroHeroeAction']));

$router->add(array(
    'name'=>'editSuperheroe',  
    'path'=>'/^\/superheroe\/profile\/edit\/[0-9]{1,3}$/', 
    'action'=>[SuperheroesController::class, 'EditSuperheroeAction']));
    
    $router->add(array(
        'name'=>'PerfilSuperheroe',  
        'path'=>'/^\/superheroe\/profile\/[0-9]{1,3}$/', 
        'action'=>[SuperheroesController::class, 'PerfilSuperheroeAction']));
    
    $router->add(array(
        'name'=>'PerfilSuperheroe',  
        'path'=>'/^\/ciudadano\/profile\/[0-9]{1,3}$/', 
        'action'=>[CiudadanoController::class, 'PerfilCiudadanoAction']));

$router->add(array(
    'name'=>'deleteSuperheroe',  
    'path'=>'/^\/superheroes\/del\/[0-9]{1,3}$/', 
    'action'=>[SuperheroesController::class, 'DeleteSuperheroeAction']));

$router->add(array(
    'name'=>'SearchSuperheroe',  
    'path'=>'/^\/superheroes\/search$/', 
    'action'=>[SuperheroesController::class, 'GetSearchedHeroes']));

$request = str_replace(DIRBASEURL,'',$_SERVER['REQUEST_URI']);
$route = $router->match($request);

if($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);

} else {
    echo "No route matched";
}

?>

