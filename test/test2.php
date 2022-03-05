<?php
/**
 * @author Ruben Ramirez Rivera
 */

require_once("../app/Config/constantes.php");
require_once("../vendor/autoload.php");

use App\Controllers\SuperheroesController;

$controller = new SuperheroesController();

var_dump($controller);

?>