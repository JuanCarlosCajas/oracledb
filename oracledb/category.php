<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once('conexion.php');

$conexion = new Conexion();
$getConection = $conexion->Conectar();

######################### CONSULTA SQL PARA SEARCH ####################################

#$category = $_POST['category'];

$category = $_POST['category'];

if($category != "Todos"){
    $sql2 = "SELECT id_categoria FROM categoria WHERE nombre_categoria='".$category."' ";
    $stm2 = $getConection->prepare($sql2);
    $stm2->execute();

    while($row = $stm2->fetch(PDO::FETCH_ASSOC)){
        echo json_encode($row);
    }
}
else{
    $resultadoTodos = ["id" => "0"];

    echo json_encode($resultadoTodos);
}
