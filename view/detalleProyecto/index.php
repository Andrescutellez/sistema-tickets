<?php
	require_once("../../config/conexion.php");
	if(isset($_SESSION["usu_id"])){

?>
	<!DOCTYPE html>
	<html>
		<?php require_once("../MainCabecera\cabecera.php");?>
		<title>Interventoria Security Shops::Detalle Proyecto</title>
	</head>
	<body class="with-side-menu">
		<?php require_once("../MainHeader\MainHeader.php");?>
		
		<div class="mobile-menu-left-overlay"></div>
		
		<?php require_once("../MainNav\Nav.php");?>


		<!-- Contenido -->
		<div class="page-content">
			<div class="container-fluid">

			<header class="section-header">
          <div class="tbl">
            <div class="tbl-row">
              <div class="tbl-cell">
                <h3 id="lblnomidproyecto"></h3>
				<div</div>
				<div class="row">
						<span class="label label-pill label-default" id="lblfechcrea"></span>
						<span class="label label-pill label-primary" id="lblnomusuario">Usuario</span>
						<span id="lblestado">
						</span>
                <ol class="breadcrumb breadcrumb-simple"></ol>
                  <!-- <li><a href="#">Inicio</a></li>
                  <li class="active">Detalle Ticket</li> -->
                </ol>
              </div>
            </div>
          </div>
        </header>

        <div class="box-typical box-typical-padding">
          <div class="row">

              <div class="col-lg-6">
                <fieldset class="form-group">
                  <label class="form-label semibold" for="cat_nom">Titulo</label>
                  <input type="text" class="form-control" id="proyecto_titulo" name="proyecto_titulo" readonly>
                </fieldset>
              </div>

              <div class="col-lg-6">
                <fieldset class="form-group">
                  <label class="form-label semibold" for="tick_titulo">Sucursal</label>
                  <input type="text" class="form-control" id="proyecto_sucursal" name="proyecto_sucursal" readonly>
                </fieldset>
              </div>
			  <div class="col-lg-6" style="width: 100%;" >
                <fieldset class="form-group">
                  <label class="form-label semibold" for="tick_titulo">Descripcion</label>
                  <input type="text" class="form-control" id="proyecto_descripcion" name="proyecto_descripcion" readonly>
                </fieldset>
              </div>
          </div>
        </div>


           	<section class="activity-line" id="lbldetalle"></section>

				<div id="panelcomentar" class="col-lg-12">
					<fieldset>
						<label style="margin-left: 25px;" for="proyectd_desc" class="form-label semibold">Comentar</label>
							<div class="col-sm-10">
									<textarea rows="4" class="form-control" id="proyectd_desc" name="proyectd_desc" placeholder="Ingrese informacion"></textarea>
							</div>
					</fieldset>
					<button style = "background-color:black; border-color:black; color:#FFEA2F; margin-top: 10px; margin-left: 25px;" type="button" id="btnenviar" class="btn btn-rounded btn-inline">Enviar</button>
					<button style = "background-color:green; border-color:green; color:white; margin-top: 10px;" type="button" id="btncerrar" class="btn btn-rounded btn-inline">Terminar proyecto</button>
				</div>

	
			</div>
		</div>



		<?php require_once("../MainJS\js.php");?>
		<script type="text/javascript" src="detalleProyecto.js" ></script>

	</body>
	</html>

<?php
	}else{
		header("Location:"."../../index.php");
	}

?>