<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $data['id_p']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Editar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <div class="p-4 bg-light">
            <form action="../bd/modificar/mod_usuario.php" method="post">
              <div class="row">
                <div class="col-md-6">
                  <label class="form-label">Id</label>
                  <div class="input-group input-group-outline my-3">
                    <input type="tetx" class="form-control" id = "id" name = "id" value = "<?php echo $data['id_usuario']; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Nombre</label>
                  <div class="input-group input-group-outline my-3">
                    <input type="text" class="form-control" id = "nombre" name = "nombre" value = "<?php echo $data['nombre']; ?>">
                  </div>
                </div>            
                <div class="col-md-6">
                  <label class="form-label">Contraseña</label>
                  <div class="input-group input-group-outline my-3">
                    <input type="password" class="form-control" id = "pass" name = "pass" value = "<?php echo $data['pass']; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Confirmar contraseña</label>
                  <div class="input-group input-group-outline my-3">

                    <input type="password" class="form-control" id = "pass2" name = "pass2">
                  </div>
                </div>
                <div class="col-md-12">
                  <p>
                  <p>
                  <select class = "my-3 form-select" name = "rol" >
                    <option class = "form-label" id = "rol" value = "<?php echo $data['rol']; ?>" selected></option>
                    <option value = "45">Administrador</option>
                    <option value = "1">Usuario</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type = "submit" class="btn bg-gradient-primary">Registrar</button>
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $data['id_p']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Borrar Usuario</h4></center>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style = "background:black;">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">	
            	<p class="text-center">¿Esta seguro de Borrar el usuario de:</p>
				<h2 class="text-center"><?php echo $data['nombre']; ?>?</h2>
			</div>
            <div class="modal-footer">
            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <a href="../bd/eliminar/BorrarRegistro.php?id=<?php echo $data['id_p']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Si</a>
            </div>

        </div>
    </div>
</div>