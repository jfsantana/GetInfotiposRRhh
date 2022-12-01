<?php
$mensaje = @$_GET['mensaje'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>CARGA DE INFOTIPO</title>
        <?php include 'layouts/stylesstartlogin.php'; ?>    
        
            <?php
    // *** ESTILOS DEL PORTAL WEB  ************
    include 'vistas/layouts/stylesstart.php';
include 'public/menuCircularRRSS_Login/css/stylemenuCircular.php';
?>
    </head>   
<body>
    <video autoplay muted loop id="myVideo" >
        <source src="public/video/pequiven.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>
    <div class="container" style="max-width: 100%;">
        <div class="row justify-content-center " style=" border:0px; visibility:hidden">
            <div class="col-xl-12 col-lg-12 col-md-12 mt-0">
                <div class="row p-0 login" id="login" name="login"  style="border:0px; margin-top:30%; margin-right:2%">
                    <div class="col-lg-9 "></div>                                
                    <div class="col-lg-3">
                        <div style="box-shadow:1em 1rem 4rem rgb(232, 232, 232) !important; padding-left: 20%;padding-right: 20%;padding-bottom:3%; border-radius: .35rem;">
                            <div class="text-center mt-4 mb-5" >  
                                <div class=" h4 mb-3 pt-3 shine" style="font-size: 2.5em;"><b>INFOTIPOS</BR>(UPLOAD)</b></div>
                            </div>
                            <form name="login" id="login" action="funciones/funcionesGenerales/validarusu.php" method="POST">
                                <div class="form-group" style="margin-top: 2%;">
                                    <input name="user" id="user"  class="form-control form-control-user" placeholder="INDICADOR" style="background-color: #ffffffb3;border: 2px solid #87879582;text-align: center;">
                                </div>
                                <div class="form-group">
                                    <input type="password" id="password" name="password" class="form-control form-control-user"  placeholder="CONTRASEÑA" style="border: 2px solid #87879582;background-color: #ffffffb3;text-align: center;">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-secondary btn-lg btn-block" style="background-color: #e3ca78;border: 2px solid #87879582; border-radius: 0.3em; font-size:1em; color:white">ENTRAR</button>
                                </div>
                                <hr>
                                <div class="form-group text-center" style="font-size:80%; margin-bottom: 5px; height: 10px;">
                                <b> <?php echo $mensaje; ?></b>
                                </div>                                       
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
      include 'public/menuCircularRRSS_Login/menuCircular.php';
?>
    </div>
    <?php include 'layouts/jsstartlogin.php'; ?>
</body>
</html>