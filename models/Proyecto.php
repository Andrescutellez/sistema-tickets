<?php
    class Proyecto extends Conectar{

        /* public function insert_proyecto($usu_id,$titulo_id,$cliente,$sucursal,$prioridad,$cat_id,$proyect_desc){ */
            public function insert_proyecto($usu_id, $titulo_id, $cliente, $sucursal, $cat_id, $prioridad, $proyect_desc) {
                $conectar = parent::conexion();
                parent::set_names();
            
                $sql = "INSERT INTO tm_proyecto (proyect_id, usu_id, titulo_id, cliente, sucursal, cat_id, prioridad, proyect_desc, proyect_estado, fech_crea, usu_asig, fech_asig, estado) VALUES (NULL,?,?,?,?,?,?,?,'Abierto',now(),NULL,NULL,'1')";
                $sql = $conectar->prepare($sql);
                $sql->bindValue(1, $usu_id);
                $sql->bindValue(2, $titulo_id);
                $sql->bindValue(3, $cliente);
                $sql->bindValue(4, $sucursal);
                $sql->bindValue(5, $cat_id);
                $sql->bindValue(6, $prioridad);
                $sql->bindValue(7, $proyect_desc);
            
                // Intenta ejecutar la inserción
                if ($sql->execute()) {
                    // Inserción exitosa, devuelve true y un mensaje de éxito
                    return array("success" => true, "message" => "El proyecto se ha guardado correctamente.");
                } else {
                    // Error en la inserción, devuelve false y un mensaje de error
                    return array("success" => false, "message" => "Hubo un error al guardar el proyecto.");
                }
            }

            public function listar_proyecto_por_usu($usu_id) {
                $conectar = parent::conexion();
                parent::set_names();
                $sql = "SELECT
                    tm_proyecto.proyect_id,
                    tm_proyecto.usu_id,
                    tm_proyecto.titulo_id,
                    tm_proyecto.cliente,
                    tm_proyecto.sucursal,
                    tm_proyecto.cat_id,
                    tm_proyecto.prioridad,
                    tm_proyecto.proyect_desc,
                    tm_proyecto.proyect_estado,
                    tm_proyecto.fech_crea,
                    tm_proyecto.usu_asig,
                    tm_proyecto.fech_asig,
                    tm_usuario.usu_nom,
                    tm_usuario.usu_ape
                    FROM 
                    tm_proyecto
                    INNER JOIN tm_usuario on tm_proyecto.usu_id = tm_usuario.usu_id
                    WHERE 
                    tm_proyecto.estado = 1
                    AND tm_proyecto.usu_asig = ?";
                $sql = $conectar->prepare($sql);
                $sql->bindValue(1, $usu_id);
                $sql->execute();
                return $resultado=$sql->fetchAll();
            }

            public function listar_proyectos() {
                $conectar = parent::conexion();
                parent::set_names();
                $sql = "SELECT
                    tm_proyecto.proyect_id,
                    tm_proyecto.usu_id,
                    tm_proyecto.titulo_id,
                    tm_proyecto.cliente,
                    tm_proyecto.sucursal,
                    tm_proyecto.cat_id,
                    tm_proyecto.prioridad,
                    tm_proyecto.proyect_desc,
                    tm_proyecto.proyect_estado,
                    tm_proyecto.fech_crea,
                    tm_proyecto.usu_asig,
                    tm_proyecto.fech_asig,
                    tm_usuario.usu_nom,
                    tm_usuario.usu_ape
                    FROM 
                    tm_proyecto
                    INNER JOIN tm_usuario on tm_proyecto.usu_id = tm_usuario.usu_id
                    WHERE 
                    tm_proyecto.estado = 1
                    ";
                $sql = $conectar->prepare($sql);
                $sql->execute();
                return $resultado=$sql->fetchAll();
            
               
            }

            public function listar_proyecto_detalle_por_proyecto($proyect_id) {
                $conectar = parent::conexion();
                parent::set_names();
                $sql = "SELECT
                td_proyectdetalle.proyectd_id,
                td_proyectdetalle.proyectd_desc,
                td_proyectdetalle.fech_crea,
                tm_usuario.usu_nom,
                tm_usuario.usu_ape,
                tm_usuario.rol_id
                FROM 
                td_proyectdetalle
                INNER JOIN tm_usuario on td_proyectdetalle.usu_id = tm_usuario.usu_id
                WHERE 
                proyect_id = ?";
                $sql = $conectar->prepare($sql);
                $sql->bindValue(1, $proyect_id);
                $sql->execute();
                return $resultado=$sql->fetchAll();
            }

            public function listar_proyecto_x_id($proyect_id){
                $conectar= parent::conexion();
                parent::set_names();
                $sql="SELECT 
                    tm_proyecto.proyect_id,
                    tm_proyecto.usu_id,
                    tm_proyecto.cat_id,
                    tm_proyecto.titulo_id,
                    tm_proyecto.sucursal,
                    tm_proyecto.proyect_desc,
                    tm_proyecto.proyect_estado,
                    tm_proyecto.fech_crea,
                    tm_usuario.usu_nom,
                    tm_usuario.usu_ape,
                    tm_proyecto.estado
                    FROM 
                    tm_proyecto
                    INNER join tm_usuario on tm_proyecto.usu_id = tm_usuario.usu_id
                    WHERE
                    tm_proyecto.estado = 1
                    AND tm_proyecto.proyect_id = ?";
                $sql=$conectar->prepare($sql);
                $sql->bindValue(1, $proyect_id);
                $sql->execute();
                return $resultado=$sql->fetchAll();
            }

            

            public function insert_proyecto_detalle($usu_id, $proyect_id, $proyectd_desc) {
                $conectar = parent::conexion();
                parent::set_names();
                $sql = "INSERT INTO td_proyectdetalle (proyectd_id, proyect_id, usu_id, proyectd_desc, fech_crea, est) VALUES (NULL, ?, ?, ?, now(), '1');";
                $sql = $conectar->prepare($sql);
                $sql->bindValue(1, $usu_id);
                $sql->bindValue(2, $proyect_id);
                $sql->bindValue(3, $proyectd_desc);
            
                // Intenta ejecutar la inserción
                if ($sql->execute()) {
                    // Inserción exitosa, devuelve true y un mensaje de éxito
                    return array("success" => true, "message" => "El comentario se ha guardado correctamente.");
                } else {
                    // Error en la inserción, devuelve false y un mensaje de error
                    return array("success" => false, "message" => "Hubo un error al guardar el comentario.");
                }
            }

            public function insert_proyecto_detalle_cerrar($usu_id, $proyect_id) {
                $conectar = parent::conexion();
                parent::set_names();
                $sql = "INSERT INTO td_proyectdetalle (proyectd_id, proyect_id, usu_id, proyectd_desc, fech_crea, est) VALUES (NULL, ?, ?, 'Proyecto cerrado.', now(), '1');";
                $sql = $conectar->prepare($sql);
                $sql->bindValue(1, $usu_id);
                $sql->bindValue(2, $proyect_id);
                $sql->execute();
                return $resultado=$sql->fetchAll();
            }

            public function update_proyecto($proyect_id){
                $conectar= parent::conexion();
                parent::set_names();
                $sql="update tm_proyecto
                set
                proyect_estado = 'Cerrado'
                where
                proyect_id = ?";
                $sql=$conectar->prepare($sql);
                $sql->bindValue(1, $proyect_id);
                $sql->execute();
                return $resultado=$sql->fetchAll();
            }

            public function update_proyecto_asignar($usu_asig, $proyect_id ){
                $conectar= parent::conexion();
                parent::set_names();
                $sql="update tm_proyecto
                set
                usu_asig = ?,
                fech_asig = now()
                where
                proyect_id = ?";
                $sql=$conectar->prepare($sql);
                $sql->bindValue(1, $usu_asig);
                $sql->bindValue(2, $proyect_id);
                $sql->execute();
                return $resultado=$sql->fetchAll();
            }

            public function get_proyecto_grafico(){
                $conectar= parent::conexion();
                parent::set_names();
                $sql="SELECT cat_id AS nom, COUNT(*) AS total
                FROM tm_proyecto
                GROUP BY cat_id
                ORDER BY total DESC";
                $sql=$conectar->prepare($sql);
                $sql->execute();
                return $resultado=$sql->fetchAll();
                
            } 


            

            public function get_proyecto_total(){
                $conectar=parent::conexion();
                    parent::set_names();
                    $sql="SELECT COUNT(*) as TOTAL FROM tm_proyecto;";
                    $sql=$conectar->prepare($sql);
                    $sql->execute();
                    return $resultado=$sql->fetchAll();
        
        
            }
        
            public function get_proyecto_totalabierto(){
                $conectar=parent::conexion();
                    parent::set_names();
                    $sql="SELECT COUNT(*) as TOTAL FROM tm_proyecto WHERE proyect_estado = 'Abierto';";
                    $sql=$conectar->prepare($sql);
                    $sql->execute();
                    return $resultado=$sql->fetchAll();
        
        
            }
        
            
        
            public function get_proyecto_totalcerrado(){
                $conectar=parent::conexion();
                    parent::set_names();
                    $sql="SELECT COUNT(*) as TOTAL FROM tm_proyecto WHERE proyect_estado = 'Cerrado';";
                    $sql=$conectar->prepare($sql);
                    $sql->execute();
                    return $resultado=$sql->fetchAll();
        
        
            }



            

            



            

        }
    
?>

