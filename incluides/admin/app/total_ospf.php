<?php

require_once 'conexion.php';

$salida = "";
$sql = "SELECT * FROM ospf ORDER BY id_ospf";
$query = $pdo->prepare($sql);
$query->execute();


$salida .= 
'<table class="table align-items-center mb-0">
<thead>
    <tr>
    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Id Mikrotik</th>
    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Nombre del Mikrotik</th>
    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Interface asignada</th>
    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Costo</th>
    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Prioridad</th>
    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Estado</th>
    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Ip del OSPF</th>
    </tr>
</thead>
<tbody>';
if($resultado = $query->rowCount() > 0) {
  while($data = $query->fetch(PDO::FETCH_ASSOC)) {
    if($data['estado'] != NULL){
    $salida .='<tr>
                <td>
                    <div class="d-flex  py-1">
                        <div class="d-flex flex-column justify-content-center">
                            <a class="mb-0 text-xs">'.$data['id_ospf'].'</a>
                        </div>
                    </div>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">'.$data['instancia'].'</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">'.$data['interface'].'</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">'.$data['costo'].'</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">'.$data['prioridad'].'</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">'.$data['estado'].'</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">'.$data['ip_ospf'].'</p>
                </td>
                </tr>';
    }
}

$salida.="</tbody></table>";

}
echo $salida;