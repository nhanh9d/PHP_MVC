<?php

class FeedBack extends Controller {

    function Index(){}

    function AddFeedBack()
    {
      if (isset($_POST['title'])) {
        $title = $_POST['title'];
      }
      if (isset($_POST['content'])) {
        $content = $_POST['content'];
      }
      if (isset($_POST['bookId'])) {
        $bookId = $_POST['bookId'];
      }
      $message = '';
      if (!isset($_SESSION['client'])) {
        $message = 'Cần đăng nhập để phản hồi';
      }
      else if(!is_null($title) && !is_null($content) && !is_null($bookId) && !is_null($_SESSION['client']))
      {
        $FeedbackModel = $this->model('FeedbackModel');
        $userId = $_SESSION['client']['user_id'];

          $isSuccess = $FeedbackModel->AddFeedBack($title, $content, $bookId, $userId);
          if ($isSuccess) {
            $message = 'Phản hồi thành công';
          }
          else{
            $message = 'Phản hồi không thành công';
          }
        }

        // if ($isBorrowed) {
        //   $message = 'Quyển này đã được bạn thuê';
        // }
        // else{
        //   $borrowBookModel->borrowNewBook($startDate, $endDate, $bookId, $userId);
        // }
      print_r($message);
    }

}

?>
