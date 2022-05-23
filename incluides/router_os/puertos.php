<?php
//adjuntar conexion a base de datos
require("../bd/conn/conexion.php");
//adjuntar api 
require('routeros_api.class.php');

$quer = mysqli_query($conexion, "DELETE FROM `puerto`");
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
            }else if($data['ip_mk'] == '10.200.200.6'){
                  //conexiones a tablas de datos
                        $queryc = mysqli_query($conexion, "SELECT * FROM pass WHERE tipo = 1");
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
   $ip = $data['ip_mk'];
   $name = $data['nombre'];
   $tipo = $data['tipo'];

   
//Conexion al mk
      if ($API->connect($ip, $user, $pass)) {
            //Comando mandado al mk
                  $API->write('/interface/ethernet/print');
            //Leer la respuesta del mk  
                  $READ = $API->read(false);
            //Guardar la respuesta en un array
                  $ARRAY = $API->parseResponse($READ);
            //Imprimir array de manera mas visual
                  echo('<pre>');
                  print_r($ARRAY);
                  echo('</pre>');
            //Contador para array    
                  $x = 0;
            //Ciclo para extraer del array
            foreach ($ARRAY as $y) {
                  //Se declara el contador
                        $p1 = $y;
            //Comprobar si existe el valor en el array
                  if(isset($p1['comment'])){
            //Extraccion de datos del array
                        $ether = $p1['name'];
                        //echo ($ether);
                        //echo (' ');
                        $com = $p1['comment'];
                        //echo($com);
                        //echo (' ');
                        $vel = $p1['speed'];
                        //echo($vel);
                        //echo("<br />");
                        $sql_temp = mysqli_query($conexion, "INSERT INTO puerto (ip_mk,nombre_mk, puerto, comentario, velocidad,tipo) 
                        VALUES ('$ip','$name','$ether','$com', '$vel', '$vel')");

                        $x = $x+1;
                        

                  }        
            }
            echo $x;
            $sql_tempo = mysqli_query($conexion, "UPDATE `principal` SET `puertos`='$x' WHERE `ip_mk` = '$ip'");
            var_dump($ip);
            //Se desconecta del mk
            $API->disconnect();
      }
   }
}
?> 
<meta http-equiv="refresh" content="1; url=ip.php">