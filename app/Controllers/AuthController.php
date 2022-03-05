<?php
/**
 * @author Ruben Ramirez Rivera
 */

 namespace App\Controllers;

 use App\Models\Usuario;
 use App\Models\Superheroe;
 use App\Models\Ciudadano;

 class AuthController extends BaseController{

    public function LoginAction($request){
        session_start();
        $procesaForm = false;
        $data = array();
        $data['nombre'] = $data['password'] = '';
        $data['msgErrorNombre'] = $data['msgErrorPassword'] = '';

        if (!empty($_POST)) {
            $data['nombre'] = $_POST['nombre'];
            $data['password'] = $_POST['password'];

            $procesaForm = true;
            if(empty($_POST['nombre'])){
                $procesaForm=false;
                $data['msgErrorNombre'] = "El nombre no puede estar vacío";
            }

            $procesaForm = true;
            if(empty($_POST['password'])){
                $procesaForm=false;
                $data['msgErrorPassword'] = "La contraseña no puede estar vacía";
            }
        }

        if($procesaForm){
            $usuario = new Usuario();
            $usuario->setNombre($_POST['nombre']);
            $usuario->setPassword($_POST['password']);
            if ($usuario->exists()) {
                $_SESSION['nombreUsuario'] = $usuario->getNombre();
                $heroe = new Superheroe();
                if($heroe->exists($usuario->getIdByName())){ 
                    $heroeValues = $heroe->getByUserId($usuario->getId())[0];
                    $_SESSION['perfil'] = 'superheroe';
                    $_SESSION['id'] = $heroeValues['id'];
                    $_SESSION['evolucion'] = $heroeValues['evolucion'];  
                    header("location:" . DIRBASEURL. "/");           
                } else {
                    $ciudadano = new Ciudadano();
                    $ciudadanoValues = $ciudadano->getByUserId($usuario->getId());
                    $_SESSION['perfil'] = 'ciudadano';
                    $_SESSION['id'] = $ciudadanoValues['id'];
                    header("location:" . DIRBASEURL. "/"); 
                }
            }
            
        } else {
            $this->renderHTML("../views/login_view.php",$data);
        }       
        
    }

    public function RegistroCiudadanoAction(){
        session_start();
        $procesaForm = false;
        $data = array();
        $data['usuario'] = $data['password'] = $data['nombre'] = $data['email'] = '';
        $data['msgErrorUsuario'] = $data['msgErrorPassword'] = $data['msgErrorNombre'] = $data['msgErrorEmail'] = '';

        if (!empty($_POST)) {
            $data['usuario'] = $_POST['usuario'];
            $data['password'] = $_POST['password'];
            $data['nombre'] = $_POST['nombre'];
            $data['email'] = $_POST['email'];

            $procesaForm = true;
            if(empty($_POST['usuario'])){
                $procesaForm=false;
                $data['msgErrorUsuario'] = "El usuario no puede estar vacío";
            }

            $procesaForm = true;
            if(empty($_POST['password'])){
                $procesaForm=false;
                $data['msgErrorPassword'] = "La contraseña no puede estar vacía";
            }

            $procesaForm = true;
            if(empty($_POST['nombre'])){
                $procesaForm=false;
                $data['msgErrorNombre'] = "El nombre no puede estar vacío";
            }

            $procesaForm = true;
            if(empty($_POST['email'])){
                $procesaForm=false;
                $data['msgErrorEmail'] = "El email no puede estar vacía";
            }
        }

        if($procesaForm){
            $usuario = new Usuario();
            $usuario->setNombre($_POST['usuario']);
            $usuario->setPassword($_POST['password']);
            if (!$usuario->exists()) {
                $ciudadano = new Ciudadano();
                $ciudadano->setNombre($_POST['nombre']);
                $ciudadano->setEmail($_POST['email']);
                if(!$ciudadano->exists()){ 
                    $usuario->set();
                    $ciudadano->setIdUsuario($usuario->getId());
                    $ciudadano->set();
                    $_SESSION['nombreUsuario'] = $usuario->getNombre();
                    $_SESSION['perfil'] = 'ciudadano';
                    $_SESSION['id'] = $ciudadano->getId();
                    $_SESSION['evolucion'] = '';  
                    header("location:" . DIRBASEURL. "/");           
                } else {
                    $data['msgErrorEmail'] = 'Ciudadano existente. Utilice otro email';
                    $this->renderHTML("../views/register_view.php",$data);
                }
            } else {
                $data['msgErrorUsuario'] = "El usuario ya existe";
                $this->renderHTML("../views/register_view.php",$data);
            }
            
        } else {
            $this->renderHTML("../views/register_view.php",$data);
        }       
        
    }

    public function RegistroHeroeAction(){
        session_start();
        if ($_SESSION['perfil'] != 'superheroe' && $_SESSION['evolucion'] != 'experto') {
            header("location:" . DIRBASEURL. "/"); 
        }
        $procesaForm = false;
        $data = array();
        $data['usuario'] = $data['password'] = $data['nombre'] = '';
        $data['msgErrorUsuario'] = $data['msgErrorPassword'] = $data['msgErrorNombre'] = '';

        if (!empty($_POST)) {
            $data['usuario'] = $_POST['usuario'];
            $data['password'] = $_POST['password'];
            $data['nombre'] = $_POST['nombre'];

            $procesaForm = true;
            if(empty($_POST['usuario'])){
                $procesaForm=false;
                $data['msgErrorUsuario'] = "El usuario no puede estar vacío";
            }

            $procesaForm = true;
            if(empty($_POST['password'])){
                $procesaForm=false;
                $data['msgErrorPassword'] = "La contraseña no puede estar vacía";
            }

            $procesaForm = true;
            if(empty($_POST['nombre'])){
                $procesaForm=false;
                $data['msgErrorNombre'] = "El nombre no puede estar vacío";
            }

        }

        if($procesaForm){
            $usuario = new Usuario();
            $usuario->setNombre($_POST['usuario']);
            $usuario->setPassword($_POST['password']);
            if (!$usuario->exists()) {
                $sh = new Superheroe();
                $sh->setNombre($_POST['nombre']);
                if(!$sh->existsByName()){ 
                    $usuario->set();
                    $sh->setIdUsuario($usuario->getId());
                    $sh->setEvolucion('principiante');
                    $sh->set(); 
                    header("location:" . DIRBASEURL. "/");           
                } else {
                    $data['msgErrorEmail'] = 'Superheroe existente. Utilice otro nombre';
                    $this->renderHTML("../views/addSuperheroe_view.php",$data);
                }
            } else {
                $data['msgErrorUsuario'] = "El usuario ya existe";
                $this->renderHTML("../views/addSuperheroe_view.php",$data);
            }
            
        } else {
            $this->renderHTML("../views/addSuperheroe_view.php",$data);
        }       
        
    }


    public function CloseAction(){
        session_start();
        unset($_SESSION['perfil']);
        session_destroy();
        header("location:" . DIRBASEURL. "/"); 
               
        
    }

 }
?>