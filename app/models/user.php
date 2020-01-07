<?php

/*
* Every class derriving from Model has access to $this->db
* $this->db is a PDO object
* Has a config in /core/config/database.php
*/
class User extends Model {
    function getUser($username, $password){
        $data = array(':username' => $username, ':password' => md5($password));
        $sql = 'SELECT user_id,username,firstname,lastname
        FROM users
        WHERE username = :username AND password = :password';
        $prepare = $this->db->prepare($sql);
        $prepare->execute($data); //SELECT username,firstname,lastname FROM users WHERE admin = admin AND password = 1234
        $result = $prepare->fetch();
        return $result;
    }

    function registerUser($username, $password){
        $result = null;
        $data = array($username, md5($password));
        $sql = 'INSERT INTO users(username, password) VALUES (?,?)';
        $prepare  = $this->db->prepare($sql);
        $result = $prepare->execute($data);
        return $result;
    }

    function getAllUser(){
        $sql = 'SELECT * FROM users';
        $prepare = $this->db->prepare($sql);
        $prepare->execute();
        $result = $prepare->fetchAll();
        return $result;
    }
}

?>
