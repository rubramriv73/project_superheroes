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

 class Usuario extends DBAbstractModel {
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
        private $psw;
        private $created_at;
        private $updated_at;

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function setPassword($psw) {
            $this->psw = $psw;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getPassword() {
            return $this->psw;
        }

        public function getId() {
            return $this->id;
        }

        public function set() {
            $this->query = "INSERT INTO usuarios(usuario, psw)
                            VALUES(:usuario, :psw)";
            // $this->parametros['id']=$id;
            $this->parametros['usuario']= $this->getNombre();
            $this->parametros['psw']= $this->getPassword();
            $this->get_results_from_query();
            $this->id = $this->lastInsert();
            // $this->execute_single_query();
            $this->mensaje = 'Usuario añadido.';
        }

        public function get($id='')
        {
            if($id != '') {
                $this->query = "
                SELECT *
                FROM usuarios
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
                $this->mensaje = 'Usuario encontrado';
                }
                else {
                $this->mensaje = 'Usuario no encontrado';
                }
                return $this->rows;
                
        }

        public function getIdByName()
        {
                $this->query = "
                SELECT id
                FROM usuarios
                WHERE usuario = :nombre";
                //Cargamos los parámetros.
                $this->parametros['nombre'] = $this->getNombre();
                //Ejecutamos consulta que devuelve registros.
                $this->get_results_from_query();
                
                return $this->rows[0]['id'];
                
        }

        /* Método que obtiene todos los superhéroes */
        public function getAll() {
            $this->query = "SELECT * FROM usuarios ORDER BY id asc";
            // Ejecutamos consulta que devuelve registros
            $this->get_results_from_query();
            if (count($this->rows) == 1) {
                foreach ($this->rows[0] as $propiedad=>$valor) {
                    $this->$propiedad = $valor;
                }
                $this->mensaje = 'Usuarios encontrados';
            } else {
                $this->mensaje = 'Usuarios no encontrados';
            }
            return $this->rows;
        }

        // Método para editar un superheroe
        public function edit() {
            $this->query = "
            UPDATE usuarios
            SET nombre=:nombre,
                psw=:psw
            WHERE id = :id
            ";

            $this->parametros['id']=$this->getId();
            $this->parametros['nombre']=$this->getNombre();
            $this->parametros['psw']=$this->getPassword();

            $this->get_results_from_query();
            $this->mensaje = 'Usuario modificado';
        }

        // Método para comprobar si el usuario existe en la base de datos
        public function exists() {
            $this->query = "
            SELECT * FROM usuarios
            WHERE usuario=:nombre
            AND psw=:psw
            ";

            $this->parametros['nombre']=$this->getNombre();
            $this->parametros['psw']=$this->getPassword();

            $this->get_results_from_query();
            if (count($this->rows) == 0){
                $this->mensaje = 'Usuario no existe';
                return false;
            } else {
                $this->mensaje = 'Usuario no existe';
                return true;
            }
            
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