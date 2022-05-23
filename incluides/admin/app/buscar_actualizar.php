<?php

require_once 'conexion.php';

$salida = "";

if(!empty($_POST['consulta'])) {
    $consulta = filter_var($_POST['consulta']) ;
    $sql = "SELECT * FROM principal WHERE id_p LIKE '%".$consulta."%' OR nombre LIKE '%".$consulta."%' OR ip_mk LIKE '%".$consulta."%' OR version LIKE '%".$consulta."%'";
    $query = $pdo->prepare($sql);
    $query->execute();
}
$salida .= 
'<table class="table align-items-center mb-0">
<thead>
    <tr>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Id Mikrotik</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Nombre</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Ip del Mikrotik</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Version Software</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Version Firmware</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Acciones</th>
    </tr>
</thead>
<tbody>';
if($resultado = $query->rowCount() > 0) {
  while($data = $query->fetch(PDO::FETCH_ASSOC)) {
    $salida .='
    <tr>
        <form action = "POST">
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
                <p class="text-xs font-weight-bold mb-0">'.$data['version'].'</p>
            </td>
            <td>
                <p class="text-xs font-weight-bold mb-0">'.$data['firmware'].'</p>
            </td>
            <td>
            <a href="../router_os/actualizar_manual/manual.php?ip_mk='.$data['ip_mk'].'" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Actualizar</a>
        </td>
        </form>
    </tr>';
}

$salida.="</tbody></table>";

}
echo $salida;