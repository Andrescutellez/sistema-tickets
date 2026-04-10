<?php
	require_once("../../config/conexion.php");
	if(isset($_SESSION["usu_id"])){

?>
	<!DOCTYPE html>
	<html>
		<?php require_once("../MainCabecera\cabecera.php");?>
		<title>Interventoria Security Shops::Mantenimiento usuario</title>
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
							<h3>Usuarios</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a style="color:#E2CC00; font-weight: 900" href="#">Interventoria</a></li>
								<li style="color:black; font-weight: 900" class="active">Usuarios</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">
				<button type="button" id="btnnuevo" class="btn btn-inline btn-primary">Nuevo Usuario</button>
				<table id="usuario_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
					<thead>
						<tr>
							<th style="width: 10%;">Nombre</th>
							<th style="width: 10%;">apellido</th>
							<th style="width: 25%;">Correo</th>
							<th style="width: 5%;">Contraseña</th>
							<th style="width: 10%;">Rol</th>
							<th style="width: 10%;">Editar</th>
							<th style="width: 10%;">Eliminar</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>


			</div>
		</div>
		<!-- Contenido -->

		
		<?php require_once("modalusuario.php");?>
		<?php require_once("../MainJS\js.php");?>
		<script type="text/javascript" src="mntusuarios.js" ></script>

	</body>
	</html>
	
<?php
	}else{
		header("Location:"."../../index.php");
	}

?>