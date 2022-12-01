<?php
// se inicia sesion para poder usar la variable TOKENsss
if (!isset($_SESSION)) {
    session_start();
}
/***********************************FIN DE FUNCIONES *****************************************/

if (file_exists('../funciones/wsdl/clases/consumoApi.class.php')) {
    require_once '../funciones/wsdl/clases/consumoApi.class.php';
} else {
    require_once '../../funciones/wsdl/clases/consumoApi.class.php';
}

if (isset($_GET)) {
    @$resultados = json_decode(@$_GET['rs'], true);
}

// COMPLEJOS TODOS PARA USUARIOS NUEVOS
$token = $_SESSION['token'];
$URL = 'http://'.$_SERVER['HTTP_HOST'].'/funciones/wsdl/infotipos?infotipoView=1';
$rs = API::GET($URL, $token);
$arrayInfotipos = API::JSON_TO_ARRAY($rs);
$infotipos = $arrayInfotipos;

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>INFOTIPOS UPLOAD SAP</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class=" sidebar-mini">
  
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>

          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Salir</a>
          </li>
        </ul>
      </nav>
      <div class="content-wrapper">
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <form action="update.model.php" method="POST" name="update" id="update">
                  <div class="card card-secondary">
                      <div class="card-header">
                        <h3 class="card-title">Seleccione los infotipos que desea Cargar</h3>
                        <div class="float-right d-none d-sm-block">
                            Desde:<select name="anno" id="anno" >
                              <?php
                              for ($i = date('Y'); $i >= 2000; --$i) {
                                  echo "<option value='$i'>$i</option>";
                              }?>
                            </select>
                        </div>
                      </div>
                    <!-- /.card-header -->
                      <div class="card-body">
                      
                          <div class="row">
                            <div class="col-sm-6">
                              <!-- checkbox -->
                              <div class="form-group">
                              <?php foreach ($infotipos as $detalleInfotipo) {
                                  $checked = '';
                                  if ($detalleInfotipo['estatus'] == 1) {
                                      $checked = 'checked';
                                  }
                                  echo '<div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="'.$detalleInfotipo['id'].'" value="1" name="'.$detalleInfotipo['id'].'" '.$checked.'>
                                        <label for="'.$detalleInfotipo['id'].'" class="custom-control-label">INF-'.$detalleInfotipo['infotipos'].'</label>
                                        </div>';
                              }?>

                              </div>
                              <input type="submit" value="Actualizar Infotipo(s)" />
                            </div>


                          </div>
                        
                      </div>
                  </div>
                </form>
                <?php if (isset($resultados)) {
                    // echo '<pre>'.print_r(@$resultados, true).'</pre>';
                    ?>
                    <!-- Main content -->
                    <section class="content">
                      <div class="container-fluid">
                        <!-- /.row -->
                        <div class="row">
                          <div class="col-12">
                            <div class="card">
                              <div class="card-header">
                                <h3 class="card-title">Resultados</h3>
                                <div class="card-tools">
                                  <div class="input-group input-group-sm" style="width: 150px;">
                                  </div>
                                </div>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                  <thead>
                                    <tr>
                                      <th>INFOTIPO / REGISTROS</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                    foreach ($resultados as $campo => $valor1) {
                                        $fila = "<tr><td class='btn btn-block btn-danger'>Para el Ano: $campo</td></Tr>";
                                        foreach ($resultados[$campo] as $valor) {
                                            $fila = $fila.'<tr><td>'.$valor[0].' => '.$valor[1].'(reg)</td></tr>';
                                        }
                                        echo $fila;
                                    } exit; ?>



                                  </tbody>
                                </table>
                              </div>
                              <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                          </div>
                        </div>

                        <!-- /.row -->
                      </div><!-- /.container-fluid -->
                    </section>
                <?php

                }
                empty($_GET); ?>
              </div>
              
            </div>
          </div>
        </section>

      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2014-<?php echo date('Y'); ?> <a href="https://pequiven.com">Pequiven</a>.</strong>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <script>
    $(function () {
      bsCustomFileInput.init();
    });
    </script>

</body>
</html>
