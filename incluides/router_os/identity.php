<?php
//adjuntar conexion a base de datos
require("../bd/conn/conexion.php");
//adjuntar api 
require('routeros_api.class.php');

$API = new RouterosAPI();

$API->debug = true;


//conexiones a tablas de datos
$queryp = mysqli_query($conexion, "SELECT * FROM principal");
$p = mysqli_num_rows($queryp);

//Ciclo 
if ($p > 0) {
   while ($data = mysqli_fetch_assoc($queryp)) {

            //Definir el usuario de acceso
            if($data['tipo'] == 0){
                  //conexiones a tablas de datos
                        $queryc = mysqli_query($conexion, "SELECT * FROM pass WHERE tipo = 0");
                        $c = mysqli_fetch_assoc($queryc);
                  //Guardar usuario y pass mk
                        $user = $c['user'];
                        $pass = $c['pass'];
            }else if($data['tipo'] == 1){
                  //conexiones a tablas de datos
                        $queryc = mysqli_query($conexion, "SELECT * FROM pass WHERE tipo = 1");
                        $c = mysqli_fetch_assoc($queryc);
                  //Guardar usuario y pass mk
                        $user = $c['user'];
                        $pass = $c['pass'];
            }else{
                    //conexiones a tablas de datos
                        $queryc = mysqli_query($conexion, "SELECT * FROM pass WHERE tipo = 2");
                        $c = mysqli_fetch_assoc($queryc);
                    //Guardar usuario y pass mk
                        $user = $c['user'];
                        $pass = $c['pass'];
            }
      
      
//Guardar ip de mk
   $ip_mk = $data['ip_mk'];
 
//Conexion al mk
      if ($API->connect($ip_mk, $user, $pass)) {
//Comando mandado al mk
      $API->write('/system/identity/print');     
//Leer la respuesta del mk  
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
            $name = $p1['name'];
            //echo($com);
            //echo (' ');

            $sql_temp = mysqli_query($conexion, "UPDATE `principal` SET `nombre`='$name' WHERE ip_mk = '$ip_mk'");
            var_dump($sql_temp);

            $sql_t = mysqli_query($conexion, "UPDATE `puerto` SET `nombre_mk`='$name' WHERE ip_mk = '$ip_mk'");
            var_dump($sql_temp);
      }
//Se desconecta del mk
      $API->disconnect();
      }
   }
}
$queryX = mysqli_query($conexion, "DELETE from principal where `nombre` is null");
?> 
<meta http-equiv="refresh" content="1; url=puertos.php">





