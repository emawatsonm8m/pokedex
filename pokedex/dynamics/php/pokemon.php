<?php
require "config.php";
$conexion = connect();

if (!$conexion) {
    echo "No se pudo conectar";
} else {
    $id_pokemon = (isset($_GET["id"]) && $_GET["id"] != "") ? $_GET["id"] : false;

    $sql = "SELECT pok_id, pok_name, pok_weight, pok_height, pok_base_experience, type_name FROM pokemon NATURAL JOIN pokemon_types NATURAL JOIN types WHERE pok_id = '$id_pokemon' AND slot = 1";

    $res = mysqli_query($conexion, $sql);
    $respuesta = mysqli_fetch_assoc($res);
    echo json_encode($respuesta);
}
?>
