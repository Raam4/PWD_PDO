<?php 
$Titulo = "Ejercicio 4";
include_once("../../vista/estructura/header.php");
include_once("../../configuracion.php");
$objAbmPersona = new AbmPersona();
$objAbmAuto = new AbmAuto();
$data = data_submitted();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="card border rounded shadow px-2 py-3 mb-4">
                <?php
                    $objAuto = $objAbmAuto->buscar(array('patente' => $data['patente']));
                    $objPersona = $objAbmPersona->buscar(array('nroDni' => $data['nroDni']));
                    if(count($objAuto)!=0 and count($objPersona)!=0){
                        $objAuto[0]['dniDuenio'] = $data['nroDni'];
                        if($objAbmAuto->modificacion($objAuto[0])){
                            echo "<h3>El cambio de dueño fue realizado con éxito</h3>";
                        }else{
                            echo "<h3>Los datos no pudieron ser cargados, verifique lo ingresado e intente nuevamente.</h3>";
                        }
                    }elseif(count($objAuto)==0){
                        echo "<h3>La patente ingresada no existe.</h3>";
                    }elseif(count($objPersona)==0){
                        echo "<h3>El DNI ingresado no existe.</h3>";
                    }else{
                        echo "<h3>Hay algo mal que no esta bien(?)</h3>";
                    }
                ?>
                <br />
                <a href='cambioDuenio.php'><button class="btn btn-outline-secondary btn-sm">Volver</button></a>
            </div>
        </div>
    </div>
</div>
<?php include_once("../../vista/estructura/footer.php"); ?>