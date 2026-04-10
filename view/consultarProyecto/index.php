<?php
	require_once("../../config/conexion.php");
	if(isset($_SESSION["usu_id"])){

?>
	<!DOCTYPE html>
	<html>
		<?php require_once("../MainCabecera\cabecera.php");?>
		<title>Interventoria Security Shops::Consultar Proyecto</title>
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
								<li style="color:black; font-weight: 900" class="active">Consultar Proyecto</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">

				<table id="proyecto_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
					<thead>
						<tr>
							<th style="width: 5%;">Nro.Proyecto</th>
							<th style="width: 25%;">Titulo</th>
							<th style="width: 25%;">Sucursal</th>
							<th style="width: 5%;">Estado</th>
							<th style="width: 10%;">Fecha creacion</th>
							<th style="width: 10%;">Fecha asignacion</th>
							<th style="width: 10%;">Interventor</th>
							<th style="width: 10%;">Ver</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>


			</div>
		</div>
		<!-- Contenido -->	

		 <?php require_once("modalasignar.php");?>

		<?php require_once("../MainJS\js.php");?>
		<script type="text/javascript" src="consultarProyecto.js" ></script>

	</body>
	</html>

<?php
	}else{
		header("Location:"."../../index.php");
	}

?>