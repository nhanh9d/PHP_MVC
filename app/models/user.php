<?php

/*
 * Every class derriving from Model has access to $this->db
 * $this->db is a PDO object
 * Has a config in /core/config/database.php
 */
class User extends Model {
    function getUser($username, $password){
      $result = null;
      $data = array(':username' => $username, ':password' => $password);
      $sql = 'SELECT username,firstname,lastname
              FROM users
              WHERE username = :username AND password = :password';
      $prepare = $this->db->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $prepare->execute($data); //SELECT username,firstname,lastname FROM users WHERE admin = admin AND password = 1234
      $result = $prepare->fetchAll();
      return $result;
    }

    function registerUser($username, $password){
      $result = null;
      $data = array($username, md5($password));
      $sql = 'INSERT INTO users(username, password) VALUES (?,?)';
      $prepare  = $this->db->prepare($sql);
      //echo $prepare;
      $result = $prepare->execute($data);
      return $result;
    }
}

?>
