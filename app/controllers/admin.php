<?php

class Admin extends Controller {

    /*
    * http://localhost/dashboard
    */
    function Index () {

        if (!isset($_SESSION['admin'])) {

            header('Location: /admin/login');

        } else {
            $this->view('template/admin/header', array('username' => $_SESSION['admin']['username']));
            $this->view('admin/index');
            $this->view('template/admin/footer');

        }

    }

    function Login () {
        $this->view('admin/login');
    }

    function DoLogin () {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = $this->model('AdminModel')->getAdmin($username,$password);
        if(!empty($result)){
            $_SESSION['admin'] = $result;
            $_SESSION['noUserFound'] = null;
            header('Location: /admin');
        }
        else{
            $_SESSION['noUserFound'] = 'Không có người dùng '.$username;
            header('Location: /admin/login');
        }
    }
    function doLogout () {

        $_SESSION['admin'] = null;
        //session_unset();
        header('Location: /admin/login');

    }

    function listSysUser(){

        $adminModel = $this->model('AdminModel');

        $this->view('template/admin/header', array('username' => $_SESSION['admin']['username']));
        $this->view('admin/list-sys-user', array('listSysUser' => $adminModel->getAllAdmin()));
        $this->view('template/admin/footer');
    }

    function addSysUser(){
        if (isset($_POST['username'])) {
            $username = $_POST['username'];
        }
        if (isset($_POST['fullname'])) {
            $fullname = $_POST['fullname'];
        }
        if (isset($_POST['password'])) {
            $password = $_POST['password'];
        }
        if (isset($_POST['status'])) {
            $status = $_POST['status'];
        }
        else if(!is_null($username) && !is_null($password))
        {
            $adminModel = $this->model('AdminModel');

            $isSuccess = $adminModel->registerAdmin($username, $fullname, $password, $status);
            if ($isSuccess) {
                $message = 'Đăng ký thành công';
            }
            else{
                $message = 'Đăng ký không thành công';
            }
        }
        print_r($message0);
    }

    function listUser(){

        $userModel = $this->model('user');

        $this->view('template/admin/header', array('username' => $_SESSION['admin']['username']));
        $this->view('admin/list-user', array('listUser' => $userModel->getAllUser()));
        $this->view('template/admin/footer');
    }

    function listBookRequest(){

        $RequestBookModel = $this->model('RequestBookModel');

        $this->view('template/admin/header', array('username' => $_SESSION['admin']['username']));
        $this->view('admin/list-book-request', array('listBookRequest' => $RequestBookModel->getAllRequest()));
        $this->view('template/admin/footer');
    }


}

?>
