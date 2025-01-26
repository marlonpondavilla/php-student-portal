<?php
  class LoginController extends Login{
    private $username;
    private $password;

    public function __construct($username, $password){
      $this->username = $username;
      $this->password = $password;
    }

    public function loginUser(){

      if($this->areFieldsEmpty()){
        header("location: ../../index.php?error=emptyfields");
        exit();
      };

      if(!$this->isUsernameValid()){
        header("location: ../../index.php?error=invalidusername");
        exit();
      }

      $this->getUser($this->username, $this->password);

    }

    private function areFieldsEmpty(){
      $result = true;

      if(empty($this->username) || empty($this->password)){
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
    
  }