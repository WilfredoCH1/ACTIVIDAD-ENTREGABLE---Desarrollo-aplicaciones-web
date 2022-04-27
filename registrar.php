<?php 
    print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtApellido"]) || empty($_POST["txtDNI"]) || empty($_POST["txtSeguros"]) || empty($_POST["txtCorreo"]) || empty($_POST["txtCelular"])){

       header('Location: index.php?mensaje=falta');
       exit();

    }

    include_once 'model/conexion.php';
    $nombre =$_POST["txtNombre"];
    $apellido =$_POST["txtApellido"];
    $Dni =$_POST["txtDNI"];
    $seguro =$_POST["txtSeguros"];
    $correo =$_POST["txtCorreo"];
    $celular =$_POST["txtCelular"];

    $sentencia =$bd->prepare("INSERT INTO registro(Nombre, Apellido, DNI, Numero_seguro, Correo_Electronico, Numero_Telefono) VALUES (?,?,?,?,?,?)");
    $resultado =$sentencia->execute([$nombre,$apellido,$Dni,$seguro,$correo,$celular]);

    if ($resultado === TRUE) {
        header('location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
        
    }
    



?>