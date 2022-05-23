<?php

require_once 'conexion.php';

$salida = "";

if(!empty($_POST['consulta'])) {
    $consulta = filter_var($_POST['consulta']) ;
    $sql = "SELECT * FROM puerto WHERE comentario LIKE '%".$consulta."%' OR ip_mk LIKE '%".$consulta."%' OR puerto LIKE '%".$consulta."%' 
    OR velocidad LIKE '%".$consulta."%' OR link_down LIKE '%".$consulta."%' OR last LIKE '%".$consulta."%'";
    $query = $pdo->prepare($sql);
    $query->execute();
}

if($resultado = $query->rowCount() > 0) {
  while($fila = $query->fetch(PDO::FETCH_ASSOC)) {
    $salida .= 
    '<div class="col-xl-5 col-sm-8 mb-xl-2 mb-6">
    <div class="card">
        <div class="card-header" style="background: #4BB545;">
            <font color="white">
                <div class="text-center">
                  <h4 class="card-title"> '. $fila['comentario'].'</h4>
                </div>
                <hr style=" background: black;">
                <div class="text-start">
                  <h6 class="card-text">Ip: '. $fila['ip_mk'].'</h6>
                  <h6 class="card-text">Tx: '. $fila['puerto'].'</h6>
                  <h6 class="card-text">Rx: '. $fila['velocidad'].'</h6>
                  <h6 class="card-text">Link-Downs: '. $fila['link_down'].'</h6>
                  <h6 class="card-text">Ultimo Link-down: '. $fila['last'].'</h6>
                </div>
              </font>
            </div>
            <div class="card-footer p-3" style="background: #4BB545;">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  <br>';
    }

    $salida.="</tbody></table>";

}
echo $salida;