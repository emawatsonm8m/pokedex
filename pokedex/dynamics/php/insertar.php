<?php
    require "config.php";
    $conexion = connect();
    if(!$conexion)
    {
        echo "No se pudo conectar con la base";
    }else{
        $nombre = (isset($_POST["nombre"]) && $_POST["nombre"] != "")? $_POST["nombre"] : false;
        $altura = (isset($_POST["altura"]) && $_POST["altura"] != "")? $_POST["altura"] : false;
        $peso = (isset($_POST["peso"]) && $_POST["peso"] != "")? $_POST["peso"] : false;
        $exp_base = (isset($_POST["exp_base"]) && $_POST["exp_base"] != "")? $_POST["exp_base"] : false;
        $tipo = (isset($_POST["tipo"]) && $_POST["tipo"] != "")? $_POST["tipo"] : false;
        
        if($nombre && $altura && $peso && $exp_base)
        {
            $sql = "INSERT INTO pokemon (pok_name, pok_height,pok_weight, pok_base_experience)
            VALUES ('$nombre', '$altura', '$peso', '$exp_base')";
            $res = mysqli_query($conexion, $sql);
            $id = mysqli_insert_id($conexion);
            $sql2 = "INSERT INTO pokemon_types (pok_id, type_id) VALUES ('$id', '$tipo')";
            $res2 = mysqli_query($conexion, $sql2);
            if(!$res || !$res2)
            {
                echo "No se pudo insertar el pokemon";
                $respuesta = array("ok"=>false, "mensaje" => "No se pudo insertar el pokemon");
            } else{
                $respuesta = array("ok"=>true, "mensaje" => "Pokemon creado");
            }
        }else{
            if(!$nombre)
            {
                $respuesta = array("ok"=>false, "mensaje" => "No se especificó el nombre");
            }else if ( !$altura){
                $respuesta = array("ok"=>false, "mensaje" => "No se especificó la alutra");
            }else if ( !$peso){
                $respuesta = array("ok"=>false, "mensaje" => "No se especificó el peso");
            }else if ( !$exp_base){
                $respuesta = array("ok"=>false, "mensaje" => "No se especificó la experiencia base");
            }
        }
    }
    echo json_encode($respuesta)
?>                    