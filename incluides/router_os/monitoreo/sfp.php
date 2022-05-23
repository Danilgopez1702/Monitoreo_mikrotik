<?php
//adjuntar conexion a base de datos
require("../../bd/conn/conexion.php");
//adjuntar api 
require('../routeros_api.class.php');

$API = new RouterosAPI();

$API->debug = true;


//conexiones a tablas de datos
$queryp = mysqli_query($conexion, "SELECT * FROM `puerto` WHERE `puerto` like '%sfp%'");
$p = mysqli_num_rows($queryp);


if ($p > 0) {
    while ($data = mysqli_fetch_assoc($queryp)) {
                    //Definir el usuario de acceso
                    if($data['tipo'] == 1){
                        //conexiones a tablas de datos
                              $queryc = mysqli_query($conexion, "SELECT * FROM pass WHERE tipo = 1");
                              $c = mysqli_fetch_assoc($queryc);
                        //Guardar usuario y pass mk
                              $user = $c['user'];
                              $pass = $c['pass'];
                  }elseif($data['tipo'] == 2){
                        //conexiones a tablas de datos
                              $queryc = mysqli_query($conexion, "SELECT * FROM pass WHERE tipo = 2");
                              $c = mysqli_fetch_assoc($queryc);
                        //Guardar usuario y pass mk
                              $user = $c['user'];
                              $pass = $c['pass'];
                  }elseif($data['tipo'] == 3){
                      //conexiones a tablas de datos
                      $queryc = mysqli_query($conexion, "SELECT * FROM pass WHERE tipo = 2");
                      $c = mysqli_fetch_assoc($queryc);
                //Guardar usuario y pass mk
                      $user = $c['user'];
                      $pass = $c['pass'];
                  }
                    //Guardar ip de mk
            $ip_mk = $data['ip_mk'];
            $valores = $data['puerto'];
            $comm = $data['comentario'];
            
        //Conexion al mk
        if ($API->connect($ip_mk, $user, $pass)) {

            $API->write("/interface/ethernet/monitor",false);
            $API->write("=numbers=".$valores,false);  
            $API->write("=once=",true);
            $READ = $API->read(false);
             //Guardar la respuesta en un array
             $ARRAY = $API->parseResponse($READ);
            
                    //Imprimir array de manera mas visual
                        echo('<pre>');
                        print_r($ARRAY);
                        echo('</pre>');

                    //Ciclo para extraer del array
                        foreach ($ARRAY as $y) {
                    //Se declara el contador
                        $p1 = $y;
                    //Extraccion de datos del array
                            $status = $p1['status'];
                            //echo($com);
                            //echo (' ');
                            $name = $p1['name'];
                            //echo($com);
                            //echo (' ');
                            $tx = $p1['sfp-tx-power'];
                            //echo($com);
                            //echo (' ');
                            $rx = $p1['sfp-rx-power'];
                            //echo($com);
                            //echo (' ');
                            if($status = "link-ok"){
                                $sql_temp = mysqli_query($conexion, "UPDATE `puerto` SET `tx_sfp`='$tx', `rx_sfp`='$rx',`link`= 'si' WHERE `comentario` = '$comm' " );
                                var_dump($sql_temp);
                            }else{
                                $sql_temp = mysqli_query($conexion, "UPDATE `puerto` SET `tx_sfp`='$tx', `rx_sfp`='$rx',`link`= 'no' WHERE `comentario` = '$comm' " );
                                var_dump($sql_temp);
                            }
                        }
            }
      
    
        //Se desconecta del mk
            $API->disconnect();
    }
}
?>
<meta http-equiv="refresh" content="1; url=cotejo.php">