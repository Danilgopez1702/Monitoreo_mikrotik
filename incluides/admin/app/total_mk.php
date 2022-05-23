<?php

require_once 'conexion.php';

$salida = "";
$sql = "SELECT * FROM principal";
$query = $pdo->prepare($sql);
$query->execute();


      $salida .= 
      '<table class="table align-items-center mb-0">
      <thead>
          <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Id Mikrotik</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Nombre</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Ip del Mikrotik</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Puertos Usados</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Tipo</th>
          </tr>
      </thead>
      <tbody>';
      if($resultado = $query->rowCount() > 0) {
        while($data = $query->fetch(PDO::FETCH_ASSOC)) {
          if($data['tipo']  == 0){
            $tipo = "Vergas"; 
          }else if($data['tipo']  == 1){
            $tipo = "Principal"; 
          }else if($data['tipo']  == 2){
            $tipo = "Normal"; 
          }else{
            $tipo = "Switch";
          } 
          $salida .='<tr>
                      <td>
                          <div class="d-flex  py-1">
                              <div class="d-flex flex-column justify-content-center">
                                  <a class="mb-0 text-xs">'.$data['id_p'].'</a>
                              </div>
                          </div>
                      </td>
                      <td>
                          <p class="text-xs font-weight-bold mb-0">'.$data['nombre'].'</p>
                      </td>
                      <td>
                          <p class="text-xs font-weight-bold mb-0">'.$data['ip_mk'].'</p>
                      </td>
                      <td>
                          <p class="text-xs font-weight-bold mb-0">'.$data['puertos'].'</p>
                      </td>
                      <td>
                          <p class="text-xs font-weight-bold mb-0">'.$tipo.'</p>
                      </td>
                      </tr>';
      }
  
      $salida.="</tbody></table>";
  
  }
  echo $salida;