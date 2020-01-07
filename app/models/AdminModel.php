<?php

/*
 * Every class derriving from Model has access to $this->db
 * $this->db is a PDO object
 * Has a config in /core/config/database.php
 */
class AdminModel extends Model {
    function getAdmin($username, $password){
      $data = array(':username' => $username, ':password' => md5($password));
      $sql = 'SELECT username
              FROM admin
              WHERE username = :username AND password = :password';
      $prepare = $this->db->prepare($sql);
      $prepare->execute($data);
      $result = $prepare->fetch();
      return $result;
    }
}

?>
