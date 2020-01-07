<?php

/*
* Every class derriving from Model has access to $this->db
* $this->db is a PDO object
* Has a config in /core/config/database.php
*/
class RequestBookModel extends Model {
  function CreateRequestBook($bookTitle, $userNote, $userId){
    $data = array(':book_title' => $bookTitle, ':user_id' => $userId, ':user_note' => $userNote);
    $sql = 'INSERT INTO book_request (book_title, user_id, is_approved, user_note)
            VALUES (:book_title, :user_id, 0, :user_note)';
    $prepare = $this->db->prepare($sql);
    $result = $prepare->execute($data);
    return $result;
  }
}

?>
