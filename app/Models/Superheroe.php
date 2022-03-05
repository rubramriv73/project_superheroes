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

 class Superheroe extends DBAbstractModel {
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
        private $evolucion;
        private $idUsuario;
        private $habilidades = array();
        private $created_at;
        private $updated_at;

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function setVelocidad($velocidad) {
            $this->velocidad = $velocidad ;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setEvolucion($evolucion) {
            $this->evolucion = $evolucion ;
        }

        public function setIdUsuario($idUsuario) {
            $this->idUsuario = $idUsuario;
        }

        public function setHabilidades($habilidades) {
            $this->habilidades = $habilidades;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getEvolucion() {
            return $this->evolucion;
        }

        public function getId() {
            return $this->id;
        }

        public function getIdUsuario() {
            return $this->idUsuario;
        }

        public function getHabilidades() {
            return $this->habilidades;
        }



        public function set() {
            $this->query = "INSERT INTO superheroes(nombre, evolucion, idUsuario)
                            VALUES(:nombre, :evolucion, :idUsuario)";
            // $this->parametros['id']=$id;
            $this->parametros['nombre']= $this->getNombre();
            $this->parametros['evolucion']= $this->getEvolucion();
            $this->parametros['idUsuario']= $this->getIdUsuario();
            $this->get_results_from_query();
            $this->id = $this->lastInsert();
            // $this->execute_single_query();
            $this->mensaje = 'Superhéroes añadido.';
        }

        public function get($id='')
        {
            if($id != '') {
                $this->query = "
                SELECT *
                FROM superheroes
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
                $this->mensaje = 'sh encontrado';
                }
                else {
                $this->mensaje = 'sh no encontrado';
                }
                return $this->rows;
                
        }

        public function getByUserId($id='')
        {
            if($id != '') {
                $this->query = "
                SELECT *
                FROM superheroes
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

        /* Método que obtiene todos los superhéroes */
        public function getAll() {
            $this->query = "SELECT * FROM superheroes ORDER BY id asc limit ". SHTOSHOW;
            // Ejecutamos consulta que devuelve registros
            $this->get_results_from_query();
            if (count($this->rows) == 1) {
                foreach ($this->rows[0] as $propiedad=>$valor) {
                    $this->$propiedad = $valor;
                }
                $this->mensaje = 'SH encontrados';
            } else {
                $this->mensaje = 'SH no encontrados';
            }
            return $this->rows;
        }

        // Método para buscar superhéroes por nombre
        public function getByNombre($filtro='') {
            if($filtro != '') {
                $nombre = "%" . $filtro . "%";
                $this->query = "SELECT * FROM superheroes WHERE (nombre LIKE :nombre) ORDER BY id desc limit ". SHTOSHOW;
                // Cargamos los parámetros
                $this->parametros['nombre']=$nombre;

                // Ejecutamos consulta que devuelve registros
                $this->get_results_from_query();
            }
            if (count($this->rows) == 1) {
                foreach ($this->rows[0] as $propiedad=>$valor) {
                    $this->$propiedad = $valor;
                }
                $this->mensaje = 'SH encontrados';
            } else {
                $this->mensaje = 'SH no encontrados';
            }
            return $this->rows;
        }

        // Método para editar un superheroe
        public function edit() {
            $this->query = "
            UPDATE superheroes
            SET nombre=:nombre,
                evolucion=:evolucion,
            WHERE id = :id
            ";

            $this->parametros['id']=$this->getId();
            $this->parametros['nombre']=$this->getNombre();
            $this->parametros['evolucion']=$this->getEvolucion();

            $this->get_results_from_query();
            $this->mensaje = 'sh modificado';
        }

        // Método para eliminar un superheroe
        public function delete($id='')
        {
            $this->query = "DELETE FROM superheroes
            WHERE id = :id";
            $this->parametros['id']=$id;
            $this->get_results_from_query();
            $this->mensaje = 'SH eliminado';
        }

        // Método para comprobar si el usuario existe en la base de datos
    public function exists($id) {
        $this->query = "
        SELECT * FROM superheroes
        WHERE idUsuario=:id
        ";

        $this->parametros['id']=$id;

        $this->get_results_from_query();
        if (count($this->rows) == 0){
            $this->mensaje = 'Superheroe no existe';
            return false;
        } else {
            $this->mensaje = 'Superheroe existe';
            return true;
        }
        
    }

    public function existsByName() {
        $this->query = "
        SELECT * FROM superheroes
        WHERE nombre=:nombre
        ";

        $this->parametros['nombre']=$this->getNombre();

        $this->get_results_from_query();
        if (count($this->rows) == 0){
            $this->mensaje = 'Superheroe no existe';
            return false;
        } else {
            $this->mensaje = 'Superheroe existe';
            return true;
        }
        
    }

 }

?>