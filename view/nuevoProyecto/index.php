<?php
	require_once("../../config/conexion.php");
	if(isset($_SESSION["usu_id"])){

?>

	<!DOCTYPE html>
	<html>
		<?php require_once("../MainCabecera\cabecera.php");?>
		<title>Interventoria Security Shops::Nuevo Proyecto</title>
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
							<ol class="breadcrumb breadcrumb-simple">
								<li><a style="color:#E2CC00; font-weight: 900" href="#">Interventoria</a></li>
								<li style="color:black; font-weight: 900" class="active">Nuevo Proyecto</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
		</div>

		<div class="box-typical box-typical-padding">
			<h3>Nuevo Proyecto</h3>
				<p>
				En esta ventana de creación de proyectos es el punto de partida para dar vida a los proyectos. Se pueden definir los detalles esenciales, establecer los objetivos, asignar tareas al interventor al cual se le va asignar y asi supervisar el progreso en tiempo real.

				</form>
				<h6 class="m-t-lg with-border"></h6>
				
				<form method="post" id="proyecto_form"enctype="multipart/form-data">

					<input type="hidden" id="usu_id" name="usu_id" value="<?php echo $_SESSION["usu_id"]?>">

					<div class="form-group row">
						<label style="top: 10px;" for="titulo_id" class="col-sm-2 form-control-label">Titulo Proyecto</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input type="text" class="form-control" id="titulo_id" name="titulo_id" placeholder="Escriba titulo proyecto"></p>
						</div>
					</div>
					<div class="form-group row">
						<label style="top: 10px;" for="cliente" class="col-sm-2 form-control-label">Cliente</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input type="text" class="form-control" id="cliente" name="cliente" placeholder="Escriba el cliente"></p>
						</div>
					</div>
					<div class="form-group row">
						<label style="top: 10px;" for="sucursal" class="col-sm-2 form-control-label">Sucursal</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input type="text" class="form-control" id="sucursal" name="sucursal" placeholder="Escriba la sucursal"></p>
						</div>
					</div>

					<div class="form-group row">
						<label style="top: 10px;" for="cat_id" class="col-sm-2 form-control-label">Categoria</label>
						<div class="col-sm-10">
							<select id="cat_id" name="cat_id" class="form-control">
								<option value="1">Sistema de alarma</option>
								<option value="2">CCTV</option>
								<option value="3">Obsolescencia</option>
								<option value="4">Renovación Tecnológica</option>
							</select>
						</div>	
					</div>
					<div class="form-group row">
						<label style="top: 10px;" for="prioridad" class="col-sm-2 form-control-label">Prioridad</label>
						<div class="col-sm-10">
							<select id="prioridad" name="prioridad" class="form-control">
								<option>Baja</option>
								<option>Media</option>
								<option>Alta</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="proyect_desc" class="col-sm-2 form-control-label">Motivo Servicio</label>
						<div class="col-sm-10">
							<textarea rows="4" class="form-control" id="proyect_desc" name="proyect_desc" placeholder="Descripcion Proyecto"></textarea>
						</div>
					</div>
					<!-- <div class="form-group row">
						<label for="exampleSelect" class="col-sm-2 form-control-label">Archivos</label>
						<div class="col-xl-6">
							<div class="row">
								<div class="col-sm-12">
									<div class="box-typical-upload box-typical-upload-in">
										<div class="drop-zone">
											<i class="font-icon font-icon-cloud-upload-2"></i>
											<div class="drop-zone-caption">Sube tu archivo</div>
										</div>
										<h6 class="uploading-list-title">Cargar</h6>
										<ul class="uploading-list">
											<li class="uploading-list-item">
												<div class="uploading-list-item-wrapper">
													<div class="uploading-list-item-name">
														<i class="font-icon font-icon-cam-photo"></i>
														photo.png
													</div>
													<div class="uploading-list-item-size">7,5 mb</div>
													<button type="button" class="uploading-list-item-close">
														<i class="font-icon-close-2"></i>
													</button>
												</div>
												<progress class="progress" value="25" max="100">
													<div class="progress">
														<span class="progress-bar" style="width: 25%;">25%</span>
													</div>
												</progress>
												<div class="uploading-list-item-progress">37% done</div>
												<div class="uploading-list-item-speed">90KB/sec</div>
											</li>
											<li class="uploading-list-item">
												<div class="uploading-list-item-wrapper">
													<div class="uploading-list-item-name">
														<i class="font-icon font-icon-page"></i>
														task.doc
													</div>
													<div class="uploading-list-item-size">7,5 mb</div>
													<button type="button" class="uploading-list-item-close">
														<i class="font-icon-close-2"></i>
													</button>
												</div>
												<progress class="progress" value="50" max="100">
													<div class="progress">
														<span class="progress-bar" style="width: 50%;">50%</span>
													</div>
												</progress>
												<div class="uploading-list-item-progress">37% done</div>
												<div class="uploading-list-item-speed">90KB/sec</div>
											</li>
											<li class="uploading-list-item">
												<div class="uploading-list-item-wrapper">
													<div class="uploading-list-item-name">
														<i class="font-icon font-icon-cam-photo"></i>
														dashboard.png
													</div>
													<div class="uploading-list-item-size">7,5 mb</div>
													<button type="button" class="uploading-list-item-close">
														<i class="font-icon-close-2"></i>
													</button>
												</div>
												<progress class="progress" value="100" max="100">
													<div class="progress">
														<span class="progress-bar" style="width: 100%;">100%</span>
													</div>
												</progress>
												<div class="uploading-list-item-progress">Completed</div>
												<div class="uploading-list-item-speed">90KB/sec</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
                    	</div>
					</div> -->

					<button style = "background-color:black; border-color:black; color:#FFEA2F" type="submit" name="action" value="add" class="btn btn-rounded btn-inline">Guardar</button>
				</form>

			</div>



		<?php require_once("../MainJS\js.php");?>
		<script type="text/javascript" src="nuevoProyecto.js"></script>
		<!-- Contenido -->

	</body>
	</html>

<?php
	}else{
		header("Location:"."../../index.php");
	}

?>