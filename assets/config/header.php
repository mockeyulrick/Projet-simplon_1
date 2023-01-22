<?php
    session_start ();
    if(!isset($_SESSION["login"])){
  
      header("location:login.php");} 
      require('db.php');
?>
<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>Tableau de Bord</title>
<meta content="" name="description">
<meta content="" name="keywords">
<link href="assets/img/icon_simplon.png" rel="icon">
<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<!-- Template Main CSS File -->
<link href="assets/css/style.css" rel="stylesheet">
</head>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="index.php" class="logo d-flex align-items-center">
    <img src="assets/img/icon_simplon.png" alt="">
    <span class="d-none d-lg-block text-danger">SIMPLON</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">
    <li class="nav-item dropdown">

    </li><!-- End Notification Nav -->

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" >
        <img src="assets/img/user.png" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
      </a>
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="index.php">
      <i class="bi bi-grid"></i>
      <span>Tableau de bord</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Nouvel Enrergistrement</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="nouvel_emargement.php">
          <i class="bi bi-circle"></i><span>Nouvel Emargement</span>
        </a>
      </li>
    </ul>
  </li><!-- End Components Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Liste Enregistrement</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="liste_emargement.php">
          <i class="bi bi-circle"></i><span>Liste Emargement</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->


  <li class="nav-heading">Gestion</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="profile.php">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="btn btn-outline-danger fw-bold w-100" href="logout.php">
      <i class="bi bi-box-arrow-in-left"></i>
      <span>Déconnexion</span>
    </a>
  </li><!-- End Register Page Nav -->
</ul>

</aside><!-- End Sidebar-->