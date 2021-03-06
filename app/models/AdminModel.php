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
    function getAllAdmin(){
        $sql = 'SELECT * FROM admin';
        $prepare = $this->db->prepare($sql);
        $prepare->execute();
        $result = $prepare->fetchAll();
        return $result;
    }
    function checkExistedUser($username){
        $data = array(':username' => $username);
        $sql = 'SELECT * FROM admin WHERE username = :username';
        $prepare = $this->db->prepare($sql);
        $prepare->execute($data);
        $result = $prepare->fetch();
        return $result;
    }
    function registerAdmin($username, $fullname, $password, $status){
        $result = null;
        $data = array(':username' => $username, ':fullname' => $fullname, ':password' => md5($password), ':status' => $status);
        $sql = 'INSERT INTO admin(username, fullname, password, status, create_date) VALUES (:username, :fullname, :password, :status, now())';
        $prepare  = $this->db->prepare($sql);
        $result = $prepare->execute($data);
        return $result;
    }
}

?>
