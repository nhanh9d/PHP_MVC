<?php

class RequestBook extends Controller {

    function Index(){
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

    function acceptBookRequest(){
        $message = '';
        if (isset($_POST['requestId'])) {
            $requestId = $_POST['requestId'];
        }
        if (isset($_POST['title'])) {
            $title = $_POST['title'];
        }

        if(!empty($requestId) && !empty($title)){
            $requestBookModel = $this->model('RequestBookModel');
            $isSuccess = $requestBookModel->AcceptRequestBook($requestId, $title);
            if ($isSuccess) {
                $message = 'Thêm đầu sách thành công';
            }
            else{
                $message = 'Thêm đầu sách không thành công';
            }
        }
    }

    function declineBookRequest(){
        $message = '';
        if (isset($_POST['requestId'])) {
            $requestId = $_POST['requestId'];
        }

        if(!empty($requestId)){
            $requestBookModel = $this->model('RequestBookModel');
            $isSuccess = $requestBookModel->DeclineRequestBook($requestId);
            if ($isSuccess) {
                $message = 'Từ chối thêm đầu sách thành công';
            }
            else{
                $message = 'Từ chối thêm đầu sách không thành công';
            }
        }
    }
}

?>
