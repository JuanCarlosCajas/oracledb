<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once('conexion.php');

$conexion = new Conexion();
$getConection = $conexion->Conectar();

################ CONSULTA PARA SEARCH ###################

$nombre = $_POST['nombre'];
$category = $_POST['category'];
$nombres = array();

if($category == 0){
    $sql = "SELECT * FROM producto WHERE nombre LIKE '%".$nombre."%' ";
    $stm = $getConection->prepare($sql);
    $stm->execute();

    while($row = $stm->fetch(PDO::FETCH_ASSOC)) 
    {
        $nombres[] = $row;
    }

    $json_resultados = json_encode($nombres);
    echo $json_resultados;
}
else{
    $sql = "SELECT * FROM producto WHERE nombre LIKE '%".$nombre."%' AND id_categoria LIKE '".$category."' ";
    $stm = $getConection->prepare($sql);
    $stm->execute();

    while($row = $stm->fetch(PDO::FETCH_ASSOC)) 
    {
        $nombres[] = $row;
    }

    $json_resultados = json_encode($nombres);
    echo $json_resultados;
}

