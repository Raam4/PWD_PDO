<?php 
$Titulo = "Ejercicio 9";
include_once("../../vista/estructura/header.php");
?>
<script src="../js/verificaDni.js"></script>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="card border rounded shadow px-2 py-3 mb-4">
                <form id="buscarPersona" name="buscarPersona" method="POST" action="accionBuscarPersona.php" novalidate>
                <p class="fw-bold">Ingrese el DNI de la persona que desea buscar:</p>
                    <p>Debe verificar si el DNI de la persona está cargado.</p>
                    <div class="row pe-2 mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" id="dni" name="dniDuenio" placeholder="DNI del dueño" required>
                            </div>
                        </div>
                        <div class="col-md-2 pt-1">
                            <div class="form-group">
                                <button class="btn btn-sm btn-primary" type="button" onclick="doThis($('#dni').val())">Verificar</button>
                            </div>
                        </div>
                        <div class="col-md-4 pt-1" id="carga" style="visibility:hidden">
                            <div class="form-group">
                                <a href="nuevaPersona.php"><button class="btn btn-sm btn-primary" type="button">Cargar Persona</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-10 mt-3">
                        <button class="btn btn-success mb-3" id="submit" type="submit" disabled>Buscar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-12">
            <p>
                Crear una página “BuscarPersona.php” que contenga un formulario que permita cargar un
                numero de documento de una persona. Estos datos serán enviados a una página “accionBuscarPersona.php”
                busque los datos de la persona cuyo documento sea el ingresado en el formulario los muestre en un nuevo
                formulario; a su vez este nuevo formulario deberá permitir modificar los datos mostrados (excepto el nro de
                documento) y estos serán enviados a otra página “ActualizarDatosPersona.php” que actualiza los datos de la
                persona.
            </p>
        </div>
    </div>
</div>

<?php include_once("../../vista/estructura/footer.php"); ?>