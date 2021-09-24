<?php
include_once("../configuracion.php");
$objAbmPersona = new AbmPersona();
$data = data_submitted();
$data = ['nroDni'=>$data['dniDuenio']];
$arrayPersona = $objAbmPersona->buscar($data);
$arrayResult = array();
if(count($arrayPersona)!=0){
    $arrayResult['existe'] = "La persona con el dni cargado existe";
}else{
    $arrayResult['noexiste'] = 'La persona con el dni cargado no existe';
}
echo json_encode($arrayResult);
?>