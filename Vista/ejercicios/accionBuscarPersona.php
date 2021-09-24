<?php 
$Titulo = "Ejercicio 6";
include_once("../../vista/estructura/header.php");
include_once("../../configuracion.php");
$objAbmPersona = new AbmPersona();
$data = data_submitted();
if(array_key_exists('dniDuenio', $data)){
    $data = ['nroDni'=>$data['dniDuenio']];
    unset($data['dniDuenio']);
}
$objPersona = $objAbmPersona->buscar($data);
?>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <div class="card border rounded shadow fw-bold pt-1">
                <form class="ms-2 mb-3" id="datapers" name="datapers" method="POST" action="actualizarDatosPersona.php" data-toggle="validator" novalidate>
                    <p>Edite los datos de la persona:</p>
                    <div class="row pe-2 mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?=$objPersona[0]['nombre']?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" id="apellido" name="apellido" placeholder="Apellido" value="<?=$objPersona[0]['apellido']?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row pe-2 mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input class="form-control" type="number" id="nroDni" name="nroDni" placeholder="DNI" value="<?=$objPersona[0]['nroDni']?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input class="form-control" type="text" id="fechaNac" name="fechaNac" placeholder="Fecha de Nacimiento (AAAA-MM-DD)" value="<?=$objPersona[0]['fechaNac']?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row pe-2 mt-3">
                        <div class="col-md-5">
                            <div class="form-group">
                                <input class="form-control" type="text" id="telefono" name="telefono" placeholder="Telefono (sin 0 ni 15)" value="<?=$objPersona[0]['telefono']?>" required>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <input class="form-control" type="text" id="domicilio" name="domicilio" placeholder="Domicilio" value="<?=$objPersona[0]['domicilio']?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary" type="submit">Enviar</button>
                    </div>
                </form>
                <br />
                <a href='buscarPersona.php'><button class="btn btn-outline-secondary btn-sm">Volver</button></a>
            </div>
        </div>
    </div>
</div>
<?php include_once("../../vista/estructura/footer.php"); ?>