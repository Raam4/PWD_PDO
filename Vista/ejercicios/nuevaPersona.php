<?php 
$Titulo = "Ejercicio 6";
include_once("../../vista/estructura/header.php");
?>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <div class="card border rounded shadow fw-bold pt-1">
                <form class="ms-2 mb-3" id="datapers" name="datapers" method="POST" action="accionNuevaPersona.php" data-toggle="validator" novalidate>
                    <p>Ingrese los datos de la nueva persona a cargar:</p>
                    <div class="row pe-2 mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombre" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" id="apellido" name="apellido" placeholder="Apellido" required>
                            </div>
                        </div>
                    </div>
                    <div class="row pe-2 mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input class="form-control" type="number" id="nroDni" name="nroDni" placeholder="DNI" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input class="form-control" type="text" id="fechaNac" name="fechaNac" placeholder="Fecha de Nacimiento (AAAA-MM-DD)" required>
                            </div>
                        </div>
                    </div>
                    <div class="row pe-2 mt-3">
                        <div class="col-md-5">
                            <div class="form-group">
                                <input class="form-control" type="number" id="telefono" name="telefono" placeholder="Telefono" required>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <input class="form-control" type="text" id="domicilio" name="domicilio" placeholder="Domicilio" required>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
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