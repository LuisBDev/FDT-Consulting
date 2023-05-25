<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["user_id"])) {
?>

    <!DOCTYPE html>
    <html>

    <!-- HEAD -->
    <?php require_once("../MainHead/head.php"); ?>
    <title>Sistema de Gestión de Incidencias</title>
    <div class="container-fluid">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h3>Plottable.js Charts</h3>
                </div>
            </div>
        </div>
    </div>
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
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-sm-4">
                            <article class="statistic-box green">
                                <div>
                                    <div class="number">26</div>
                                    <div class="caption">
                                        <div>Total</div>
                                    </div>
                                    <div class="percent">
                                        <div class="arrow up"></div>
                                        <p>15%</p>
                                    </div>
                                </div>
                            </article>
                        </div><!--.col-->
                        <div class="col-sm-4">
                            <article class="statistic-box yellow">
                                <div>
                                    <div class="number">12</div>
                                    <div class="caption">
                                        <div>Open</div>
                                    </div>
                                    <div class="percent">
                                        <div class="arrow down"></div>
                                        <p>11%</p>
                                    </div>
                                </div>
                            </article>
                        </div><!--.col-->
                        <div class="col-sm-4">
                            <article class="statistic-box red">
                                <div>
                                    <div class="number">104</div>
                                    <div class="caption">
                                        <div>Close</div>
                                    </div>
                                    <div class="percent">
                                        <div class="arrow down"></div>
                                        <p>5%</p>
                                    </div>
                                </div>
                            </article>
                        </div><!--.col-->
                    </div><!--.row-->
                </div><!--.col-xl-12-->
            </div><!--.container-fluid-->
        </div><!--.page-content-->

        <!-- FIN CONTENIDO -->

        <?php require_once("../MainJs/js.php"); ?>
        <script type="text/javascript" src="home.js"></script>



    </body>

    </html>


<?php
} else {
    $conectar = new Conectar();
    header("Location:" . $conectar->ruta() . "index.php");
}
?>