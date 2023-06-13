<?php
    require "config.php";
    $conexion = connect ();
    if(!$conexion)
    {
        echo "No se puedo conectar la base";
    }else{
        $termino = (isset($_GET["termino"]) && $_GET["termino"] != "")? $_GET["termino"] : false;
        $sql = "SELECT pok_id, pok_name, pok_weight,  pok_height, pok_base_experience, type_name FROM pokemon NATURAL JOIN pokemon_types NATURAL JOIN types WHERE pok_name LIKE '%$termino%'";
        $res = mysqli_query($conexion, $sql);
        $respuesta = [];
        while ($row = mysqli_fetch_assoc($res)) {
            $respuesta[] = $row;
        }
        echo json_encode($respuesta);
    }
?>