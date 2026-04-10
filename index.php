<?php
    require_once("config/conexion.php");
    if(isset($_POST["enviar"]) and $_POST["enviar"]=="si"){
        require_once("models/Usuario.php");
        $usuario = new Usuario();
        $usuario->login();
    }
?>

<!DOCTYPE html>
<html>
<head lang="es">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <script src="../../../../jquery.min.js"></script>
    <!-- <script src="ruta/a/nuevoProyecto.js"></script> -->
	<title>Interventoria Security Shops</title>

	<link href="public/img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="public/img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="public/img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="public/img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
	<link href="public\img\logo security.png" rel="icon" type="image/png">
	<link href="public/img/favicon.ico" rel="shortcut icon">

    <link rel="stylesheet" href="public/css/separate/pages/login.min.css">
    <link rel="stylesheet" href="public/css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/main.css">
    <link rel="stylesheet" href="css/lib/bootstrap-sweetalert/sweetalert.css">
    <link rel="stylesheet" href="css/separate/vendor/sweet-alert-animations.min.css">
</head>

<body style= "background-color:black">
<div class="container h-100">
        <div class="container h-100">
            <div style="margin-top: 300px" class="container h-100">
                <form class="sign-box" action="" method="post" id="login_form">
                    <div class="sign-avatar">
                        <img src="public\img\logo security.png" alt="">
                    </div>
                    <header class="sign-title">Ingresar</header>
                    <?php
                    if(isset($_GET["m"])){
                        switch($_GET["m"]){
                            case "1";
                            ?>
                                <div class="alert alert-danger alert-icon alert-close alert-dismissible fade in" role="alert">
							        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								        <span aria-hidden="true">×</span>
							        </button>
							            <i class="font-icon font-icon-warning"></i>
                                        El correo y/o Contraseña son incorrectos.
						        </div>
                            <?php
                                break;

                            case "2";
                            ?>
                                <div class="alert alert-danger alert-icon alert-close alert-dismissible fade in" role="alert">
							        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								        <span aria-hidden="true">×</span>
							        </button>
							            <i class="font-icon font-icon-warning"></i>
							                Los campos estan vacios.
						        </div>
                            <?php
                            break;
                        }
                    }
                    ?>
                    <div class="form-group">
                        <input type="text" id="usu_correo" name="usu_correo" class="form-control" placeholder="Correo electronico"/>
                    </div>
                    <div class="form-group">
                        <input type="password" id="usu_pass" name="usu_pass" class="form-control" placeholder="Contraseña"/>
                    </div>
                    <div class="form-group">
                        <!--<div class="checkbox float-left">
                            <input type="checkbox" id="signed-in"/>
                            <label for="signed-in">Keep me signed in</label>
                        </div> Esto no se como conectarlo aun-->
                        <div class="float-right reset">
                            <a href="reset-password.html">Olvide contraseña</a>
                        </div>
                        
                    </div>
                    <p>Usuario demo admin@correo.com / contraseña 123456</p>
                    <input type="hidden" name="enviar" class="form-control" value= "si">
                    <button style = "background-color:black; border-color:black; color:#FFEA2F" type="submit" class="btn btn-rounded">Iniciar sesion</button>
                    <!--style = "background-color:black; border-color:black; color:#FFEA2F" esto es el color del boton-->
                </form>
            </div>
        </div>
    </div><!--.page-center-->
    <!--.<div class="page-center">
        <img src="public\img\SS-BANNER-SEP1.jpg" alt="">
    </div>-->


<script src="public/js/lib/jquery/jquery.min.js"></script>
<script src="public/js/lib/tether/tether.min.js"></script>
<script src="public/js/lib/bootstrap/bootstrap.min.js"></script>
<script src="public/js/plugins.js"></script>
    <script type="text/javascript" src="js/lib/match-height/jquery.matchHeight.min.js"></script>
    <script>
        $(function() {
            $('.page-center').matchHeight({
                target: $('html')
            });

            $(window).resize(function(){
                setTimeout(function(){
                    $('.page-center').matchHeight({ remove: true });
                    $('.page-center').matchHeight({
                        target: $('html')
                    });
                },100);
            });
        });
    </script>
<script src="public/js/app.js"></script>
</body>
</html>