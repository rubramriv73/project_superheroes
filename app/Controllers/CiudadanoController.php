<?php
/**
 * @author Ruben Ramirez Rivera
 */

 namespace App\Controllers;

 use App\Models\Superheroe;

 class CiudadanoController extends BaseController{

    public function AddSuperheroeAction(){
        $procesaForm = false;
        $data = array();
        $data['nombre']=$data['velocidad']="";
        $data['msgErrorNombre']=$data['msgErrorVelocidad']="";

        if (!empty($_POST)) {
            $data['nombre'] = $_POST['nombre'];
            $data['velocidad'] = $_POST['velocidad'];

            $procesaForm = true;
            if(empty($_POST['nombre'])){
                $procesaForm=false;
                $data['msgErrorNombre'] = "El nombre no puede estar vacío";
            }

            $procesaForm = true;
            if(empty($_POST['velocidad'])){
                $procesaForm=false;
                $data['msgErrorVelocidad'] = "La velocidad no puede estar vacío";
            }
        }

        if($procesaForm){
            $objSuperheroe = new Superheroe();
            $objSuperheroe->setNombre($_POST['nombre']);
            $objSuperheroe->setVelocidad($_POST['velocidad']);
            $objSuperheroe->setEntity();
            header("location:" . DIRBASEURL. "/");
        } else {
            $this->renderHTML("../views/addSuperheroe_view.php",$data);
        }
    }

    public function EditSuperheroeAction($request){
        $elementos = explode('/',$request);
        $id = end($elementos);

        if (isset($_POST['nombre']) && isset($_POST['velocidad'])) {
            $sh = new Superheroe();
            $sh->setNombre($_POST['nombre']);
            $sh->setVelocidad($_POST['velocidad']);
            $sh->setId($id); 
            $sh->editEntity();
            header("location:" . DIRBASEURL. "/");
        } 
        $this->renderHTML("../views/editSuperheroe_view.php","");
        
        
    }

    public function DeleteSuperheroeAction($request){
        $elementos = explode('/',$request);
        $id = end($elementos);
        $objSuperheroe = new Superheroe();
        $objSuperheroe->delete($id);
        header("location:" . DIRBASEURL."/");

    }

    public function LastSuperheroesAction(){
        $data = array();

        $objSuperheroe = new Superheroe();
        
        // if(isset($_POST['buscar'])){
        //     $data = $objSuperheroe->getByNombre($_POST['busqueda']);
        //     $this->renderHTML("../views/index_view.php",$data);

        // } else if(isset($_POST['nuevoHeroe'])){
        //     $this->renderHTML("../views/addSuperheroe_view.php",$data);
            
        // } else {
            $data = $objSuperheroe->getAll();
            $this->renderHTML("../views/index_view.php",$data);
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