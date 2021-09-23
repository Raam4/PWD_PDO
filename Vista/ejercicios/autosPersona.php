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
        <div class="col-sm-8">
            <div class="card border rounded shadow px-2 py-3 mb-4">
                <table class="table text-center">
                    <thead>
                        <tr><th colspan="6" scope="col">Persona</th></tr>
                    </thead>
                    <thead>
                        <tr>
                            <th scope="col">DNI</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Fecha de Nac.</th>
                            <th scope="col">Domicilio</th>
                            <th scope="col">Telefono</th>
                        </tr>
                    </thead> 
                    <tbody>
                        <?php
                            echo '<tr>
                                <th scope="row">'.$persona[0]['nroDni'].'</th>
                                <td>'.$persona[0]['apellido'].'</td>
                                <td>'.$persona[0]['nombre'].'</td>
                                <td>'.$persona[0]['fechaNac'].'</td>
                                <td>'.$persona[0]['telefono'].'</td>
                                <td>'.$persona[0]['domicilio'].'</td>
                            </tr>';
                        ?>
                    </tbody>
                </table>
                <table class="table text-center">
                    <thead>
                        <tr><th colspan="4" scope="col">Autos que le pertenecen</th></tr>
                    </thead>
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