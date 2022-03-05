<?php
/**
 * @author Ruben Ramirez Rivera
 * 
 *  TODO El superheroe tendra una lista de habiidades que estaran en la tabla habilidades
 *  TODO El superheroe tendra imagen
 *  TODO El superheroe tendra evolucion (principiante,experto) la cual tambien sera una tabla
 *  TODO id usuario
 *  
 */

 namespace App\Models;

 use App\Models\DBAbstractModel;

 class Ciudadano extends DBAbstractModel {
    /*CONSTRUCCIÓN DEL MODELO SINGLETON*/
        private static $instancia;
        public static function getInstancia()
        {
        if (!isset(self::$instancia)) {
                $miclase = __CLASS__;
                self::$instancia = new $miclase;
            }
            return self::$instancia;
        }
        public function __clone()
        {
            trigger_error('La clonación no es permitida!.', E_USER_ERROR);
        }

        private $id;
        private $nombre;
        private $email;
        private $idUsuario;
        private $created_at;
        private $updated_at;

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setIdUsuario($idUsuario) {
            $this->idUsuario = $idUsuario;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getId() {
            return $this->id;
        }

        public function getIdUsuario() {
            return $this->idUsuario;
        }

        public function set() {
            $this->query = "INSERT INTO ciudadanos(nombre, email, idUsuario)
                            VALUES(:nombre, :email, :idUsuario)";
            // $this->parametros['id']=$id;
            $this->parametros['nombre']= $this->getNombre();
            $this->parametros['email']=$this->getEmail();
            $this->parametros['idUsuario']=$this->getIdUsuario();
            $this->get_results_from_query();
            $this->id = $this->lastInsert();
            // $this->execute_single_query();
            $this->mensaje = 'Ciudadano añadido.';
        }

        public function get($id='')
        {
            if($id != '') {
                $this->query = "
                SELECT *
                FROM ciudadanos
                WHERE id = :id";
                //Cargamos los parámetros.
                $this->parametros['id']= $id;
                //Ejecutamos consulta que devuelve registros.
                $this->get_results_from_query();
                }
                if(count($this->rows) == 1) {
                foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad = $valor;
                }
                $this->mensaje = 'Ciudadano encontrado';
                }
                else {
                $this->mensaje = 'Ciudadano no encontrado';
                }
                return $this->rows;
                
        }

        /* Método que obtiene todos los superhéroes */
        public function getAll() {
            $this->query = "SELECT * FROM ciudadanos ORDER BY id asc";
            // Ejecutamos consulta que devuelve registros
            $this->get_results_from_query();
            if (count($this->rows) == 1) {
                foreach ($this->rows[0] as $propiedad=>$valor) {
                    $this->$propiedad = $valor;
                }
                $this->mensaje = 'Ciudadanos encontrados';
            } else {
                $this->mensaje = 'Ciudadanos no encontrados';
            }
            return $this->rows;
        }

        // Método para editar un superheroe
        public function edit() {
            $this->query = "
            UPDATE ciudadanos
            SET nombre=:nombre,
                email=:email
            WHERE id = :id
            ";

            $this->parametros['id']=$this->getId();
            $this->parametros['nombre']=$this->getNombre();
            $this->parametros['email']=$this->getEmail();

            $this->get_results_from_query();
            $this->mensaje = 'Ciudadano modificado';
        }

        // Método para comprobar si el usuario existe en la base de datos
        public function exists() {
            $this->query = "
            SELECT * FROM usuarios
            WHERE email = :email
            ";

            $this->parametros['email']= $this->getEmail();

            $this->get_results_from_query();
            if (count($this->rows) == 0){
                $this->mensaje = 'Ciudadano no existe';
                return false;
            } else {
                $this->mensaje = 'Ciudadano existe';
                return true;
            }
            
        }

        public function getByUserId($id='')
        {
            if($id != '') {
                $this->query = "
                SELECT *
                FROM usuarios
                WHERE idUsuario = :id";
                //Cargamos los parámetros.
                $this->parametros['id']= $id;
                //Ejecutamos consulta que devuelve registros.
                $this->get_results_from_query();
            }
            
            if(count($this->rows) == 1) {
                foreach ($this->rows[0] as $propiedad=>$valor) {
                    $this->$propiedad = $valor;
                }
                $this->mensaje = 'Superheroe encontrado';
            }
            else {
                $this->mensaje = 'Superheroe no encontrado';
            }
            return $this->rows;
                
        }

        

        // Método para eliminar un superheroe
        public function delete($id='')
        {
            $this->query = "DELETE FROM usuarios
            WHERE id = :id";
            $this->parametros['id']=$id;
            $this->get_results_from_query();
            $this->mensaje = 'Usuario eliminado';
        }

 }

?>