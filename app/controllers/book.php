<?php

class Book extends Controller {

    /*
     * http://localhost/dashboard
     */
    function Index () {
          $bookModel = $this->model('BookModel');
          $bookAlias = $this->params[2];
          $response = $bookModel->getBook($bookAlias);
          $book = null;
          if (!is_null($response)) {
            $book = $response[0];
          }
          $viewData = array(
              'bookDetail' => $book
          );

          $this->view('template/header');
          $this->view('book/detail', $viewData);
          $this->view('template/footer');
    }

    /*
     * http://localhost/dashboard/subpage/[$parameter]
     */
    function Category ($parameter = '') {

        $viewData = array(
            'parameter' => $parameter
        );

        $this->view('template/header');
        $this->view('dashboard/subpage', $viewData);
        $this->view('template/footer');

    }

}

?>
