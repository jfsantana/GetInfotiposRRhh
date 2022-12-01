<?php

if (!isset($_SESSION)) {
    session_start();
}

$id_rol = $_SESSION["id_rol"];

?>
<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <a class="nav-link" href="dashboard.php?activo=inicio">
            <div class="sb-nav-link-icon"><i class="fas fa-home"></i>&nbsp;&nbsp;Inicio</div>
        </a>
        <?php
        if ($id_rol == 1) {  // ES ADMINISTRADOR NRO 1   
        ?>
            <div class="nav">
                <div class="sb-sidenav-menu-heading"> </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAdmin" aria-expanded="false" aria-controls="collapseAdmin">
                    <div class="sb-nav-link-icon">
                        <img style="width: 1.5em;" src="public/img/sistema/icon/cusuarios.png" />
                    </div> ADMINISTRADOR
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseAdmin" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="dashboard.php?activo=admon_usu&filtro=A">Usuarios</a>
                        <!--  <a class="nav-link" href="dashboard.php?activo=construccion">Configuración</a> -->
                    </nav>
                </div>
            </div>
        <?php }
        if (($id_rol == 1) or ($id_rol == 2) or ($id_rol == 5)) {  // Administrador, Registrador y Analista
        ?>
            <div class="nav">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePlanificacion" aria-expanded="false" aria-controls="collapseSolicitante">
                    <div class="sb-nav-link-icon">
                        <img style="width: 1.5em;" src="public/img/sistema/icon/gpyg.png" />
                    </div> PLANIFICACION
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePlanificacion" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="dashboard.php?activo=pycalendar">Plan General</a>
                    </nav>
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="dashboard.php?activo=admonprincipalformacion">Capacitación</a>
                    </nav>
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="">Evaluacion Alcances</a>
                    </nav>
                </div>
            </div>
        <?php }
        if (($id_rol == 1) or ($id_rol == 2) or ($id_rol == 5)  or ($id_rol == 5)) {  // Administrador, Registrador y Analista
        ?>
            <div class="nav">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAHO" aria-expanded="false" aria-controls="collapseSolicitante">
                    <div class="sb-nav-link-icon">
                        <img style="width: 1.5em;" src="public/img/sistema/icon/gaeh.png" />
                    </div> AHO
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseAHO" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="dashboard.php?activo=ambiente">Ambiente</a>
                    </nav>
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="dashboard.php?activo=ho">Higiene Ocupacional</a>
                    </nav>
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="dashboard.php?activo=manuales">Documentación</a>
                    </nav>
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="dashboard.php?activo=reportarGestionAHO">Auditoría</a>
                    </nav>
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="dashboard.php?activo=reportarGestionAHO">Capacitación</a>
                    </nav>
                </div>
            </div>
        <?php }
        if (($id_rol == 1) or ($id_rol == 3)) {  // MODULO SP
        ?>
            <div class="nav">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseRRHH" aria-expanded="false" aria-controls="collapseSolicitante">
                    <div class="sb-nav-link-icon">
                        <img style="width: 1.5em;" src="public/img/sistema/icon/gsp.png" />
                    </div> SP
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseRRHH" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="dashboard.php?activo=sp">Seguridad Industrial</a>
                    </nav>
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="dashboard.php?activo=sico">Seguimiento</a>
                    </nav>
                    <nav class="sb-sidenav-menu-nested nav">
                        <?php
                        if (($id_rol == 1) or ($id_rol == 5)) {  //href="dashboard.php?activo=reportarGestionSP"
                        ?>
                            <a class="nav-link" href="dashboard.php?activo=plaSP&gerenciaProyectoAHO=SP">Planificacion</a>
                        <?php  }   ?>
                    </nav>
                </div>
            </div>
        <?php }
        if (($id_rol == 1) or ($id_rol == 4)) {  // MODULO ADyCN
        ?>
            <div class="nav">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseValidacion" aria-expanded="false" aria-controls="collapseSolicitante">
                    <div class="sb-nav-link-icon">
                        <img style="width: 1.5em;" src="public/img/sistema/icon/gadycn.png" />
                    </div> ADyCN
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseValidacion" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="dashboard.php?activo=sci">Sistemas Contra Incendios</a>
                    </nav>
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="dashboard.php?activo=ad">Administración de Desastres</a>
                    </nav>
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="dashboard.php?activo=mp">Materiales Peligrosos</a>
                    </nav>
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="dashboard.php?activo=adcn">Simulacros</a>
                    </nav>

                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="dashboard.php?activo=24hj">Reportes 24H</a>

                    </nav>

                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="dashboard.php?activo=24HG">Consultar Reportes</a>

                    </nav>
                </div>
            </div>
        <?php }
        if (($id_rol == 1) or ($id_rol == 4)) {  // ADMINISTRADOR, MIXTAS
        ?>
            <div class="nav">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMixtas" aria-expanded="false" aria-controls="collapseSolicitante">
                    <div class="sb-nav-link-icon">
                        <img style="width: 1.5em;" src="public/img/sistema/icon/em.png" />
                    </div> MIXTAS
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseMixtas" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                </div>
            </div>
        <?php }
        ?>
        <div class="nav">
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapserReportes" aria-expanded="false" aria-controls="collapseSolicitante">
                <div class="sb-nav-link-icon">
                    <img style="width: 1.5em;" src="public/img/sistema/icon/rei.png" />
                </div> REPORTES
            </a>
        </div>
        <div class="nav">
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapserAyuda" aria-expanded="false" aria-controls="collapseSolicitante">
                <div class="sb-nav-link-icon">
                    <img style="width: 1.5em;" src="public/img/sistema/icon/manuales.png" />
                </div> MANUALES
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapserAyuda" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="">Técnico</a>
                </nav>
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="">Administrador</a>
                </nav>
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="">Analista</a>
                </nav>
            </div>
        </div>
        <div class="nav">
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapserGaleria" aria-expanded="false" aria-controls="collapseSolicitante">
                <div class="sb-nav-link-icon">
                    <img style="width: 1.5em;" src="public/img/sistema/icon/proyectos.png" />
                </div> PROYECTO
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapserGaleria" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="Documentos/Proyecto/ProyectoSIAHO.pdf" target="_blank">Documentación</a>
                </nav>
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="Documentos/Proyecto/PlandeTrabajoSIHAO.xlsx" target="_blank">Plan de Trabajo</a>
                </nav>
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="dashboard.php?activo=fotos">Galería</a>
                </nav>
            </div>
        </div>
    </div>
</nav>