   <?php
   /**
    * @author Ruben Ramirez Rivera
    */

   require_once("../app/Config/constantes.php");
   require_once("../vendor/autoload.php");

 use App\Models\Usuario;
 use App\Models\Superheroe;

 $sh = new Usuario();
 $hero = new Superheroe();
 $sh->setNombre('lulu');
 $sh->setPassword('1234');
 $id = $sh->getIdByName();
 $estado = $sh->exists();

 var_dump($estado);
 var_dump($hero->exists($id));
?>