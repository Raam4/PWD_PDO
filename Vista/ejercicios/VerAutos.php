<?php 
$Titulo = "Ejercicio 3";
include_once("../../vista/estructura/header.php");
include_once("../../configuracion.php");
$objAbmAuto = new AbmAuto();
$objAbmPersona = new AbmPersona();
$autos = $objAbmAuto->buscar(null);
?>
<div class="container-fluid">
    <div class="row">
        <?php
        if(count($autos)!=0){
            foreach($autos as $obj){
                $param = ['nroDni' => $obj['dniDuenio']];
                $duenio = $objAbmPersona->buscar($param);
                echo '<div class="col-sm-4">
                        <div class="card border rounded shadow fw-bold px-2 pt-1 mb-2">
                            <p>Patente: '.$obj['patente'].'</p>
                            <p>Marca: '.$obj['marca'].'</p>
                            <p>Modelo: '.$obj['modelo'].'</p>
                            <p>Dueño:</p>
                            <p>DNI: '.$obj['dniDuenio'].'</p>
                            <p>Nombre: '.$duenio[0]['nombre'].'</p>
                            <p>Apellido: '.$duenio[0]['apellido'].'</p>
                        </div>
                    </div>';
            }
        }else{
            echo '<div class="col-sm-4">
                    <div class="card border rounded shadow fw-bold px-2 pt-1 mb-2">
                        <p>No se encuentran autos cargados</p>
                    </div>
                </div>';
        }
        ?>
        <div class="col-sm">
            <p>
                Crear una pagina php “VerAutos.php”, en ella usando la capa de control correspondiente
                mostrar todos los datos de los autos que se encuentran cargados, de los dueños mostrar nombre y apellido.
                En caso de que no se encuentre ningún auto cargado en la base mostrar un mensaje indicando que no hay
                autos cargados.
            </p>
        </div>
    </div>
</div>

<?php include_once("../../vista/estructura/footer.php"); ?>