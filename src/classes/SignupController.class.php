<?php
  // test
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
        header("location: ../views/signup.php?error=emptyFields");
        exit();
      }

      if(!$this->isUsernameValid()){
        header("location: ../views/signup.php?error=username");
        exit();
      }

      if(!$this->isEmailValid()){
        header("location: ../views/signup.php?error=email");
        exit();
      }

      if(!$this->doPasswordsMatch()){
        header("location: ../views/signup.php?error=password");
        exit();
      }

      if($this->isUserOrEmailExist()){
        header("location: ../views/signup.php?error=userOrEmailExists");
        exit();
      }

      $this->setUser($this->username, $this->email, $this->password);
    }

    private function areFieldsEmpty(){
      $result = true;

      if(empty($this->username) || empty($this->email) || empty($this->password) || empty($this->confirmPassword)){
        $result = true;
      } else{
        $result = false;
      }

      return $result;
    }

    private function isUsernameValid(){
      $result = false;

      if(preg_match("/^[a-zA-Z0-9]*$/", $this->username)){
        $result = true;
      } else{
        $result = false;
      }

      return $result;
    }

    private function isEmailValid(){
      $result = false;

      if(filter_var($this->email, FILTER_VALIDATE_EMAIL)){
        $result = true;
      } else{
        $result = false;
      }

      return $result;
    }

    private function doPasswordsMatch(){
      $result = false;

      if($this->password === $this->confirmPassword){
        $result = true;
      } else{
        $result = false;
      }

      return $result;
    }

    private function isUserOrEmailExist(){
      $result = true;

      if($this->userOrEmailExists($this->username, $this->email)){
        $result = true;
      } else{
        $result = false;
      }

      return $result;
    }
  }