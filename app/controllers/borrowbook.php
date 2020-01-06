<?php

class BorrowBook extends Controller {

    function Index(){
      if (isset($_SESSION['client'])) {
        $borrowBookModel = $this->model('BorrowBookModel');
        $userId = $_SESSION['client']['user_id'];
                $viewData = array(
                    'listBorrow' => $borrowBookModel->getBorrowBookList($userId)
                );

        $this->view('template/header');
        $this->view('borrowbook/list', $viewData);
        $this->view('template/footer');
      }
      else{
        header('Location: /');
      }
    }

    function BorrowNewBook()
    {
      if (isset($_POST['startDate'])) {
        $startDate = $_POST['startDate'];
      }
      if (isset($_POST['endDate'])) {
        $endDate = $_POST['endDate'];
      }
      if (isset($_POST['bookId'])) {
        $bookId = $_POST['bookId'];
      }
      $message = '';
      if (!isset($_SESSION['client'])) {
        $message = 'Cần đăng nhập để thuê sách';
      }
      else if(!is_null($startDate) && !is_null($endDate) && !is_null($bookId) && !is_null($_SESSION['client']))
      {
        $borrowBookModel = $this->model('BorrowBookModel');
        $userId = $_SESSION['client']['user_id'];

        $bookCount = $borrowBookModel->checkBookStatus($startDate, $endDate, $bookId, $userId);

        if ($bookCount == 0) {
          $isSuccess = $borrowBookModel->borrowNewBook($startDate, $endDate, $bookId, $userId);
          if ($isSuccess) {
            $message = 'Đặt sách thành công';
          }
          else{
            $message = 'Đặt sách không thành công';
          }
        }
        else{
          $message = 'Quyển này đã được đặt thuê.';
        }

        // if ($isBorrowed) {
        //   $message = 'Quyển này đã được bạn thuê';
        // }
        // else{
        //   $borrowBookModel->borrowNewBook($startDate, $endDate, $bookId, $userId);
        // }
      }
      print_r($message);
    }

    function ExtendBorrowBook()
    {
      $message = '';
      if (isset($_POST['endDate'])) {
        $endDate = $_POST['endDate'];
      }
      if (isset($_POST['bookId'])) {
        $bookId = $_POST['bookId'];
      }
      $message = '';
      if (!isset($_SESSION['client'])) {
        $message = 'Cần đăng nhập để gia hạn';
      }
      else if(!is_null($endDate) && !is_null($bookId) && !is_null($_SESSION['client']))
      {
        $borrowBookModel = $this->model('BorrowBookModel');
        $userId = $_SESSION['client']['user_id'];

          $isSuccess = $borrowBookModel->ExtendBorrowBook($endDate, $bookId, $userId);
          if ($isSuccess) {
            $message = 'Gia hạn thành công';
          }
          else{
            $message = 'Gia hạn không thành công';
          }
        }
      print_r($message);
    }

  }

  ?>
