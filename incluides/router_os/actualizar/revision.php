<?php
//adjuntar conexion a base de datos
require("../../bd/conn/conexion.php");

//conexiones a tablas de datos
$queryp = mysqli_query($conexion, "SELECT * FROM principal");
$p = mysqli_num_rows($queryp);


if ($p > 0) {
    while ($data = mysqli_fetch_assoc($queryp)) {
    
        $version = $data['version'];
        var_dump($version);

        if($version == "actualizar"){             
            ?>
                <meta http-equiv="refresh" content="1; url=software.php">
            <?php
        }else{
            ?>
                <meta http-equiv="refresh" content="1; url=../../admin/actualizar.php">
            <?php
        }

var_dump($version);
    }
}
