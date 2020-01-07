<?php

/*
* Every class derriving from Model has access to $this->db
* $this->db is a PDO object
* Has a config in /core/config/database.php
*/
class BorrowBookModel extends Model {

  function checkBookStatus($startDate, $endDate, $bookId, $userId){
    $startDate = strtotime($startDate);
    $startDate = date('Y-m-d',$startDate);
    $endDate = strtotime($endDate);
    $endDate = date('Y-m-d',$endDate);
    $data = array(':book_id' => $bookId, ':user_id' => $userId, ':start_renting_date' => $startDate, ':expire_renting_date' => $endDate);
    $sql = 'SELECT COUNT(*) AS BookCount FROM book_renting
    WHERE book_id = :book_id
    AND user_id = :user_id
    AND is_expired = 0
    AND ((start_renting_date <= :start_renting_date AND expire_renting_date >= :start_renting_date)
    OR (start_renting_date >= :expire_renting_date AND expire_renting_date <= :expire_renting_date)
    OR (start_renting_date >= :start_renting_date AND expire_renting_date <= :expire_renting_date))';
    $prepare = $this->db->prepare($sql);
    $prepare->execute($data);
    $result = $prepare->fetch();
    return $result['BookCount'];
  }

  function borrowNewBook($startDate, $endDate, $bookId, $userId){
    $startDate = strtotime($startDate);
    $startDate = date('Y-m-d',$startDate);
    $endDate = strtotime($endDate);
    $endDate = date('Y-m-d',$endDate);
    $data = array(':book_id' => $bookId, ':user_id' => $userId, ':start_renting_date' => $startDate, ':expire_renting_date' => $endDate);
    $sql = 'INSERT INTO book_renting (book_id, user_id, start_renting_date, expire_renting_date, is_expired)
    VALUES (:book_id, :user_id, :start_renting_date, :expire_renting_date, 0)';
    $prepare = $this->db->prepare($sql);
    $result = $prepare->execute($data);
    return $result;
  }

  function getBorrowBookList($userId){
    $data = array(':user_id' => $userId);
    $sql = 'SELECT br.*, b.title, b.author, b.subclass_3, b.isbn_no FROM book_renting br
    JOIN book b ON br.book_id = b.book_id
    WHERE br.user_id = :user_id';
    $prepare = $this->db->prepare($sql);
    $prepare->execute($data);
    $result = $prepare->fetchAll();
    return $result;
  }

  function ExtendBorrowBook($endDate, $bookId, $userId){
      $result = true;
      $sqlEndDate = date('Y-m-d', strtotime($endDate));
      $data = array(':book_id' => $bookId, ':user_id' => $userId, ':expire_renting_date' => $sqlEndDate);
      $sql = 'UPDATE book_renting br
      SET br.expire_renting_date = :expire_renting_date, br.is_expired = 0 WHERE br.book_id = :book_id AND br.user_id = :user_id';
      $prepare = $this->db->prepare($sql);
      $prepare->execute($data);
      $count = $prepare->rowCount();
      if ($count == 0) {
        $result = false;
      }
    return $result;
  }
}

?>
