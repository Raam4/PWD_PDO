<?php 
$Titulo = "Ejercicio 4";
include_once("../../vista/estructura/header.php");
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4">
            <div class="card border rounded shadow fw-bold px-2 py-3 mb-4">
                <form id="cambioDuenio" name="cambioDuenio" method="POST" action="accionCambioDuenio.php" data-toggle="validator">
                    <div class="col-sm-10 ps-3 mb-3">
                        <label class="form-label">Ingrese una patente:</label>
                        <input class="form-control" type="text" id="patente" name="patente" placeholder="ABC 123" required>
                    </div>
                    <div class="col-sm-10 ps-3 mb-3">
                        <label class="form-label">Ingrese el DNI del nuevo dueño:</label>
                        <input class="form-control" type="number" id="nroDni" name="nroDni" placeholder="DNI" required>
                    </div>
                    <div class="col-sm-10 ps-3">
                        <button class="btn btn-success mb-3" type="submit">Cambiar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-12">
            <p>
                Crear una página “CambioDuenio.php” que contenga un formulario en donde se solicite el
                numero de patente de un auto y un numero de documento de una persona, estos datos deberán ser enviados
                a una página “accionCambioDuenio.php” en donde se realice cambio del dueño del auto de la patente
                ingresada en el formulario. Mostrar mensajes de error en caso de que el auto o la persona no se encuentren
                cargados.
            </p>
        </div>
    </div>
</div>

<?php include_once("../../vista/estructura/footer.php"); ?>