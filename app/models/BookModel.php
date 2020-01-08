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
    function addNewBook($title, $author, $publisher_name, $isbn_no, $description, $cover_image, $subclass_3){
        $sql = 'INSERT INTO book(copies, copyright_year, date_received, title, author, publisher_name, place_publication, isbn_no, category_id, availability, subject, cover_image, subclass_3, subclass_4, description, status, call_number, section)
        VALUES ("",2019,"",:title,:author,:publisher_name,"",:isbn_no,1,"Đang nhập về","",:cover_image,:subclass_3,"",:description,"","","")';
        $data = array('title' => $title, $author, $publisher_name, $isbn_no, $description, $cover_image, $subclass_3);
        $prepare = $this->db->prepare($sql);
        $prepare->execute($data);
        return $prepare->rowCount();
    }
}

?>
