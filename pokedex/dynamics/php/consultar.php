<?php
require "config.php";
$conexion = connect();
    
if (!$conexion) {
    echo "No se pudo conectar";
} else {
    $sql = "SELECT type_id, type_name FROM types";
    $res = mysqli_query($conexion, $sql);
    $respuesta = [];
    while ($datos = mysqli_fetch_assoc($res)) {
        $respuesta[] = $datos;
    }
    echo json_encode($respuesta);
}
?>
