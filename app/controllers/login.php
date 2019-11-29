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
        $username = $_POST['username'];
        $password = $_POST['password'];

        $userModel = $this->model('user');
        $result = $userModel->getUser($username,$password);
        if(!is_null($result)){
            print_r($result);
            $_SESSION['client'] = $result;
            header('Location: /');
        }
    }

    function register(){

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
