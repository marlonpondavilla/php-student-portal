<?php

  class SignupController extends Signup {
    private $username;
    private $email;
    private $password;
    private $confirmPassword;

    public function __construct($username, $email, $password, $confirmPassword)
    {
      $this->username = $username;
      $this->email = $email;
      $this->password = $password;
      $this->confirmPassword = $confirmPassword;
    }

    public function signupUser(){
      if($this->areFieldsEmpty()){
        header("location: ../pages/signup.php?error=emptyFields");
        exit();
      }

      if(!$this->isUsernameValid()){
        header("location: ../pages/signup.php?error=username");
        exit();
      }

      if(!$this->isEmailValid()){
        header("location: ../pages/signup.php?error=email");
        exit();
      }

      if(!$this->doPasswordsMatch()){
        header("location: ../pages/signup.php?error=password");
        exit();
      }

      if($this->isUserOrEmailExist()){
        header("location: ../pages/signup.php?error=userOrEmailExists");
        exit();
      }

      // $this->setUser();
    }

    // Check if the user has entered all the required fields
    public function areFieldsEmpty(){
      $result = true;

      if(empty($this->username) || empty($this->email) || empty($this->password) || empty($this->confirmPassword)){
        $result = true;
      } else{
        $result = false;
      }

      return $result;
    }

    // Check if the username is valid
    public function isUsernameValid(){
      $result = false;

      if(preg_match("/^[a-zA-Z0-9]*$/", $this->username)){
        $result = true;
      } else{
        $result = false;
      }

      return $result;
    }

    public function isEmailValid(){
      $result = false;

      if(filter_var($this->email, FILTER_VALIDATE_EMAIL)){
        $result = true;
      } else{
        $result = false;
      }

      return $result;
    }

    public function doPasswordsMatch(){
      $result = false;

      if($this->password === $this->confirmPassword){
        $result = true;
      } else{
        $result = false;
      }

      return $result;
    }

    public function isUserOrEmailExist(){
      $result = true;

      if($this->userOrEmailExists($this->username, $this->email)){
        $result = true;
      } else{
        $result = false;
      }

      return $result;
    }
  }