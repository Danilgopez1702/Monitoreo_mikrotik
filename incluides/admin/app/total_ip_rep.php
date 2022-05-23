<?php

require_once 'conexion.php';

$salida = "";
$sql = "SELECT * FROM ip";
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
        $id = $data['ip'];
        $query_esteban ="SELECT * FROM ip WHERE ip = '$id'";
        $querys = $pdo->prepare($query_esteban);
        $querys->execute();
                    $result_esteban = $querys->rowCount();
                    if ($result_esteban>1){  
        $salida .='<tr>
                    <td>
                        <div class="d-flex  py-1">
                            <div class="d-flex flex-column justify-content-center">
                                <a class="mb-0 text-xs">'.$data['id_ip'].'</a>
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
                        <p class="text-xs font-weight-bold mb-0">'.$data['network'].'</p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">'.$data['interface'].'</p>
                    </td>
                    </tr>';
                    }
    }

$salida.="</tbody></table>";

}
echo $salida;