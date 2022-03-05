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

 class Habilidad extends DBAbstractModel {
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
        private $idHeroe;
        private $valor;
        private $created_at;
        private $updated_at;

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function setId($id) {
            $this->id = $id;
        }
        public function setValor($valor) {
            $this->valor = $valor;
        }

        public function setIdHeroe($idHeroe) {
            $this->idHeroe = $idHeroe;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getId() {
            return $this->id;
        }

        public function getIdHeroe() {
            return $this->idHeroe;
        }

        public function getValor() {
            return $this->valor;
        }

        public function set() {

            $this->query = "INSERT INTO habilidades(nombre)
                            VALUES(:nombre)";
            // $this->parametros['id']=$id;
            $this->parametros['nombre']= $this->getNombre();
            $this->get_results_from_query();
            $this->id = $this->lastInsert();

            // $this->execute_single_query();
            $this->mensaje = 'Habilidad añadida.';
        }

        public function setValue() {
            if($this->getIdHeroe() != null){
                $this->query = "INSERT INTO superheroes_habilidades(idSuperheroe,idHabilidad,valor)
                            VALUES(:idSuperheroe,:idHabilidad,:valor)";
                // $this->parametros['id']=$id;
                $this->parametros['idSuperheroe']= $this->getIdHeroe();
                $this->parametros['idHabilidad']= $this->getId();
                $this->parametros['valor']= $this->getValor();
                $this->get_results_from_query();
                $this->id = $this->lastInsert();

                // $this->execute_single_query();
                $this->mensaje = 'Habilidad añadida.';
            }
        }

        public function get($id='')
        {
            if($id != '') {
                $this->query = "
                SELECT *
                FROM habilidades
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
                $this->mensaje = 'Habilidad encontrada';
                }
                else {
                $this->mensaje = 'Habilidad no encontrada';
                }
                return $this->rows;
                
        }

        public function getIdByName()
        {
                $this->query = "
                SELECT id
                FROM habilidades
                WHERE nombre = :nombre";
                //Cargamos los parámetros.
                $this->parametros['nombre'] = $this->getNombre();
                //Ejecutamos consulta que devuelve registros.
                $this->get_results_from_query();
                
                return $this->rows[0]['id'];
                
        }

        /* Método que obtiene todos los superhéroes */
        public function getAll() {
            $this->query = "SELECT * FROM habilidades ORDER BY id asc";
            // Ejecutamos consulta que devuelve registros
            $this->get_results_from_query();
            if (count($this->rows) == 1) {
                foreach ($this->rows[0] as $propiedad=>$valor) {
                    $this->$propiedad = $valor;
                }
                $this->mensaje = 'Habilidades encontradas';
            } else {
                $this->mensaje = 'Habilidades no encontradas';
            }
            return $this->rows;
        }

        // Método para editar un superheroe
        public function edit() {
            $this->query = "
            UPDATE habilidades
            SET nombre=:nombre
            WHERE id = :id
            ";

            $this->parametros['id']=$this->getId();
            $this->parametros['nombre']=$this->getNombre();

            $this->get_results_from_query();
            $this->mensaje = 'Habilidad modificada';
        }

        // Método para comprobar si el usuario existe en la base de datos
        public function exists() {
            $this->query = "
            SELECT * FROM habilidades
            WHERE nombre=:nombre
            ";

            $this->parametros['nombre']=$this->getNombre();

            $this->get_results_from_query();
            if (count($this->rows) == 0){
                $this->mensaje = 'Habilidad no existe';
                return false;
            } else {
                $this->mensaje = 'Habilidad no existe';
                return true;
            }
            
        }

        

        // Método para eliminar un superheroe
        public function delete($id='')
        {
            $this->query = "DELETE FROM habilidades
            WHERE id = :id";
            $this->parametros['id']=$id;
            $this->get_results_from_query();
            $this->mensaje = 'Habilidad eliminada';
        }

 }

?>