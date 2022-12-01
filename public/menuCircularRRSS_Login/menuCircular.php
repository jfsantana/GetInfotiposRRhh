
<!-- 
    MENU CIRCULAR 
    CREADO POR BELKIS MERCHÁN
    ESPECIALISTA EN APLICACIONES DE APOYO
    05 DE ABRIL DE 2022  

    EDICIÓN DE LOGOS E IMÁGENES REALIZADOS CON GIMP 2.10
    POR BELKIS MERCHÁN
-->
<style>
  .login {
    animation: fadein 6s; 
  }
  @keyframes fadein {
    0% {
    opacity:0;
    }
    50%{
    opacity:0.5;
    }
    100% {
    opacity:1;
    }
  }
    </style>
  <div id="circularMenu" class="circular-menu" onclick="ver_login();"  >
    <a class="floating-btn">
    <i class="fa fa-user" aria-hidden="true" style="color: red; font-size:2em"></i>
    <!--<img style="width: 80%; vertical-align: top; margin-top:0.3em" src="public/menuCircularRRSS/logos/logoPQV.png"/>-->
    </a>    
  </div>              



<script language="javascript">
  function ver_login(){

    if (document.getElementById('login').style.visibility=='visible'){
      document.getElementById('login').style.visibility='hidden';   
    }
    else{
      document.getElementById('login').style.visibility='visible';   
      $("login").animate({"opacity": "1"}, 2000);

    }
      
  }
</script>
