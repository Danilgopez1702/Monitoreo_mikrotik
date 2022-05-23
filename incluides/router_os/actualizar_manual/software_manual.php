<?php
//adjuntar conexion a base de datos
require("../../bd/conn/conexion.php");
//adjuntar api 
require('../routeros_api.class.php');

$API = new RouterosAPI();

$API->debug = true;


//conexiones a tablas de datos
$queryp = mysqli_query($conexion, "SELECT * FROM principal WHERE manual = '1'");
$p = mysqli_num_rows($queryp);


if ($p > 0) {
    while ($data = mysqli_fetch_assoc($queryp)) {
        $version = $data['version'];
        var_dump($version);
        //conexiones a tablas de datos
        $queryc = mysqli_query($conexion, "SELECT * FROM pass WHERE tipo = 2");
        $c = mysqli_fetch_assoc($queryc);
  //Guardar usuario y pass mk
        $user = $c['user'];
        $pass = $c['pass'];

  //Guardar ip de mk
        $ip_mk = $data['ip_mk'];
        
  //Conexion al mk
        if ($API->connect($ip_mk, $user, $pass)) {
              //Comando mandado al mk
        
            if(stristr($version, 'actualizar')){ 
                //Comando mandado al mk
                $API->write('/system/package/update/download');     
                //Leer la respuesta del mk  
                    $READ = $API->read(false);
                //Guardar la respuesta en un array
                    $ARRAY = $API->parseResponse($READ);
                //Imprimir array de manera mas visual
                //Imprimir array de manera mas visual
                echo('<pre>');
                print_r($ARRAY);
                echo('</pre>');
                ?>
                <!--<meta http-equiv="refresh" content="1; url=reiniciar_manual.php">-->
                <?php                
            }
        }
    //Se desconecta del mk
        $API->disconnect();
    }
}
