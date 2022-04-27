<?php include 'template/header.php' ?>

<?php 
    if(!isset($_GET['ID'])){
        header('Location: index.php?mensaje=error');
        exit();

    }
    include_once 'model/conexion.php';
    $id= $_GET["ID"];

    $sentencia =$bd->prepare("SELECT * FROM registro WHERE ID=?;");
    $sentencia->execute([$id]);
    $persona =$sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar Datos
                </div>

                <form action="editarProceso.php" class="p-3" method="POST">

                    <div class="mb-4">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required value="<?php echo $persona->Nombre;?>"> <!--values = la variable y nombre que esta en la tabla servidor que se quiere aparcer -->
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Apellido: </label>
                        <input type="text" class="form-control" name="txtApellido" autofocus required value="<?php echo $persona->Apellido;?>">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">DNI: </label>
                        <input type="number" class="form-control" name="txtDNI" autofocus required value="<?php echo $persona->DNI;?>">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Numero Seguro: </label>
                        <input type="text" class="form-control" name="txtSeguros" autofocus required value="<?php echo $persona->Numero_seguro;?>" >
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Correo Electronico: </label>
                        <input type="text" class="form-control" name="txtCorreo" autofocus required value="<?php echo $persona->Correo_Electronico;?>">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Numero Celular: </label>
                        <input type="number" class="form-control" name="txtCelular" autofocus required value="<?php echo $persona->Numero_Telefono;?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id_es" value="<?php echo $persona->ID;?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>