<?php

require_once 'conexion.php';

$salida = "";
$sql = "SELECT * FROM ip WHERE tipo = 'vlan' or tipo = 'eoip-vlan' ORDER BY ip";
$query = $pdo->prepare($sql);
$query->execute();


      $salida .= 
      '<table class="table align-items-center mb-0">
      <thead>
          <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Id Mikrotik</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Nombre del Mikrotik</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Ip registrada en el Mikrotik</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Network registrado en el Mikrotik</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Interfaz Asignada</th>
          </tr>
      </thead>
      <tbody>';
      if($resultado = $query->rowCount() > 0) {
        while($data = $query->fetch(PDO::FETCH_ASSOC)) {
          $salida .='<tr>
                      <td>
                          <div class="d-flex  py-1">
                              <div class="d-flex flex-column justify-content-center">
                                  <a class="mb-0 text-xs">'.$data['ip_mk'].'</a>
                              </div>
                          </div>
                      </td>
                      <td>
                          <p class="text-xs font-weight-bold mb-0">'.$data['nombre'].'</p>
                      </td>
                      <td>
                          <p class="text-xs font-weight-bold mb-0">'.$data['ip'].'</p>
                      </td>
                      <td>
                          <p class="text-xs font-weight-bold mb-0">'.$data['network'].'</p>
                      </td>
                      <td>
                          <p class="text-xs font-weight-bold mb-0">'.$data['interface'].'</p>
                      </td>
                      </tr>';
      }
  
      $salida.="</tbody></table>";
  
  }
  echo $salida;