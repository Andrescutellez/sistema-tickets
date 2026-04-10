<?php
	if ($_SESSION["rol_id"]==2){
		?>
			<nav class="side-menu">
	    <ul class="side-menu-list">
	        <li>
				<a href="../home/">
					<span style="color:black" class="glyphicon glyphicon-th" ></span>
					<span class="lbl" >Inicio</span>
				</a>
			</li>
	    </ul>

		<ul class="side-menu-list">
	        <li>
				<a href="../nuevoProyecto/">
					<span style="color:black" class="glyphicon glyphicon-th" ></span>
					<span class="lbl" >Nuevo Proyecto	</span>
				</a>
			</li>
	    </ul>

		<ul class="side-menu-list">
	        <li>
				<a href="../consultarProyecto/">
					<span style="color:black" class="glyphicon glyphicon-th" ></span>
					<span class="lbl" >Consultar Proyecto	</span>
				</a>
			</li>
	    </ul>

		<ul class="side-menu-list">
	        <li>
				<a href="../mntusuarios/">
					<span style="color:black" class="glyphicon glyphicon-th" ></span>
					<span class="lbl" >Usuarios	</span>
				</a>
			</li>
	    </ul>
	
	    <section>
	        <header class="side-menu-title">Proyectos</header>

	    </section>
	</nav><!--.side-menu-->
		<?php
	}else{
    	?>

		<nav class="side-menu">
	    <ul class="side-menu-list">
	        <li>
				<a href="../home/">
					<span style="color:black" class="glyphicon glyphicon-th" ></span>
					<span class="lbl" >Inicio</span>
				</a>
			</li>
	    </ul>

		<ul class="side-menu-list">
	        <li>
				<a href="../consultarProyecto/">
					<span style="color:black" class="glyphicon glyphicon-th" ></span>
					<span class="lbl" >Consultar Proyecto	</span>
				</a>
			</li>
	    </ul>
	
	    <section>
	        <header class="side-menu-title">Proyectos</header>

	    </section>
	</nav><!--.side-menu-->

		<?php
	}

?>

