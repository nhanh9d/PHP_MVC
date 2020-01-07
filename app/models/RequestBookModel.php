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
    function getAllRequest(){
        $sql = 'SELECT br.*, u.username FROM book_request br JOIN users u ON br.user_id = u.user_id';
        $prepare = $this->db->prepare($sql);
        $prepare->execute();
        $result = $prepare->fetchAll();
        return $result;
    }
    function AcceptRequestBook($requestId, $title){
        processRequest($requestId, 1);
        addNewBook($title);
    }
    function DeclineRequestBook($requestId){
        processRequest($requestId, -1);
    }
    private function processRequest($requestId, $is_approved){
        $data = array(':book_request_id' => $requestId, ':is_approved' => $is_approved);
        $sql = 'UPDATE book_request SET is_approved = :is_approved WHERE book_request_id = :book_request_id';
        $prepare = $this->db->prepare($sql);
        $prepare->execute($data);
    }
    private function addNewBook($title){
        $data = array(':book_title' => $title);
        $sql = 'INSERT INTO book(copies, copyright_year, date_received, title, author, publisher_name, place_publication, isbn_no, category_id, availability, subject, cover_image, subclass_3, subclass_4, description, status, call_number, section)
        VALUES ("",0,"",:book_title,"","","","",0,"","","","default-book-cover.png","","","","","")';
        $prepare = $this->db->prepare($sql);
        $result = $prepare->execute($data);
    }
}

?>
