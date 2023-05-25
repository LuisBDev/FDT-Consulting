<?php
require_once("config/conexion.php");
if (isset($_POST["enviar"]) and $_POST["enviar"] == "si") {

    require_once("models/Usuario.php");
    $usuario = new Usuario();
    $usuario->Login();
    // exit();

}

?>

<!DOCTYPE html>
<html>

<head lang="es">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sistema de Gestión de Incidencias</title>

    <link href="public/img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="public/img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="public/img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="public/img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
    <link href="public/img/favicon.png" rel="icon" type="image/png">
    <link href="public/img/favicon.ico" rel="shortcut icon">


    <link rel="stylesheet" href="public/css/separate/pages/login.min.css">
    <link rel="stylesheet" href="public/css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/main.css">
</head>

<body>

    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">

                   <form class="sign-box" action="" method="post" id="login_form">
                    <div class="sign-avatar">
                        <img src="public/img/logo-2.png" alt="" style="width: 170px; height: 100px; margin-left:-23%;">
                    </div>

                    <header class="sign-title">Iniciar Sesión</header>

                    <?php
                    if (isset($_GET["m"])) {
                        switch ($_GET["m"]) 
                        {
                            case "1";
                            ?>
                                <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"></span>
                                    </button>
                                    <i class="font-icon font-icon-warning"></i>
                                    Credenciales Incorrectas
                                </div>
                            <?php
                            break;
                            case "2";
                            ?>
                                <div class="alert alert-warning" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"></span>
                                    </button>
                                    <i class="font-icon font-icon-warning"></i>
                                    Los campos están vacíos
                                </div>
                            <?php
                            break;
                        }
                    }
                    ?>

                    <div class="form-group">
                      <input type="text" id="user_correo" name="user_correo" class="form-control" placeholder="E-Mail" pattern=".*@.*" title="El correo electrónico debe contener '@'" required />
                    </div>


                    <div class="form-group">
                        <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Password" pattern=".{8,16}" title="La contraseña debe tener entre 8 y 16 caracteres" />
                        <i class="bi bi-eye-slash" id="togglePassword"></i>
                    </div>

                    <div class="form-group">
                        <div class="float-right reset">
                            <a href="reset-password.php">Recuperar Clave</a>
                        </div>
                    </div>
                    <input type="hidden" name="enviar" class="form-control" value="si">
                    <button type="submit" class="btn btn-rounded">Acceder</button>


                    <!--<button type="button" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>-->
                </form>
            </div>
        </div>
    </div><!--.page-center-->


    <script src="public/js/lib/jquery/jquery-3.2.1.min.js"></script>
    <script src="public/js/lib/popper/popper.min.js"></script>
    <script src="public/js/lib/tether/tether.min.js"></script>
    <script src="public/js/lib/bootstrap/bootstrap.min.js"></script>
    <script src="public/js/plugins.js"></script>
    <script type="text/javascript" src="public/js/lib/match-height/jquery.matchHeight.min.js"></script>
    <script>
        $(function() {
            $('.page-center').matchHeight({
                target: $('html')
            });

            $(window).resize(function() {
                setTimeout(function() {
                    $('.page-center').matchHeight({
                        remove: true
                    });
                    $('.page-center').matchHeight({
                        target: $('html')
                    });
                }, 100);
            });
        });
    </script>
    <script src="public/js/app.js"></script>

</body>

</html>
