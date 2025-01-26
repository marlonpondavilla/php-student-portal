<?php

  class Login extends Dbh{

    protected function getUser($username, $password){
      try {
          $sql = "SELECT username, password FROM users WHERE username = ?;";
          $stmt = $this->connect()->prepare($sql);
  
          if(!$stmt->execute([$username])){ 
              $stmt = null;
              header("location: ../../index.php?error=stmtfailed");
              exit();
          }
  
          if($stmt->rowCount() <= 0){
              $stmt = null;
              header("location: ../../index.php?error=usernotfound");
              exit();
          }
  
          $user = $stmt->fetch();
  
          $pwdHashed = $user['password'];
          $checkPwd = password_verify($password, $pwdHashed);
    
          if(!$checkPwd){
              $stmt = null;
              header("location: ../../index.php?error=usernameorpassword");
              exit();
          }
  
          session_start();
          $_SESSION['uid'] = $user['username'];
          $_SESSION['email'] = $user['email'];
  
          $stmt = null;
          header("location: ../../index.php?login=success");
  
      } catch (Exception $e) {
          echo "Error getting user: " . $e->getMessage();
      }
  }
  
  }