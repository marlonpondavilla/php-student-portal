<?php

  class Signup extends Dbh{
    
    protected function getUserByUsername($username){
      $sql = "SELECT * FROM users WHERE username = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$username]);

      return $stmt->fetchAll();      
    }
  }