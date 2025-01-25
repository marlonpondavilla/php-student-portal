<?php

  class Signup extends Dbh{

    protected function setUser($username, $email, $password){
      try {
        $sql = "INSERT INTO users (username, password, user_role, email) VALUES (?, ?, ?, ?);";
        $stmt = $this->connect()->prepare($sql);
        $hasedPassword = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute([$username, $hasedPassword, "user", $email])){
          $stmt = null;
          header("location: ../pages/signup.php?error=stmtfailed");
          exit();
        } 

        $stmt = null;
      } catch (Exception $e) {
        echo "Error adding user" . $e->getMessage();
      }
    }
    
    protected function userOrEmailExists($uid, $email){
      try {
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
      } catch (Exception $e) {
        echo "Error checking if user or email exists" . $e->getMessage();
      }
    }

  }
