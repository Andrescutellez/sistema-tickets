<?php
    
    require_once("../config/conexion.php");
    require_once("../models/Proyecto.php");
    $proyecto = new Proyecto();

    require_once("../models/Usuario.php");
    $usuario = new Usuario();

    switch($_GET["op"]){
        case "insert":
            $proyecto->insert_proyecto($_POST["usu_id"],$_POST["titulo_id"],$_POST["cliente"],$_POST["sucursal"],$_POST["cat_id"],$_POST["prioridad"],$_POST["proyect_desc"]);
        break;

        case "update":
            $proyecto->insert_proyecto_detalle_cerrar($_POST["proyect_id"],$_POST["usu_id"]);
            $proyecto->update_proyecto($_POST["proyect_id"]);
        break;

        case "asignar":
            $proyecto->update_proyecto_asignar($_POST["usu_asig"], $_POST["proyect_id"]);
        break;

        case "listar_por_usuario":
            $datos=$proyecto->listar_proyecto_por_usu($_POST["usu_id"]);
            $data = Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["proyect_id"];
                $sub_array[] = $row["cat_id"];
                $sub_array[] = $row["titulo_id"];
                if($row["proyect_estado"]=="Abierto"){
                    $sub_array[] = '<span class="label label-pill label-success">Abierto</span>';
                }else{
                    $sub_array[] = '<span class="label label-pill label-danger">Cerrado</span>';
                }
                $sub_array[] = date("d/m/Y H:i:s", strtotime($row["fech_crea"]));

                if($row["fech_asig"]==null){
                    $sub_array[] = '<span class="label label-pill label-default">No asignado</span>';
                }else{
                    $sub_array[] = date("d/m/Y H:i:s", strtotime($row["fech_asig"]));
                }

                if($row["usu_asig"]==null){
                    $sub_array[] = '<span class="label label-pill label-warning">No asignado</span>';
                }else{
                    $datos1 = $usuario->get_usuario_x_id($row["usu_asig"]);
                    foreach($datos1 as $row1){
                        $sub_array[] = '<span class="label label-pill label-success">'. $row1["usu_nom"].'</span>';
                    }
                }

                $sub_array[] = '<button style = "background-color:black; border-color: black; type="button" onClick="ver(' . $row["proyect_id"] . ');" id="' . $row["proyect_id"] . '" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                $data[] = $sub_array;

            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);

        break;

        case "listar":
            $datos=$proyecto->listar_proyectos();
            $data = Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["proyect_id"];
                $sub_array[] = $row["titulo_id"];
                $sub_array[] = $row["sucursal"];
                if($row["proyect_estado"]=="Abierto"){
                    $sub_array[] = '<span class="label label-pill label-success">Abierto</span>';
                }else{
                    $sub_array[] = '<span class="label label-pill label-danger">Cerrado</span>';
                }
                

                $sub_array[] = date("d/m/Y H:i:s", strtotime($row["fech_crea"]));

                if($row["fech_asig"]==null){
                    $sub_array[] = '<span class="label label-pill label-default">No asignado</span>';
                }else{
                    $sub_array[] = date("d/m/Y H:i:s", strtotime($row["fech_asig"]));
                }

                 if ($row["usu_asig"] == null) {
                    $sub_array[] = '<a onClick="asignar('.$row["proyect_id"].')"><span class="label label-pill label-warning">No asignado</span></a>';
                } else {
                    $datos1 = $usuario->get_usuario_x_id($row["usu_asig"]);
                    foreach ($datos1 as $row1) {
                        $sub_array[] = '<span class="label label-pill label-success">' . $row1["usu_nom"] . '</span>';
                    }
                }

                $sub_array[] = '<button style = "background-color:black; border-color: black; type="button" onClick="ver(' . $row["proyect_id"] . ');" id="' . $row["proyect_id"] . '" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                $data[] = $sub_array;

            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);

        break;

        case "listarDetalle":
            $datos=$proyecto->listar_proyecto_detalle_por_proyecto($_POST["proyect_id"]);
            ?>
                <?php
                    foreach($datos as $row){
                        ?>
                            <article class="activity-line-item box-typical">
                                <div class="activity-line-date">
                                    <?php echo date("d/m/Y", strtotime($row["fech_crea"]));?>
                                </div>
                                <header class="activity-line-item-header">
                                    <div class="activity-line-item-user">
                                        <div class="activity-line-item-user-photo">
                                            <a href="#">
                                                <img src="../../public\img\logo security.png" alt="">
                                            </a>
                                        </div>
                                        <div class="activity-line-item-user-name"><?php echo $row['usu_nom']. ' '.$row['usu_ape']; ?></div>
                                        <div class="activity-line-item-user-status"  style="font-size: 12px;">
                                            <?php 
                                             $rol_id = $row['rol_id']; // Asigna el valor de $row['rol_id'] a una variable
                                                switch ($rol_id) {
                                                    case 1:
                                                        echo "Interventor de proyectos";
                                                        break;
                                                    case 2:
                                                        echo "Jefe implementaciones";
                                                        break;
                                                    case 3:
                                                        echo "Analista Facturacion";
                                                        break;
                                                }   
                                            ?>
                                        </div>
                                    </div>
                                </header>
                                <div class="activity-line-action-list">
                                    <section class="activity-line-action">
                                        <div style="font-size: 12px;" class="time"><?php echo date("H:i:s", strtotime($row["fech_crea"]));?></div>
                                        <div class="cont">
                                            <div class="cont-in">
                                                <p><?php echo $row['proyectd_desc']; ?></p>
                                            </div>
                                        </div>
                                    </section><!--.activity-line-action--></section>
                                </div>
                            </article>
                        <?php
                    }
                    ?>

            <?php
        break;

        case "mostrar";
            $datos=$proyecto->listar_proyecto_x_id($_POST["proyect_id"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["proyect_id"] = $row["proyect_id"];
                    $output["usu_id"] = $row["usu_id"];
                    $output["cat_id"] = $row["cat_id"];
                    $output["titulo_id"] = $row["titulo_id"];
                    $output["proyect_desc"] = $row["proyect_desc"];
                    $output["sucursal"] = $row["sucursal"];
                    $output["proyect_estado"] = $row["proyect_estado"];
                    $output["fech_crea"] = date("d/m/Y", strtotime($row["fech_crea"]));
                    $output["usu_nom"] = $row["usu_nom"];
                    $output["usu_ape"] = $row["usu_ape"];
                }
                echo json_encode($output);
            }
               
        break;

        case "insert_detalle":
            $proyecto->insert_proyecto_detalle($_POST["proyect_id"],$_POST["usu_id"],$_POST["proyectd_desc"]);
        break;

        case "grafico":
            $datos=$proyecto->get_proyecto_grafico();
            echo json_encode($datos);
        break;
        

        

        case "total";
        $datos=$proyecto->get_proyecto_total();  
        if(is_array($datos)==true and count($datos)>0){
            foreach($datos as $row)
            {
                $output["TOTAL"] = $row["TOTAL"];
            }
            echo json_encode($output);
        }
    break;

    case "totalabierto";
        $datos=$proyecto->get_proyecto_totalabierto();  
        if(is_array($datos)==true and count($datos)>0){
            foreach($datos as $row)
            {
                $output["TOTAL"] = $row["TOTAL"];
            }
            echo json_encode($output);
        }
    break;

    case "totalcerrado";
        $datos=$proyecto->get_proyecto_totalcerrado();  
        if(is_array($datos)==true and count($datos)>0){
            foreach($datos as $row)
            {
                $output["TOTAL"] = $row["TOTAL"];
            }
            echo json_encode($output);
        }
    break;

    }
?>