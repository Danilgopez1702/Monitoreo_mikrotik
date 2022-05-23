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
                                    $API->write('/ip/address/print');       
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
                                                $nombre = $p1['name'];
                                                //echo($com);
                                                //echo (' ');
                                                $ip = $p1['address'];
                                                //echo($vel);
                                                //echo("<br />");
                                                $network = $p1['network'];
                                                //echo($vel);
                                                //echo("<br />");ww
                                                $type = $p1['interface'];
                                                //echo($vel);
                                                //echo("<br />");ww
                                                $eoip = "eoip";
                                                $LoopBack = "LoopBack";
                                                $sfp = "sfp";
                                                $vlan = "vlan";
                                                $ether = "ether";
                                                $eoip_vlan = "eoip-vlan";
                                                $queryr = mysqli_query($conexion, "SELECT * FROM ip");
                                                $r = mysqli_fetch_assoc($queryr);
                                                $ip_ver = $r['ip'];
                                                var_dump ($ip_ver);
                                          //Subida a bd
                                                      if(stristr($type, 'eoip-vlan')){
                                                            $sql_temp = mysqli_query($conexion, "INSERT INTO `ip`(`ip_mk`, `nombre`,`ip`,`network`,`interface`,`tipo`) 
                                                                  VALUES ('$ip_mk','$nombre','$ip','$network','$type','$eoip_vlan')");
                                                            $sql_tempo = mysqli_query($conexion, "INSERT INTO `principal`(`ip_mk`, `tipo`)
                                                                  VALUES ('$ip_mk','2')");
                                                      }else if(stristr($type, 'LoopBack')){
                                                            $sql_temp = mysqli_query($conexion, "INSERT INTO `ip`(`ip_mk`, `nombre`,`ip`,`network`,`interface`,`tipo`) 
                                                                  VALUES ('$ip_mk','$nombre','$ip','$network','$type','$LoopBack')");
                                                      }else if(stristr($type, 'sfp')){
                                                            $sql_temp = mysqli_query($conexion, "INSERT INTO `ip`(`ip_mk`, `nombre`,`ip`,`network`,`interface`,`tipo`) 
                                                                  VALUES ('$ip_mk','$nombre','$ip','$network','$type','$sfp')");
                                                      }else if(stristr($type, 'ether')){
                                                            $sql_temp = mysqli_query($conexion, "INSERT INTO `ip`(`ip_mk`, `nombre`,`ip`,`network`,`interface`,`tipo`) 
                                                                  VALUES ('$ip_mk','$nombre','$ip','$network','$type','$ether')");
                                                                                     
                                                      }else if(stristr($type, 'vlan')){
                                                            $sql_temp = mysqli_query($conexion, "INSERT INTO `ip`(`ip_mk`, `nombre`,`ip`,`network`,`interface`,`tipo`) 
                                                                  VALUES ('$ip_mk','$nombre','$ip','$network','$type','$vlan')");
      
                                                      }else if(stristr($type, 'eoip')){
                                                            $sql_temp = mysqli_query($conexion, "INSERT INTO `ip`(`ip_mk`, `nombre`,`ip`,`network`,`interface`,`tipo`) 
                                                                  VALUES ('$ip_mk','$nombre','$ip','$network','$type','$eoip')");
                                                      }                             
                                    }
                        }
                  //Se desconecta del mk
                        $API->disconnect();
      }
}
?>
<meta http-equiv="refresh" content="1; url=ospf.php">