    <!--style= "background-color:black"-->
<header style= "background-color:black" class="site-header">
	    <div class="container-fluid">
	
	        <a href="#" class="site-logo">
	            <img class="hidden-md-down" src="../../public\img\logo amarillo.png" alt="">
	            <img class="hidden-lg-up" src="../../public\img\logo security.png" alt="">
	        </a>
	
	        <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
	            <span>toggle menu</span>
	        </button>
	
	        <button class="hamburger hamburger--htla">
	            <span>toggle menu</span>
	        </button>
	        <div class="site-header-content">
	            <div class="site-header-content-in">
	                <div class="site-header-shown">
	
	                    <div class="dropdown user-menu">
	                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                            <img src="../../public\img\logo security.png" alt="">
	                        </button>
	                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
	                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-user"></span>Perfil</a>
	                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-cog"></span>Configuracion</a>
	                            <div class="dropdown-divider"></div>
	                            <a class="dropdown-item" href="../Logout/Logout.php"><span class="font-icon glyphicon glyphicon-log-out"></span>Cerrar Sesion</a>
	                        </div>
	                    </div>
	
	                    <button type="button" class="burger-right">
	                        <i class="font-icon-menu-addl"></i>
	                    </button>
	                </div>


	                        

							<!-- este div es para mostrar nombre --------------------------------------------------------->

							<input type="hidden" id="user_idx" value="<?php echo $_SESSION["usu_id"]?>" >
							<input type="hidden" id="rol_idx" value="<?php echo $_SESSION["rol_id"]?>" >
							<!-- font-icon font-icon-home --> <!-- icono casita para el nombre -->
							<div style="color:white" style="margin: 0px   30px" class="dropdown dropdown-typical">
							<!-- <a href="#" class="dropdown-toggle nmo-arr"> esto es para desplegar-->
								<span class="#" ></span> 
								<span class="lblcontactonom"> <?php echo $_SESSION["usu_nom"]?> </span> <?php echo $_SESSION["usu_ape"]?> </span>
								</a>
							</div> 
							<!-- este div es para mostrar nombre --------------------------------------------------------->

							<!-- este div es para el icono de busqueda ----------------------------->
<!-- 	                        <div class="site-header-search-container">
	                            <form class="site-header-search closed">
	                                <input type="text" placeholder="Search"/>
	                                <button type="submit">
	                                    <span class="font-icon-search"></span>
	                                </button>
	                            </form>
	                        </div> -->
							<!-- este div es para el icono de busqueda ----------------------------->
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</header><!--.site-header-->