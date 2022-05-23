<?php 
  include_once "../header/header1.php"; 
  require("../bd/conn/conexion.php");

?>
    <div class="align-middle ">
        <h3 class="card-title">Vlan</h3>
        <a href="../router_os/ip.php" type="button" class="btn bg-gradient-primary" ><span class="glyphicon glyphicon-plus"></span> Nuevo Escaneo</a>
    </div>
    <div class="card">
    <div class="table-responsive">
        <table class="table align-items-center mb-0">
                                <thead class="text-warning">
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Tipo de usuario</th>
                                <th>Acciones</th>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = mysqli_query($conexion, "SELECT * FROM usuarios ORDER BY id_usuario");
                                        $result = mysqli_num_rows($query);
                                        if ($result > 0) {
                                            while ($data = mysqli_fetch_assoc($query)) { ?>
                                                <tr>
                                                <td><?php echo $data['id_usuario']; ?></td>
                                                <td><?php echo $data['nombre']; ?></td>
                                                <td>
                                                    <?php
                                                    if($data['rol'] == 45){
                                                        echo "Administrador";
                                                    }else{
                                                        echo "Usuario";
                                                    }
                                                    ?>
                                            
                                                </td>
                                                <td >
                                                    <?php include('../modal/BorrarEditarModal.php');?>
                                                    <a type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#edit_<?php echo $data['id_usuario']; ?>"><span class="glyphicon glyphicon-plus"></span> Editar</a>
                                                    <a type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#delete_<?php echo $data['id_usuario']; ?>"><span class="glyphicon glyphicon-trash"></span> Borrar</a>
						                        </td>
                                            </tr>
                                        <?php
                                            }
                                        } 
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <!-- Finaliza la Tabla -->    
            </div>
 
<?php
    
    include('../modal/Agregar_usuario.php');
    include_once "../header/header2.php"; 
?>
<script>
    src="js/jquery.min.js">
    document.getElementById('segundo').classList += " active bg-gradient-primary";
    document.getElementById("cabecera").innerHTML = "USUARIOS";

</script>