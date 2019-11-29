<?php

/*
 * Every class derriving from Model has access to $this->db
 * $this->db is a PDO object
 * Has a config in /core/config/database.php
 */
class AdminModel extends Model {
    function getAdmin($username, $password){
      $result = null;
      $sql = 'SELECT username
              FROM admin
              WHERE username = :username AND password = :password';
      $prepare = $this->db->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $prepare->execute(array(':username' => $username, ':password' => md5($password)));
      $result = $prepare->fetchAll();
      return $result;
    }
}

?>
