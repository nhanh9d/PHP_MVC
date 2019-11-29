<?php

class Dashboard extends Controller {

    /*
     * http://localhost/dashboard
     */
    function Index () {

          $bookModel = $this->model('book');

          $viewData = array(
              'books' => $bookModel->getAllBooks()
          );

          $this->view('template/header');
          $this->view('dashboard/index', $viewData);
          $this->view('template/footer');

    }

    /*
     * http://localhost/dashboard/subpage/[$parameter]
     */
    function subpage ($parameter = '') {

        $viewData = array(
            'parameter' => $parameter
        );

        $this->view('template/header');
        $this->view('dashboard/subpage', $viewData);
        $this->view('template/footer');

    }

}

?>
