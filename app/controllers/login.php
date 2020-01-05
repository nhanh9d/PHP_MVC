<?php

class Login extends Controller {

    /*
     * http://localhost/login
     */
    function Index () {

        if (!isset($_SESSION['client'])) {

            $this->view('template/header');
            $this->view('login');
            $this->view('template/footer');

        } else {

            header('Location: /');

        }

    }

    /*
     * http://localhost/login/log_in
     */
    function Log_In () {
        $username = $_POST['username'];//ten tai khoan
        $password = $_POST['password'];//mat khau

        $userModel = $this->model('user');//goi 1 cai model user truy van du lieu
        $result = $userModel->getUser($username,$password);//lay nguoi dung theo ten tai khoan va mat khau
        if(!empty($result)){
            $_SESSION['client'] = $result;
        }
        print !empty($result);
    }

    function register(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = 'Có lỗi khi đăng ký';

        $userModel = $this->model('user');
        $result = $userModel->registerUser($username,$password);
        if(!is_null($result)){
            $result = 'Đăng ký thành công';
        }
        print $result;
    }

    /*
     * http://localhost/login/logout
     */
    function Logout () {

        $_SESSION['client'] = null;
        //session_unset();
        header('Location: /');

    }

}

?>
