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

//Ciclo 
if ($p > 0) {
      while ($data = mysqli_fetch_assoc($queryp)) {

                  if($data['tipo'] == 2 ){
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
                                          $API->write('/system/package/update/check-for-updates');     
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
                                                $p1 = $y;   
                                                //Extraccion de datos del array                                                                    
                                                $status = $p1['status'];
                                                $instalada = $p1['installed-version'];
                                                $actualizar = "actualizar";
                                                echo($status);
                                                echo (' ');
                                                if(stristr($status, 'New')){ 
                                                      $sql_ver = mysqli_query($conexion, "UPDATE `principal` SET `version`= '$actualizar' WHERE ip_mk = '$ip_mk'");

                                                }else if(stristr($status, 'ERROR')){ 
                                                      $sql_ver = mysqli_query($conexion, "UPDATE `principal` SET `version`= '$status' WHERE ip_mk = '$ip_mk'");

                                                }else{
                                                      $sql_ver = mysqli_query($conexion, "UPDATE `principal` SET `version`= '$instalada' WHERE ip_mk = '$ip_mk'");
                                                      var_dump($sql_ver);  

                                                }
                                                
                                          }
                        //Se desconecta del mk
                              $API->disconnect();
                              }
                  }
      }
}
?>
<meta http-equiv="refresh" content="1; url=reiniciar_manual.php">