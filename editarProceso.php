<?php 
     print_r($_POST);
     if (!isset($_POST['id_es'])){
         header('Location: index.php?mensaje=error');
         
     }

     include 'model/conexion.php';
     $id = $_POST['id_es'];

     $nombre = $_POST['txtNombre'];
     $apellido = $_POST['txtApellido'];
     $DNI = $_POST['txtDNI'];
     $seguro = $_POST['txtSeguros'];
     $correo = $_POST['txtCorreo'];
     $celular = $_POST['txtCelular'];

     $sentencia =$bd->prepare("UPDATE registro SET Nombre = ?, Apellido = ?, DNI = ?, Numero_seguro = ?, Correo_Electronico = ? , Numero_Telefono = ? WHERE ID=?");
     $resultado =$sentencia->execute([$nombre, $apellido, $DNI, $seguro, $correo,$celular,$id]);

     if ($resultado === TRUE) {
         header('Location: index.php?mensaje=editado');
     } else {
        header('Location: index.php?mensaje=error');
        exit();
     }
     


?>