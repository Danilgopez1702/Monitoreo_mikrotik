<?php 
  include_once "../header/header1.php"; 
  require("../bd/conn/conexion.php");

?>

<div class="align-middle ">
        <h3 class="card-title">Fibra Optica</h3>
        <a href="../router_os/monitoreo/sfp.php" type="button" class="btn bg-gradient-primary" ><span class="glyphicon glyphicon-plus"></span> Nuevo Escaneo</a>
    </div>
    <div class="container-fluid py-4">
        <div class="row">    
            <?php
                $query = mysqli_query($conexion, "SELECT * FROM cotejo_sfp ");
                $result = mysqli_num_rows($query);
                if ($result > 0) {
                    while ($data = mysqli_fetch_assoc($query)) {  
                    $tx = $data['tx_s'];
                    $rx = $data['rx_s'];
                        if($tx != NULL){?>
                            <div class="col-xl-5 col-sm-8 mb-xl-2 mb-6">
                                <div class="card">
                                    <div class="card-header" style="background: #4BB545;">
                                        <font color="white">
                                            <div class="text-center">
                                                <h4 class="card-title"><?php echo $data['fibra_s'] ?></h4>
                                            </div>
                                            <hr style=" background: black;">
                                            <div class="text-start">
                                                <h6 class="card-text">Tx: <?php echo $data['tx_s'] ?></h6>
                                                <h6 class="card-text">Rx: <?php echo $data['rx_s'] ?></h6>
                                            </div>
                                        </font>
                                    </div>
                                    <div class="card-footer p-3" style="background: #4BB545;">
                                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span></p>
                                    </div>
                                </div>
                            </div>
                            <br>
                        <?php               
                        }else if($rx > '-10'){?>
                            <div class="col-xl-6 col-sm-8 mb-xl-2 mb-6">
                                <div class="card">
                                    <div class="card-header" style="background: #FFF99;">
                                        <font color="white">
                                            <div class="text-center">
                                                <h4 class="card-title"><?php echo $data['fibra_s'] ?></h4>
                                            </div>
                                            <hr style=" background: black;">
                                            <div class="text-start" style="background: #FFF99;">
                                                <h6 class="card-text">Tx: <?php echo $data['tx_s'] ?></h6>
                                                <h6 class="card-text">Rx: <?php echo $data['rx_s'] ?></h6>
                                            </div>
                                        </font>
                                    </div>
                                    <div class="card-footer p-3">
                                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span></p>
                                    </div>
                                </div>
                            </div>
                            <br>
                        <?php
                        }else{?>
                            <div class="col-xl-5 col-sm-8 mb-xl-2 mb-6">
                                <div class="card">
                                    <div class="card-header" style="background: #FF4545;>
                                        <font color="white">
                                            <div class="text-center">
                                                <h4 class="card-title"><?php echo $data['fibra_s'] ?></h4>
                                            </div>
                                            <hr style=" background: black;">
                                            <div class="text-start">
                                                <h6 class="card-text">Tx: <?php echo $data['tx_s'] ?></h6>
                                                <h6 class="card-text">Rx: <?php echo $data['rx_s'] ?></h6>
                                            </div>
                                        </font>
                                    </div>
                                    <div class="card-footer p-3" style="background: #FF4545;>
                                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span></p>
                                    </div>
                                </div>
                            </div>
                            <br>
                        <?php
                        } 
                    }
                    }
        
                ?>
        </div>
    </div>

<?php
    
    include('../modal/Agregar_mk.php');
    include_once "../header/header2.php"; 
?>
<script>
    src="js/jquery.min.js">
    document.getElementById('segundo').classList += " active bg-gradient-primary";
    document.getElementById("cabecera").innerHTML = "USUARIOS";
</script>