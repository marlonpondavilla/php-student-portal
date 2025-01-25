<?php
  include_once './autoloader.inc.php';

  if(isset($_POST["submit"])){
    

    //grabbing the data
    $uid = $_POST["uid"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    // instantiate the sign up controller class
    $signupController = new SignupController($uid, $email, $password, $confirmPassword);
    if(!$signupController->isUserOrEmailExist()){
      echo "Sign up successful!";
      exit();
    } else{
      echo "username or email already exists!";
      exit();
    }

  } else{
    echo "404 Not Found!";
  }