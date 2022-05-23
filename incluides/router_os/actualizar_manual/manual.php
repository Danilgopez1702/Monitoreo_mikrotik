<?php
require("../../bd/conn/conexion.php");
$ip_mk = $_GET['ip_mk'];

$sql_ver = mysqli_query($conexion, "UPDATE `principal` SET `manual`= '1' WHERE ip_mk = '$ip_mk'");
?>
<meta http-equiv="refresh" content="1; url=actualizar_manual.php">