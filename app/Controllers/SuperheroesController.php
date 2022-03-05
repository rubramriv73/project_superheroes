<?php
/**
 * @author Ruben Ramirez Rivera
 */

 namespace App\Controllers;

use App\Models\Habilidad;
use App\Models\Superheroe;

 class SuperheroesController extends BaseController{

    // public function AddSuperheroeAction(){
    //     $procesaForm = false;
    //     $data = array();
    //     $data['nombre']=$data['velocidad']="";
    //     $data['msgErrorNombre']=$data['msgErrorVelocidad']="";

    //     if (!empty($_POST)) {
    //         $data['nombre'] = $_POST['nombre'];
    //         $data['velocidad'] = $_POST['velocidad'];

    //         $procesaForm = true;
    //         if(empty($_POST['nombre'])){
    //             $procesaForm=false;
    //             $data['msgErrorNombre'] = "El nombre no puede estar vacío";
    //         }

    //         $procesaForm = true;
    //         if(empty($_POST['velocidad'])){
    //             $procesaForm=false;
    //             $data['msgErrorVelocidad'] = "La velocidad no puede estar vacío";
    //         }
    //     }

    //     if($procesaForm){
    //         $objSuperheroe = new Superheroe();
    //         $objSuperheroe->setNombre($_POST['nombre']);
    //         $objSuperheroe->setVelocidad($_POST['velocidad']);
    //         $objSuperheroe->setEntity();
    //         header("location:" . DIRBASEURL. "/");
    //     } else {
    //         $this->renderHTML("../views/addSuperheroe_view.php",$data);
    //     }
    // }

    public function EditSuperheroeAction($request){
        session_start();
        if ($_SESSION['perfil'] != 'superheroe') {
            header("location:" . DIRBASEURL. "/"); 
        }
        $elementos = explode('/',$request);
        $id = end($elementos);

        $sh = new Superheroe();
        $result = $sh->get($id);
        $data['nombre'] = $result[0]['nombre'];
        $data['evolucion'] = $result[0]['evolucion'];
        $data['msgErrorNombre'] = $data['msgErrorEvolucion'] = '';


        if (isset($_POST['nombre']) && isset($_POST['evolucion'])) {
            $sh = new Superheroe();
            $sh->setNombre($_POST['nombre']);
            $sh->setEvolucion($_POST['evolucion']);
            $sh->setId($id); 
            $sh->edit();
            $_SESSION['evolucion'] = $sh->getEvolucion();
            header("location:" . DIRBASEURL. "/");
        } 
        $this->renderHTML("../views/editSuperheroe_view.php",$data);
        
        
    }

    public function PerfilSuperheroeAction($request){
        session_start();
        if ($_SESSION['perfil'] != 'superheroe') {
            header("location:" . DIRBASEURL. "/"); 
        }
        $elementos = explode('/',$request);
        $id = end($elementos);

        $sh = new Superheroe();
        $data = $sh->get($id);

        $this->renderHTML("../views/profileSuperheroe_view.php",$data);
        
        
    }

    public function DeleteSuperheroeAction($request){
        session_start();
        if ($_SESSION['perfil'] != 'superheroe') {
            header("location:" . DIRBASEURL. "/"); 
        }
        $elementos = explode('/',$request);
        $id = end($elementos);
        $objSuperheroe = new Superheroe();
        $objSuperheroe->delete($id);
        $control = new AuthController();
        $control->CloseAction();
        header("location:" . DIRBASEURL."/");

    }

    public function LastSuperheroesAction(){
        $data = array();

        $objSuperheroe = new Superheroe();
        $habilities = new Habilidad();
        
        // if(isset($_POST['buscar'])){
        //     $data = $objSuperheroe->getByNombre($_POST['busqueda']);
        //     $this->renderHTML("../views/index_view.php",$data);

        // } else if(isset($_POST['nuevoHeroe'])){
        //     $this->renderHTML("../views/addSuperheroe_view.php",$data);
            
        // } else {
            $data = $objSuperheroe->getAll();
            $habilities ;
            $this->renderHTML("../views/index_view.php",$data,$habilities);
        // }


    }

    public function GetSearchedHeroes($request){
        $data = array();

        $objSuperheroe = new Superheroe();

        $data = $objSuperheroe->getByNombre($_POST['busqueda']);
        $this->renderHTML("../views/index_view.php",$data);
    }

    

 }
?>