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

    function addNewBook(){
        $isUploadedCover = $this->uploadImage("add-cover_image");
        $isUploadedAva = $this->uploadImage("add-subclass_3");
        if ($isUploadedCover != "Success") {
            print_r($isUploaded);
        }
        else if($isUploadedAva != "Success"){
            print_r($isUploadedAva);
        }
        else{
            $cover_image = $_FILES["add-cover_image"]["name"];
            $subclass_3 = $_FILES["add-subclass_3"]["name"];
            if (isset($_POST['add-title'])) {
                $title = $_POST['add-title'];
            }
            if (isset($_POST['add-author'])) {
                $author = $_POST['add-author'];
            }
            if (isset($_POST['add-publisher_name'])) {
                $publisher_name = $_POST['add-publisher_name'];
            }
            if (isset($_POST['add-isbn_no'])) {
                $isbn_no = $_POST['add-isbn_no'];
            }
            if (isset($_POST['add-description'])) {
                $description = $_POST['add-description'];
            }
            if (!empty($title)) {
                $bookModel = $this->model('BookModel');
                $result = $bookModel->addNewBook($title, $author, $publisher_name, $isbn_no, $description, $cover_image, $subclass_3);
                if ($result == 1) {
                    print_r('Thêm đầu sách thành công');
                }
                else{
                    print_r('Thêm đầu sách không thành công');
                }

            }
            else{
                print_r('Tiêu đề sách không được để trống');
            }
        }
    }
    private function uploadImage($filename){
        if(isset($_FILES[$filename]["type"]))
        {
            $validextensions = array("jpeg", "jpg", "png");
            $temporary = explode(".", $_FILES[$filename]["name"]);
            $file_extension = end($temporary);
            if ((($_FILES[$filename]["type"] == "image/png") || ($_FILES[$filename]["type"] == "image/jpg") || ($_FILES[$filename]["type"] == "image/jpeg")) && ($_FILES[$filename]["size"] < 100000) && in_array($file_extension, $validextensions)) {
                if ($_FILES[$filename]["error"] > 0)
                {
                    return "Return Code: " . $_FILES[$filename]["error"] . "<br/><br/>";
                }
                else
                {
                    if (file_exists("//image/" . $_FILES[$filename]["name"])) {
                        return $_FILES[$filename]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
                    }
                    else
                    {
                        $sourcePath = $_FILES[$filename]['tmp_name']; // Storing source path of the file in a variable
                        $targetPath = "//image/".$_FILES[$filename]['name']; // Target path where file is to be stored
                        move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
                        return "Success";
                    }
                }
            }
            else
            {
                return "<span id='invalid'>***Invalid file Size or Type***<span>";
            }
        }
    }
}

?>
