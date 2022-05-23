<!-- Agregar Nuevos Registros -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Agregar Usuario</h4></center>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style = "background:black;">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="p-4 bg-light">
                <form action="../bd/subir/mk.php" method="post">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="input-group input-group-outline my-3">
                        <label class="form-label">Nombre</label>
                        <input type="tetx" class="form-control" id = "nombre" name = "nombre">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-group input-group-outline my-3">
                        <label class="form-label">Ip</label>
                        <input type="text" class="form-control" id = "ip" name = "ip">
                      </div>
                    </div>            
                    <div class="col-md-12">
                      <p>
                      <p>
                      <select class = "my-3 form-select" name = "rol" >
                        <option class = "form-label" id = "rol" selected>Selecciona el tipo de Mk</option>
                        <option value = "0">Vergas</option>
                        <option value = "1">Principal</option>
                        <option value = "2">Normal</option>
                        <option value = "3">Switch</option>
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
