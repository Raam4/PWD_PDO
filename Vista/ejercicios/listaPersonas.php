<?php 
$Titulo = "Ejercicio 4";
include_once("../../vista/estructura/header.php");
include_once("../../Control/AbmPersona.php");
$objAbmPersona = new AbmPersona();
$personas = $objAbmPersona->buscar(null);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9">
            <div class="card border rounded shadow px-2 py-3 mb-4">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">DNI</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Fecha de Nacimiento</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Domicilio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(count($personas)!=0){
                                foreach($personas as $obj){
                                    echo '<tr>
                                            <th scope="row"><a href="autosPersona.php?nroDni='.$obj['nroDni'].'">'.$obj['nroDni'].'</th>
                                            <td>'.$obj['apellido'].'</td>
                                            <td>'.$obj['nombre'].'</td>
                                            <td>'.$obj['fechaNac'].'</td>
                                            <td>'.$obj['telefono'].'</td>
                                            <td>'.$obj['domicilio'].'</td>
                                        </tr>';
                                }
                                echo '<tr><td colspan="6">Click en el DNI para ver los autos de la persona.</td></tr>';
                            }else{
                                echo '<tr>
                                        <th colspan="6">No se ha encontrado ninguna persona cargada.</th>
                                    </tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm">
            <p>
                Crear una página "listaPersonas.php" que muestre un listado con las personas que se
                encuentran cargadas y un link a otra página “autosPersona.php” que recibe un dni de una persona y muestra
                los datos de la persona y un listado de los autos que tiene asociados.
            </p>
        </div>
    </div>
</div>

<?php include_once("../../vista/estructura/footer.php"); ?>