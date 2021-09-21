<?php 
$Titulo = "Ejercicio 4";
include_once("../../vista/estructura/header.php");
include_once("../../Control/AbmPersona.php");
$objAbmPersona = new AbmPersona();
$data = data_submitted();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="card border rounded shadow px-2 py-3 mb-4">
                <?php
                    if($objAbmPersona->alta($data)){
                        echo "<h3>Los datos de la persona fueron cargados exitosamente.</h3>";
                    }else{
                        echo "<h3>Los datos no pudieron ser cargados, verifique lo ingresado e intente nuevamente.</h3>";
                    }
                ?>
                <br />
                <a href='nuevaPersona.php'><button class="btn btn-outline-secondary btn-sm">Volver</button></a>
            </div>
        </div>
    </div>
</div>
<?php include_once("../../vista/estructura/footer.php"); ?>