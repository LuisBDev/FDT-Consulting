<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["user_id"])) {
?>

    <!DOCTYPE html>
    <html>

    <!-- HEAD -->
    <?php require_once("../MainHead/head.php"); ?>
    <title>SGI - Nuevo Ticket</title>
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
            <header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Crear Nuevo Ticket</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="../Home/index.php">Inicio</a></li>
								<li class="active">Nuevo Ticket</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

            <div class="box-typical box-typical-padding">

				<h5 class="m-t-lg with-border">Ingresar información del ticket a generar</h5>

				<form>

                    <div class="form-group row">
                            <label for="exampleSelect" class="col-sm-2 form-control-label">Categoría</label>
                            <div class="col-sm-10">
                                <select id="exampleSelect" class="form-control">
                                    <option>Hardware</option>
                                    <option>Software</option>
                                    <option>Red</option>
                                    <option>Otros</option>
                                </select>
                            </div>
                    </div>

					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Título</label>
						<div class="col-lg-4">
							<p class="form-control-static"><input type="text" class="form-control" id="inputPassword" placeholder="Text"></p>
						</div>


						<label for="exampleSelect" class="col-sm-2 form-control-label">Fecha de Incidencia</label>
						<div class="col-sm-4">
                        <input type="text" class="form-control" id="date-mask-input" placeholder="__/__/____">
						</div>
					</div>


					<div class="form-group row">
						<label for="exampleSelect" class="col-sm-2 form-control-label">Descripción</label>
                        <div class="summernote-theme-10">
					    <textarea class="summernote" id="ticket_descripcion" name="name"></textarea>
				        </div>
					</div>

                    <!-- Boton crear ticket -->
                    <div class="d-flex justify-content-center align-items-center">
                    <button type="button" class="btn btn-rounded btn-inline">Registrar Incidencia</button>
            
                    </div>
                    

				</form>
            
                </div>
            </div>

        </div>
        <!-- FIN CONTENIDO -->

        <?php require_once("../MainJs/js.php"); ?>
        <script type="text/javascript" src = "nuevoticket.js"></script>
    </body>

    </html>

    }
<?php
} else {
    $conectar = new Conectar();
    header("Location:" . $conectar->ruta() . "index.php");
}
?>