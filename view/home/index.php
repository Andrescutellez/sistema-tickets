<?php
	require_once("../../config/conexion.php");
	if(isset($_SESSION["usu_id"])){

?>
	<!DOCTYPE html>
	<html>
		<?php require_once("../MainCabecera\cabecera.php");?>
		<title>Interventoria Security Shops</title>
				
	</head>
	<body class="with-side-menu">
		<?php require_once("../MainHeader\MainHeader.php");?>
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
		
		<div class="mobile-menu-left-overlay"></div>
		
		<?php require_once("../MainNav\Nav.php");?>


		<!-- Contenido -->
		<div class="page-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-12">
					<div class="row">
						<div class="col-sm-4">
	                        <article class="statistic-box green">
	                            <div>
	                                <div class="number" id="lbltotal"></div>
	                                <div class="caption"><div>Total de Proyectos</div></div>
	                            </div>
	                        </article>
	                    </div>
						<div class="col-sm-4">
	                        <article class="statistic-box yellow">
	                            <div>
	                                <div class="number" id="lbltotalabierto"></div>
	                                <div class="caption"><div>Total de Proyectos Abiertos</div></div>
	                            </div>
	                        </article>
	                    </div>
						<div class="col-sm-4">
	                        <article class="statistic-box red">
	                            <div>
	                                <div class="number" id="lbltotalcerrado"></div>
	                                <div class="caption"><div>Total de Proyectos Cerrados</div></div>
	                            </div>
	                        </article>
	                    </div>
					</div>
				</div>
			</div>

			<section class="card">
				<header class="card-header">
					Grafico Estadístico
				</header>
				<div class="card-block">
					<div id="divgrafico" style="height: 250px;"></div>
				</div>
			</section>

			<script>

				
			</script>
			
		</div>
	</div>
		<!-- Contenido -->	


		<?php require_once("../MainJs/js.php");?>

	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script type="text/javascript" src="home.js"></script>

	</body>
	</html>

<?php
	}else{
		header("Location:"."../../index.php");
	}

?>