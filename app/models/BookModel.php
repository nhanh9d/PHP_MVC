<?php

/*
* Every class derriving from Model has access to $this->db
* $this->db is a PDO object
* Has a config in /core/config/database.php
*/
class BookModel extends Model {
  function getAllBooks(){
    $sql = 'SELECT * FROM book';
    $prepare = $this->db->prepare($sql);
    $prepare->execute();
    $result = $prepare->fetchAll();
    return $result;
  }
  function getBook($bookAlias){
    $result = null;
    $sql = 'SELECT * FROM book WHERE isbn_no = :isbn_no';
    $data = array(':isbn_no' => $bookAlias);
    $prepare = $this->db->prepare($sql);
    $response = $prepare->execute($data);
    if ($response) {
      $result = $prepare->fetchAll();
    }
    return $result;
  }
}

?>
