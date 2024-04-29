<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once('conexion.php');

    $conexion = new Conexion();
    $getConection = $conexion->Conectar();

$sql = "SELECT id_producto, nombre, url_producto, stock, precio  FROM producto";

$stm = $getConection->prepare($sql);
$stm->execute();

while($row = $stm->fetch(PDO::FETCH_ASSOC)) 
{
    $resultados[] = $row;
}

$json_resultados = json_encode($resultados);
echo $json_resultados;