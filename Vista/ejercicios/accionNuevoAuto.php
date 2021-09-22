<?php 
$Titulo = "Ejercicio 7";
include_once("../../vista/estructura/header.php");
include_once("../../Control/AbmAuto.php");
$objAbmAuto = new AbmAuto();
$data = data_submitted();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="card border rounded shadow px-2 py-3 mb-4">
                <?php
                    if($objAbmAuto->alta($data)){
                        echo "<h3>Los datos del auto fueron cargados exitosamente.</h3>";
                    }else{
                        echo "<h3>Los datos no pudieron ser cargados, verifique lo ingresado e intente nuevamente.</h3>";
                    }
                ?>
                <br />
                <a href='nuevoAuto.php'><button class="btn btn-outline-secondary btn-sm">Volver</button></a>
            </div>
        </div>
    </div>
</div>
<?php include_once("../../vista/estructura/footer.php"); ?>