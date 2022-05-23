<?php
//adjuntar conexion a base de datos
require("../../bd/conn/conexion.php");

    //conexiones a tablas de datos
        $delete = mysqli_query($conexion, "DELETE FROM `cotejo_sfp`");
        $queryp = mysqli_query($conexion, "SELECT * FROM `puerto` WHERE `puerto` like '%sfp%' ");
        $p = mysqli_num_rows($queryp); 

        if ($p > 0) {
            while ($data = mysqli_fetch_assoc($queryp)) {
                $ip_mk = $data['ip_mk'];
                $nombre = $data['nombre_mk'];
                $tx = $data['tx_sfp'];
                $rx = $data['rx_sfp'];
                $com = $data['comentario'];

                $dif = abs($tx - $rx);
                echo $dif;

                    $sql_temp = mysqli_query($conexion, "INSERT INTO `cotejo_sfp`(`ip1`, `mk_s`, `fibra_s`, `tx_s`, `rx_s`, `dif`)
                        VALUES ('$ip_mk','$nombre','$com','$tx','$rx',$dif)");
                    var_dump($com,$sql_temp);

            }
        }

?>



