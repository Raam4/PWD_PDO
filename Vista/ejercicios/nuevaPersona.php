<?php 
$Titulo = "Ejercicio 6";
include_once("../../vista/estructura/header.php");
?>
<script src="../js/verificaDniPersona.js"></script>
<script type="text/javascript">
function goToAccion(){
    var doc=document.getElementById("dni").value;
    window.location = "accionBuscarPersona.php?nroDni="+doc;
}
</script>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <div class="card border rounded shadow pt-1">
                <form class="ms-2 mb-3 needs-validation" id="nuevaPersona" name="nuevaPersona" method="POST" action="accionNuevaPersona.php" novalidate>
                    <p class="fw-bold">Ingrese los datos de la nueva persona a cargar:</p>
                    <p>Debe verificar si el DNI de la persona no está cargado.</p>
                    <div class="row pe-2 mt-3">
                        <div class="col-md-5">
                            <div class="form-group">
                                <input class="form-control" type="text" id="dni" name="nroDni" placeholder="DNI" required>
                            </div>
                        </div>
                        <div class="col-md-2 pt-1">
                            <div class="form-group">
                                <button class="btn btn-sm btn-primary" type="button" onclick="doThis($('#dni').val())">Verificar</button>
                            </div>
                        </div>
                        <div class="col-md-4 pt-1" id="carga" style="visibility:hidden">
                            <div class="form-group">
                                <button class="btn btn-sm btn-primary" type="button" onclick="goToAccion()">Editar Persona</button>
                            </div>
                        </div>
                    <div class="row pe-2 mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" id="nombre" name="nombre" maxlength="50" pattern="^([A-Za-z]+)$" placeholder="Nombre" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" id="apellido" name="apellido" maxlength="50" pattern="^([A-Za-z]+)$" placeholder="Apellido" required>
                            </div>
                        </div>
                    </div>
                    <div class="row pe-2 mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="date" id="fechaNac" name="fechaNac" min="1900-01-01" max="2003-09-30" placeholder="Fecha de Nacimiento (AAAA-MM-DD)" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="number" id="telefono" name="telefono" placeholder="Telefono (sin 0 ni 15)" required>
                            </div>
                        </div>
                    </div>
                    <div class="row pe-2 mt-3">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input class="form-control" type="text" id="domicilio" name="domicilio" maxlength="100" pattern="^([A-Za-z0-9]+)$" placeholder="Domicilio" required>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary" id="submit" type="submit" disabled>Enviar</button>
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
        </div>
        <div class="row"></div>
            <div class="col-sm mt-3">
                <p>
                    Crear una página “NuevaPersona.php” que contenga un formulario que permita solicitar todos
                    los datos de una persona. Estos datos serán enviados a una página “accionNuevaPersona.php” que cargue
                    un nuevo registro en la tabla persona de la base de datos. Se debe mostrar un mensaje que indique si se
                    pudo o no cargar los datos de la persona. Utilizar css y validaciones javaScript cuando crea conveniente.
                </p>
            </div>
        </div>
    </div>
</div>
<?php include_once("../../vista/estructura/footer.php"); ?>