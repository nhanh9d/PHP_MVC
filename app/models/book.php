<?php

/*
 * Every class derriving from Model has access to $this->db
 * $this->db is a PDO object
 * Has a config in /core/config/database.php
 */
class Book extends Model {
    function getAllBooks(){
      $result = null;
      $sql = 'SELECT *
              FROM books';
      $prepare = $this->db->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $prepare->execute();
      $result = $prepare->fetchAll();
      return $result;
    }
}

?>
