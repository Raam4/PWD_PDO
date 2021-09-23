<?php 
$Titulo = "Ejercicio 4";
include_once("../../vista/estructura/header.php");
include_once("../../configuracion.php");
$objAbmAuto = new AbmAuto();
$data = data_submitted();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="card border rounded shadow px-2 py-3 mb-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Patente</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">DNI Dueño</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $arrAuto = $objAbmAuto->buscar($data);
                            if(count($arrAuto)>0){
                                echo '<tr>
                                    <th scope="row">'.$arrAuto[0]['patente'].'</th>
                                    <td>'.$arrAuto[0]['marca'].'</td>
                                    <td>'.$arrAuto[0]['modelo'].'</td>
                                    <td>'.$arrAuto[0]['dniDuenio'].'</td>
                                </tr>';
                            }else{
                                echo '<tr>
                                    <th colspan="4">No se ha encontrado ningún auto con la patente ingresada.</th>
                                </tr>';
                            }
                        ?>
                    </tbody>
                </table>
                <br />
                <a href='buscarAuto.php'><button class="btn btn-outline-secondary btn-sm">Volver</button></a>
            </div>
        </div>
    </div>
</div>
<?php include_once("../../vista/estructura/footer.php"); ?>