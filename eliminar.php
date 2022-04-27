<?php

    if(!isset($_GET['ID'])){
        header('Location: index.php?mensaje=error');
        exit();


    }

    include 'model/conexion.php';
    $id_es = $_GET['ID'];

    $sentencia = $bd->prepare("DELETE FROM registro WHERE ID=?");
    $resultado =$sentencia->execute([$id_es]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }
    

?>