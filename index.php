<?php include 'template/header.php' ?>

<?php 
include_once "model/conexion.php";
$sentencia = $bd-> query("SELECT * FROM registro");
$persona = $sentencia->fetchAll(PDO::FETCH_OBJ);

//print_r($persona);
?>
<div class="container mt-5">
    <div class="row justify-content-center">

        <div class="col-md-5">

        <!--Inicio alerta -->
        <?php 
            if(isset($_GET['mensaje']) and $_GET['mensaje'] =='falta'){
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Rellena  todo los campos.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        }
        ?>


        <?php 
            if(isset($_GET['mensaje']) and $_GET['mensaje'] =='registrado'){
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Registrado!</strong> Registro Exitoso.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        }
        ?>


        <?php 
            if(isset($_GET['mensaje']) and $_GET['mensaje'] =='error'){
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Vuelve a intentar.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        }
        ?>

        <?php 
            if(isset($_GET['mensaje']) and $_GET['mensaje'] =='editado'){
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Cambiado!</strong> Los datos fueron Actualizado.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        }
        ?>


        <?php 
            if(isset($_GET['mensaje']) and $_GET['mensaje'] =='eliminado'){
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Eliminado!</strong> Los datos fueron Borrados.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        }
        ?>



        <!--Fin alerta -->
            <div class="card">
                <div class="card-header">
                    Ingresar Datos
                </div>

                <form action="registrar.php" class="p-3" method="POST">

                    <div class="mb-4">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Apellido: </label>
                        <input type="text" class="form-control" name="txtApellido" autofocus required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">DNI: </label>
                        <input type="number" class="form-control" name="txtDNI" autofocus required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Numero Seguro: </label>
                        <input type="text" class="form-control" name="txtSeguros" autofocus required >
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Correo Electronico: </label>
                        <input type="text" class="form-control" name="txtCorreo" autofocus required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Numero Celular: </label>
                        <input type="number" class="form-control" name="txtCelular" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>

                </form>
            </div>
        </div>

        <div class="col-md-15 mt-4">
            <div class="card">
                <div class="card-header">
                    Lista de Pacientes

                </div>
                <div class="p-4">
                    <table class="table table-striped table-hover aling-middle">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">DNI</th>
                                <th scope="col">Numero seguro</th>
                                <th scope="col">Correo Electronico</th>
                                <th scope="col">Numero Celular</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($persona as $dato){


                                
                            
                            ?>
                            <tr>
                                <td scope="row"><?php echo $dato->ID; ?></td>
                                <td><?php echo $dato->Nombre; ?></td>
                                <td><?php echo $dato->Apellido; ?></td>
                                <td><?php echo $dato->DNI; ?></td>
                                <td><?php echo $dato->Numero_seguro; ?></td>
                                <td><?php echo $dato->Correo_Electronico; ?></td>
                                <td><?php echo $dato->Numero_Telefono; ?></td>
                                <td ><a class="text-success" href="editar.php?ID=<?php echo $dato->ID; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td ><a onclick="return confirm('Estas seguro de eliminar');" class="text-danger" href="eliminar.php?ID=<?php echo $dato->ID; ?>"><i class="bi bi-trash"></i></a></td>
                                
                                
                            </tr>
                            <?php 
                                }
                            ?>




                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>