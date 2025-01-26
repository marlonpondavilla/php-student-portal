<?php
  include_once './autoloader.inc.php';

  if(isset($_POST["login"])){
    $username = $_POST["uid"];
    $password = $_POST["password"];

    $loginController = new LoginController($username, $password);
    $loginController->loginUser();

  }