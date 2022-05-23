<?php
//adjuntar conexion a base de datos
require("../bd/conn/conexion.php");
//adjuntar api 
require('routeros_api.class.php');

$quer = mysqli_query($conexion, "DELETE FROM `ospf`");
$API = new RouterosAPI();

$API->debug = true;


//conexiones a tablas de datos
$queryp = mysqli_query($conexion, "SELECT * FROM principal");
$p = mysqli_num_rows($queryp);

//Ciclo 
if ($p > 0) {
   while ($data = mysqli_fetch_assoc($queryp)) {

            //Definir el usuario de acceso
            if($data['tipo'] == 2){
                  //conexiones a tablas de datos
                        $queryc = mysqli_query($conexion, "SELECT * FROM pass WHERE tipo = 2");
                        $c = mysqli_fetch_assoc($queryc);
                  //Guardar usuario y pass mk
                        $user = $c['user'];
                        $pass = $c['pass'];
            }else{
                  //conexiones a tablas de datos
                        $queryc = mysqli_query($conexion, "SELECT * FROM pass WHERE tipo = 1");
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
                  $API->write('/routing/ospf/interface/print');     
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
                        $interface = $p1['interface'];
                        //echo($com);
                        //echo (' ');
                        $cost = $p1['cost'];
                        //echo($com);
                        //echo (' ');
                        $priority = $p1['priority'];
                        //echo($vel);
                        //echo("<br />");
                        $state = $p1['state'];
                        //echo($vel);
                        //echo("<br />");
                        $instance = $p1['instance'];
                        //echo($vel);
                        //echo("<br />");
                        $address = $p1['ip-address'];
                        //echo($vel);
                        //echo("<br />");
                        $sql_temp = mysqli_query($conexion, "INSERT INTO `ospf`( `ip_mk`, `interface`, `costo`, `prioridad`, `estado`, `instancia`, `ip_ospf`) 
                        VALUES ('$ip_mk','$interface','$cost','$priority','$state','$instance','$address')");
                        var_dump($sql_temp);
                  }
            //Se desconecta del mk
                  $API->disconnect();
                  }
            }

}

?>
<meta http-equiv="refresh" content="1; url=link_down.php">



