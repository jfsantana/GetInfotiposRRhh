<?php

  if (!isset($_SESSION)) {
      session_start();
  }

  // header("Content-Type: text/html; charset=utf-8");
  $usr = $_POST['user'];

  if (($usr == '') && ($_POST['password'] == '')) {
      header('Location:../../index.php?code=2');
      exit;
  }

  /***********************************
   * Jesus Santana
   * se agrego este include par arealizar la vainacion por servicios
   * *********************************/
  include_once 'validarsuService.php';
