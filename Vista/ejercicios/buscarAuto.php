<?php 
$Titulo = "Ejercicio 4";
include_once("../../vista/estructura/header.php");
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4">
            <div class="card border rounded shadow fw-bold px-2 py-3 mb-4">
                <form id="buscarAuto" name="buscarAuto" method="POST" action="accionBuscarAuto.php" data-toggle="validator">
                    <div class="col-sm-10 ps-3 mb-3">
                        <label for="numero" class="form-label">Ingrese una patente:</label>
                        <input class="form-control" type="text" id="patente" name="patente" placeholder="ABC 123" required>
                    </div>
                    <div class="col-sm-10 ps-3">
                        <button class="btn btn-success mb-3" type="submit">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-12">
            <p>
                Crear una pagina "buscarAuto.php" que contenga un formulario en donde se solicite el numero
                de patente de un auto, estos datos deberán ser enviados a una pagina “accionBuscarAuto.php” en donde
                usando la clase de control correspondiente, se soliciten los datos completos del auto que se corresponda con
                la patente ingresada y mostrar los datos en una tabla. También deberán mostrar los carteles que crean
                convenientes en caso de que no se encuentre ningún auto con la patente ingresada.
                Utilizar css y validaciones javaScript cuando crea conveniente.
            </p>
        </div>
    </div>
</div>

<?php include_once("../../vista/estructura/footer.php"); ?>