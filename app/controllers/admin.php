<?php

class Admin extends Controller {

  /*
  * http://localhost/dashboard
  */
  function Index () {

    if (!isset($_SESSION['admin'])) {

      header('Location: /admin/login');

    } else {

      $this->view('template/admin/header');
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

    $result = $this->model('admin')->getAdmin($username,$password);
    print_r($result);
    // if(!is_null($result)){
    //   print_r($result);
    //   $_SESSION['admin'] = $result;
    //   header('Location: /admin');
    // }
    // else{
    //   $viewData = array(
    //     'noUserFound' => 'noUserFound'
    // );
    //   $this->view('admin/login', $viewData);
    // }
  }

  /*
  * http://localhost/dashboard/subpage/[$parameter]
  */
  function subpage ($parameter = '') {

    $viewData = array(
      'parameter' => $parameter
    );

    $this->view('template/admin/header');
    $this->view('admin/subpage', $viewData);
    $this->view('template/admin/footer');

  }
 function Logout () {

     $_SESSION['admin'] = null;
     //session_unset();
     header('Location: /');

 }

}

?>
