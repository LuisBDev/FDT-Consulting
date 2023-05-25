<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["user_id"])) {
?>

    <!DOCTYPE html>
    <html>

    <!-- HEAD -->
    <?php require_once("../MainHead/head.php"); ?>
    <title>Sistema de Gestión de Incidencias</title>
    </head>
    <!-- FIN HEAD -->

    <body class="with-side-menu">

        <?php require_once("../MainHeader/header.php"); ?>
        <div class="mobile-menu-left-overlay">
        </div>
        <?php require_once("../MainNav/nav.php"); ?>


        <!-- INICIO CONTENIDO -->
        <div class="page-content">
            <div class="container-fluid">
                Blank page.
            </div>
        </div>
        <!-- FIN CONTENIDO -->

        <?php require_once("../MainJs/js.php"); ?>
        <script type="text/javascript" src = "home.js"></script>



    </body>

    </html>

    }
<?php
} else {
    $conectar = new Conectar();
    header("Location:" . $conectar->ruta() . "index.php");
}
?>