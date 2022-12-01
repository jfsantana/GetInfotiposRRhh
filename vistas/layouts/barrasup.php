
<?php 
if ( !isset( $_SESSION ) ) {
    session_start();   
} 

if ($_SESSION["usuario"]=="") {
    echo "<script> eval('document.location=\"../../siaho/funciones/funcionesGenerales/cerrarsesion.php\"');</script>";
    exit;
}

?>

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark" style="background-color:#262424 !important">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href=""><img style="width: 6em;" src="public/img/SIAHO.png"/><img style="width: 2em;" src="public/img/logo2.png"/></a>
    
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
        <i class="fa fa-bars" aria-hidden="true"></i>    
    </button>

    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-user"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">                       
                <li><a class="dropdown-item" href="funciones/funcionesGenerales/cerrarsesion.php">Salir</a></li>
            </ul>
        </li>
    </ul><div style="color: white; align: center"><?php  echo $_SESSION["nombre"]; ?></div>
</nav>


