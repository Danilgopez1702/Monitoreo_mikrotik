<?php 
  include_once "../header/header1.php"; 
  require("../bd/conn/conexion.php");
  $query1 = mysqli_query($conexion, "SELECT * FROM usuarios");
  $user = mysqli_num_rows($query1);
  $query2 = mysqli_query($conexion, "SELECT * FROM principal");
  $emple = mysqli_num_rows($query2);
  $query3 = mysqli_query($conexion, "SELECT * FROM ip WHERE interface LIKE 'vlan%'");
  $dep = mysqli_num_rows($query3);
?>
    <div class="align-middle ">
        <h3 class="card-title">Index</h3>
        <a href="../router_os/ip.php" type="button" class="btn bg-gradient-primary" ><span class="glyphicon glyphicon-plus"></span> Nuevo Escaneo</a>
    </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"></h4>
                    <div class="container-fluid py-4">
                      <div class="row">
                        <div class="col-xl-4 col-sm-8 mb-xl-0 mb-6">
                          <a href="usuarios.php">
                            <div class="card">
                              <div class="card-header p-3 pt-2">
                                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                  <i class="material-icons opacity-10">person</i>
                                </div>
                                <div class="text-end pt-1">
                                  <p class="text-sm mb-0 text-capitalize">Usuarios mk</p>
                                  <h4 class="mb-0"><?php echo $user; ?></h4>
                                </div>
                              </div>
                              <hr class="dark horizontal my-0">
                              <div class="card-footer p-3">
                                <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span></p>
                              </div>
                            </div>
                          </a>  
                        </div>
                        <div class="col-xl-4 col-sm-8 mb-xl-0 mb-6">
                          <a href="usuarios.php">
                            <div class="card">
                              <div class="card-header p-3 pt-2">
                                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                  <i class="material-icons opacity-10">router</i>
                                </div>
                                <div class="text-end pt-1">
                                  <p class="text-sm mb-0 text-capitalize">Mikrotik</p>
                                  <h4 class="mb-0"><?php echo $emple; ?></h4>
                                </div>
                              </div>
                              <hr class="dark horizontal my-0">
                              <div class="card-footer p-3">
                                <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span></p>
                              </div>
                            </div>
                          </a>
                        </div>
                        <div class="col-xl-4 col-sm-8 mb-xl-0 mb-6">
                          <a href="usuarios.php">
                            <div class="card">
                              <div class="card-header p-3 pt-2">
                                <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                  <i class="material-icons opacity-10">person</i>
                                </div>
                                <div class="text-end pt-1">
                                  <p class="text-sm mb-0 text-capitalize">Vlan's</p>
                                  <h4 class="mb-0"><?php echo $dep; ?></h4>
                                </div>
                              </div>
                              <hr class="dark horizontal my-0">
                              <div class="card-footer p-3">
                                <p class="mb-0"><span class="text-danger text-sm font-weight-bolder"> </span> </p>
                              </div>
                            </div>
                          </a>
                        </div>
                    </div>
<?php
 
  include_once "../header/header2.php"; 
?>
<script>
    
  holi = document.getElementById('inicio');
  holi.classList += " active bg-gradient-primary";
  document.getElementById("cabecera").innerHTML = "DASHBOARD";
</script>