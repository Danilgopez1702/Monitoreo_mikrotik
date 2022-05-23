<?php 
  include_once "../header/header1.php"; 
  require("../bd/conn/conexion.php");

?>
    <div class="align-middle ">
        <div class="rounded float-end">
            <div class="col-md-8 my-3">
                <form class="container-fluid py-4">
                    <input type="search" id="busqueda" name="busqueda" style = "border-radius: 5px;" placeholder="Search">
                </form>
            </div>
        </div>
        <h3 class="card-title">Puertos mikrotik</h3>
        <a href="../router_os/mk.php" type="button" class="btn bg-gradient-primary" ><span class="glyphicon glyphicon-plus"></span> Nuevo Escaneo</a>
    </div>
    <div class="container-fluid py-4">
        <div class = "row" id="datos">

        </div>
    </div>

   

    <script src="js/buscar_puertos.js"></script>
</body>
</html>