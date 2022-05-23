<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    MONITOREO DE MIKROTIK
  </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Nucleo Icons 
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" /> 
  Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />

</head>

<body class="g-sidenav-show  bg-gray-200">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
      <div class="sidenav-header ">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" target="_blank">
            <span class="ms-1 font-weight-bold text-white">MONITOREO DE MIKROTIK</span>
        </a>
      </div>
      <hr class="horizontal light mt-0 mb-2">
      <div class="" id="sidenav-collapse-main">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a id= "inicio"  class="nav-link text-white "  href="./index.php">
                <div  class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">dashboard</i>
                </div>
                <span class="nav-link-text ms-1">Panel de control</span>
            </a>
          </li>
          <li class="nav-item">
            <a id= "segundo" class="nav-link text-white " href="./mk.php">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">router</i>
                </div>
                <span class="nav-link-text ms-1">Mk</span>
            </a>
          </li>
          <li class="nav-item">
            <a id= "segundo" class="nav-link text-white " href="./sfp.php">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">link</i>
                </div>
                <span class="nav-link-text ms-1">Fibra</span>
            </a>
          </li>
          <li class="nav-item">
            <a id= "segundo" class="nav-link text-white " href="./actualizar.php">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">upgrade</i>
                </div>
                <span class="nav-link-text ms-1">actualizar</span>
            </a>
          </li>
          <li class="nav-item">
              <a id= "quinto" class="nav-link text-white " href="./puertos.php">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">settings_ethernet</i>
                </div>
                <span class="nav-link-text ms-1">Puertos</span>
              </a>
          </li>
          <li class="nav-item">
              <a id= "quinto" class="nav-link text-white " href="./monitoreo_ip.php">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">sync</i>
                </div>
                <span class="nav-link-text ms-1">Monitoreo de ip</span>
              </a>
          </li>
          <li class="nav-item">
              <a id= "quinto" class="nav-link text-white " href="./monitoreo_vlan.php">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">sync</i>
                </div>
                <span class="nav-link-text ms-1">Monitoreo de Vlan</span>
              </a>
          </li>
          <li class="nav-item">
              <a id= "quinto" class="nav-link text-white " href="./monitoreo_ospf.php">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">sync</i>
                </div>
                <span class="nav-link-text ms-1">Monitoreo de Ospf</span>
              </a>
          </li>
          <li class="nav-item">
              <a id= "quinto" class="nav-link text-white " href="./ip_rep.php">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">warning</i>
                </div>
                <span class="nav-link-text ms-1">Ip's en conflicto</span>
              </a>
          </li>
        </ul>
      </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            </p>  
          </ol>
          <h6 class="font-weight-bolder mb-0" id = "cabecera"></h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="../header/salir.php" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Cerrar sesion</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    </p>
    <!-- End Navbar -->