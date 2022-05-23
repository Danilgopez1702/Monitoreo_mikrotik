<?php
session_start();
if (!empty($_SESSION['active'])) {
	header('location: incluides/admin/');
  } else {
		if (!empty($_POST)) {
	  		if (empty($_POST['usuario']) || empty($_POST['clave'])) {
				$alert = '<div class="alert alert-danger" role="alert">Ingrese su usuario y su clave</div>';
			} else{
				require_once "incluides/bd/conn/conexion.php";
				$user = mysqli_real_escape_string($conexion, $_POST['usuario']);
      			//$clave = mysqli_real_escape_string($conexion, md5($_POST['clave']));
      			$clave = mysqli_real_escape_string($conexion, $_POST['clave']);
			
			  	$query = mysqli_query($conexion, "SELECT `id_us`, `nombre`, `pass`, `rol` FROM `usuarios` WHERE nombre = '$user' AND pass = '$clave'");
			  	mysqli_close($conexion);
			  	$resultado = mysqli_num_rows($query);
			  	if ($resultado > 0) {
					$dato = mysqli_fetch_array($query);
					$_SESSION['active'] = true;
					$_SESSION['id_us'] = $dato['id_usuario'];
					$_SESSION['nombre'] = $dato['nombre'];
					$_SESSION['rol'] = $dato['rol'];
					header('location: incluides/admin/');
				
			  	} else {
					$alert = '<div class="alert alert-danger" role="alert"> Usuario o Contraseña Incorrecta </div>';
					session_destroy();
			  	}
			}
		}
	}
?>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Inicio de Sesion</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="incluides/assets/css/index.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Inicia Sesion</h3>
				<br>
			</div>
			<div class="card-body">
				<form class="user" method="POST">
				<?php echo isset($alert) ? $alert : ""; ?>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Usuario" name = "usuario">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="Contraseña" name = "clave">
					</div>
					<div class="form-group">
						<input type="submit" value="Ingresar" class="btn float-right login_btn">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>