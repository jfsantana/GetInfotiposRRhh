    
<link href="public/css/bootstrap4/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="public/css/bootstrap4/css/fontsapis.css"  rel="stylesheet">

<link href="public/css/bootstrap4/css/sb-admin-2.min.css" rel="stylesheet">
<link href="vistas/layouts/fuentes.css" rel="stylesheet">

<style>        
    .bodyclass {
        background-image: url('public/img/login/fondo11.gif');
        background-position: center center;
        /* El fonde no se repite */
        background-repeat: no-repeat;
        /* Fijamos la imagen a la ventana para que no supere el alto de la ventana */
        background-attachment: fixed;
        /* El fonde se re-escala automáticamente */
        background-size: cover;
        /* Color de fondo si la imagen no se encuentra o mientras se está cargando */
        background-color: #fff;
        /* Fuente para el texto */
        text-align: center;
        color: #000;
        /*height: 100vh;*/
    }
</style>
<style id="mfn-dnmc-theme-css">
    .shine	{
		padding-top: 0;
		padding-bottom: 0;
		margin: 0 auto;
        font-family: 'arialbold';
		text-transform:uppercase;
        letter-spacing: 0.0em;
        font-size: 3em; 
        letter-spacing: 0.36em;        
	}
.shine {
    background: white -webkit-gradient(linear, left top, right top, from(#26395f), to(#6b809d), color-stop(0.5, rgb(178, 178, 183))) 0 0 no-repeat;
    -webkit-background-size: 80px;
    
    color: rgba(255, 255, 255, 0.1);
    -webkit-background-clip: text;
    
    -webkit-animation-name: shine;
    -webkit-animation-duration: 5s;
    -webkit-animation-iteration-count: infinite;
}

@-webkit-keyframes shine {
    0% {
        background-position: top left;
    }
    100%  {
        background-position: top right;
    }
}

/* Background para ancho máximo de la pantalla física */
@media only screen and (max-device-width: 767px) {
    .bodyclass {
        background-image: url('public/img/login/fondo11.jpg');        
    }
}
/* Background para ancho máximo del navegador */
@media only screen and (max-width: 767px) {
    .bodyclass {
        background-image: url('public/img/login/fondo11.jpg');   
    }
}

@media only screen and (max-device-width: 767px) {
    .shine{
        font-size: 2em; 
    }
}
@media only screen and (max-width: 767px) {
    .shine{
        font-size: 2em; 
    }
}
</style>



<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial;
  font-size: 17px;
}

#myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%; 
  min-height: 100%;
}

.content {
  position: fixed;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  color: #f1f1f1;
  width: 100%;
  padding: 20px;
}

#myBtn {
  width: 200px;
  font-size: 18px;
  padding: 10px;
  border: none;
  background: #000;
  color: #fff;
  cursor: pointer;
}

#myBtn:hover {
  background: #ddd;
  color: black;
}
</style>
<style>
    .form-control::placeholder {
        color: #7b7272;
        opacity: 1;
    }
    .shadow-lg{
        box-shadow: 0;
    }

</style>
