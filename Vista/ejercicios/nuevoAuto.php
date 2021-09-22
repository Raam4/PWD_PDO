<?php 
$Titulo = "Ejercicio 7";
include_once("../../vista/estructura/header.php");
?>
<script type="text/javascript">
    function doThis(dni){
        var param = {"dniDuenio" : dni};
        $.ajax({
            data: param,
            url: 'verificaDni.php',
            type: 'POST',
            dataType: 'json',
            success: function(response) {
                if(!response.noexiste){
                    alert(response.existe);
                    document.getElementById('submit').disabled=false;
                    document.getElementById('carga').style.visibility = 'hidden';
                }else{
                    alert(response.noexiste);
                    document.getElementById('submit').disabled=true;
                    document.getElementById('carga').style.visibility = 'visible';
                }
            }
        });
    };
    $(document).ready(function(){
	    $("#dniDuenio").change(function(){
            document.getElementById('submit').disabled=true;
	    });
    });
</script>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="card border rounded shadow pt-1">
                <form class="ms-2 mb-3 needs-validation" id="datacar" name="datacar" method="POST" action="accionNuevoAuto.php" novalidate>
                    <p class="fw-bold">Ingrese los datos del nuevo auto a cargar:</p>
                    <p>Debe verificar si el DNI de la persona está cargado, caso contrario debe cargarlo.</p>
                    <div class="row pe-2 mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" id="dniDuenio" name="dniDuenio" placeholder="DNI del dueño" required>
                            </div>
                        </div>
                        <div class="col-md-2 pt-1">
                            <div class="form-group">
                                <button class="btn btn-sm btn-primary" type="button" onclick="doThis($('#dniDuenio').val())">Verificar</button>
                            </div>
                        </div>
                        <div class="col-md-4 pt-1" id="carga" style="visibility:hidden">
                            <div class="form-group">
                                <a href="nuevaPersona.php"><button class="btn btn-sm btn-primary" type="button">Cargar Persona</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="row pe-2 mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" id="patente" name="patente" pattern="^([A-Z]{3} [0-9]{3})$" placeholder="Patente" required>
                                <div class="invalid-feedback">
                                    Ej. "ABC 123"
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" id="marca" name="marca" pattern="^([a-zA-Z ]{0,50})$" placeholder="Marca" required>
                            </div>
                        </div>
                    </div>
                    <div class="row pe-2 mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="number" min="1980" max="2021" id="modelo" name="modelo" placeholder="Modelo" required>
                                <div class="invalid-feedback">
                                    Desde 1980 a 2021.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-success" id="submit" type="submit" disabled>Enviar</button>
                    </div>
                    <script>
                        (function () {
                            'use strict'
                            var forms = document.querySelectorAll('.needs-validation')
                            Array.prototype.slice.call(forms)
                                .forEach(function (form) {
                                form.addEventListener('submit', function (event) {
                                    if (!form.checkValidity()) {
                                    event.preventDefault()
                                    event.stopPropagation()
                                    }
                                    form.classList.add('was-validated')
                                }, false)
                                })
                            })()
                    </script>
                </form>
            </div>
            <div class="col-sm mt-3">
                <p>
                    Crear una página “NuevoAuto.php” que contenga un formulario en el que se permita cargar
                    todos los datos de un auto (incluso su dueño). Estos datos serán enviados a una página
                    “accionNuevoAuto.php” que cargue un nuevo registro en la tabla auto de la base de datos. Se debe chequear
                    antes que la persona dueña del auto ya se encuentre cargada en la base de datos, de no ser así mostrar un
                    link a la página que permite carga una nueva persona. Se debe mostrar un mensaje que indique si se pudo o
                    no cargar los datos
                </p>
            </div>
        </div>
    </div>
</div>
<?php include_once("../../vista/estructura/footer.php"); ?>