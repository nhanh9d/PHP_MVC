<?php

class RequestBook extends Controller {

    function Index(){
      // if (isset($_SESSION['client'])) {
      //   $requestBookModel = $this->model('RequestBookModel');
      //   $userId = $_SESSION['client']['user_id'];
      //           $viewData = array(
      //               'listRequest' => $requestBookModel->getRequestBookList($userId)
      //           );
      //
      //   $this->view('template/header');
      //   $this->view('requestbook/list', $viewData);
      //   $this->view('template/footer');
      // }
      // else{
      //   header('Location: /');
      // }
    }

    function RequestNewBook()
    {
      $message = '';
      if (isset($_POST['book_title'])) {
        $bookTitle = $_POST['book_title'];
      }
      if (isset($_POST['user_note'])) {
        $userNote = $_POST['user_note'];
      }
      if (!isset($_SESSION['client'])) {
        $message = 'Cần đăng nhập để yêu cầu thêm đầu sách';
      }
      else if(!is_null($bookTitle) && !is_null($_SESSION['client']))
      {
        $requestBookModel = $this->model('RequestBookModel');
        $userId = $_SESSION['client']['user_id'];

        $bookCount = $requestBookModel->CreateRequestBook($bookTitle, $userNote, $userId);

          $isSuccess = $requestBookModel->CreateRequestBook($bookTitle, $userNote, $userId);
          if ($isSuccess) {
            $message = 'Yêu cầu thêm đầu sách thành công';
          }
          else{
            $message = 'Yêu cầu thêm đầu sách không thành công';
          }

        // if ($isRequested) {
        //   $message = 'Quyển này đã được bạn thuê';
        // }
        // else{
        //   $requestBookModel->requestNewBook($startDate, $endDate, $bookId, $userId);
        // }
      }
      print_r($message);
    }

  }

  ?>
