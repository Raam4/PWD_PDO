<?php 
$Titulo = "Ejercicio 5";
include_once("../../vista/estructura/header.php");
include_once("../../Control/AbmAuto.php");
include_once("../../Control/AbmPersona.php");
$objAbmAuto = new AbmAuto();
$objAbmPersona = new AbmPersona();
$data = data_submitted();
$persona = $objAbmPersona->buscar($data);
$dataCar = ['dniDuenio'=>$data['nroDni']];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="card border rounded shadow px-2 py-3 mb-4">
                <p>Autos pertenecientes a:</p>
                <?php
                    echo $persona[0]['nroDni'].' | '.$persona[0]['apellido'].' '.$persona[0]['nombre'].' | '.$persona[0]['fechaNac'].' | 
                    '.$persona[0]['telefono'].' | '.$persona[0]['domicilio'];
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Patente</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Modelo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $arrAuto = $objAbmAuto->buscar($dataCar);
                            if(count($arrAuto)>0){
                                foreach($arrAuto as $obj){
                                    echo '<tr>
                                        <th scope="row">'.$obj['patente'].'</th>
                                        <td>'.$obj['marca'].'</td>
                                        <td>'.$obj['modelo'].'</td>
                                    </tr>';
                                }
                            }else{
                                echo '<tr>
                                    <th colspan="4">No se ha encontrado ningún auto perteneciente a esta persona.</th>
                                </tr>';
                            }
                        ?>
                    </tbody>
                </table>
                <br />
                <a href='listaPersonas.php'><button class="btn btn-outline-secondary btn-sm">Volver</button></a>
            </div>
        </div>
    </div>
</div>
<?php include_once("../../vista/estructura/footer.php"); ?>