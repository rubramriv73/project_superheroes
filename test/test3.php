<?php
   /**
    * @author Ruben Ramirez Rivera
    */

   require_once("../app/Config/constantes.php");
   require_once("../vendor/autoload.php");

 use App\Models\Superheroe;

 $sh = new Superheroe();
 $sh->setNombre('antonio');
 $sh->setEvolucion('principiante');
 $sh->setId(5);

 $sh->set();
?>