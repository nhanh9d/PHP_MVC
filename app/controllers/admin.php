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
    if(!is_null($result)){
      $_SESSION['admin'] = $result;
      header('Location: /admin');
    }
    else{
      $viewData = array(
        'noUserFound' => 'noUserFound'
    );
      $this->view('admin/login', $viewData);
    }
  }
 function doLogout () {

     $_SESSION['admin'] = null;
     //session_unset();
     header('Location: /admin/login');

 }

}

?>
