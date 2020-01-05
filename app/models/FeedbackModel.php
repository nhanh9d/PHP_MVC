<?php

/*
* Every class derriving from Model has access to $this->db
* $this->db is a PDO object
* Has a config in /core/config/database.php
*/
class FeedbackModel extends Model {
  function AddFeedBack($title, $content, $bookId, $userId){
    $data = array(':book_id' => $bookId, ':user_id' => $userId, ':title' => $title, ':content' => $content);
    $sql = 'INSERT INTO feedback (book_id, user_id, title, content, is_replied)
            VALUES (:book_id, :user_id, :title, :content, 0)';
    $prepare = $this->db->prepare($sql);
    $result = $prepare->execute($data);
    return $result;
  }
}

?>
