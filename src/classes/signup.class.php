<?php

  class Signup extends Dbh{
    
    protected function userOrEmailExists($uid, $email){
      $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
      $stmt = $this->connect()->prepare($sql);

      if(!$stmt->execute([$uid, $email])){
        $stmt = null;
        header("location: ../pages/signup.php?error=stmtfailed");
        exit();
      } 

      $resultCheck = true;
      if($stmt->rowCount() > 0){
        $resultCheck = true;
      } else{
        $resultCheck = false;
      }

      return $resultCheck;
    }

  }
