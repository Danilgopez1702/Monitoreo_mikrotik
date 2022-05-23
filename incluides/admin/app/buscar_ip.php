<?php

require_once 'conexion.php';

$salida = "";

if(!empty($_POST['consulta'])) {
    $consulta = filter_var($_POST['consulta']) ;
    $sql = "SELECT * FROM ip WHERE id_ip LIKE '%".$consulta."%' OR nombre LIKE '%".$consulta."%' 
    OR ip_mk LIKE '%".$consulta."%' OR network LIKE '%".$consulta."%' OR interface LIKE '%".$consulta."%'";
    $query = $pdo->prepare($sql);
    $query->execute();
}
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

$salida.="</tbody></table>";

}
echo $salida;