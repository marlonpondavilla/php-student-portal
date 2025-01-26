<?php
  include_once './autoloader.inc.php';

  if(isset($_POST["signup"])){
    
    //grabbing the data
    $uid = $_POST["uid"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    // instantiate the sign up controller class
    $signupController = new SignupController($uid, $email, $password, $confirmPassword);

    // sign up the user
    $signupController->signupUser();

    //redirect to the sign up page with no errors
    header("location: ../pages/signup.php?error=none");

  } else{
    echo "404 Not Found!";
  }
