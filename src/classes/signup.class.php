<?php

class Signup extends Dbh{

  protected function setUser($username, $email, $password){
      try {
          $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

          $sql = "INSERT INTO users (username, password, user_role, email) VALUES (?, ?, ?, ?);";
          $stmt = $this->connect()->prepare($sql);

          if(!$stmt->execute([$username, $hashedPassword, "user", $email])){
              $stmt = null;
              header("location: ../pages/signup.php?error=stmtfailed");
              exit();
          }

          $stmt = null;
      } catch (Exception $e) {
          echo "Error adding user: " . $e->getMessage();
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

          return $stmt->rowCount() > 0;
      } catch (Exception $e) {
          echo "Error checking if user or email exists: " . $e->getMessage();
      }
  }

}
