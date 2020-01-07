<!-- Content Wrapper. Contains page content -->
<style>
.table>tbody>tr>td{vertical-align: middle;}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách đầu sách
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Danh sách đầu sách</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-default">
                    <div class="box-body">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-add">
                            <i class="fa fa-plus" style="padding-right:5px"></i>Thêm
                        </button>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                            <i class="fa fa-edit" style="padding-right:5px"></i>Sửa
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
                            <i class="fa fa-trash" style="padding-right:5px"></i>Xóa
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Tiêu đề</th>
                                    <th>Tác giả</th>
                                    <th>Nhà xuất bản</th>
                                    <th>Đường dẫn</th>
                                    <th>Thể loại</th>
                                    <th>Ảnh bìa</th>
                                    <th>Ảnh đại diện</th>
                                </tr>
                                <?php foreach($listBook as $key => $value){ ?>
                                    <tr>
                                        <td><?php echo $value['book_id'] ?></td>
                                        <td><?php echo $value['title'] ?></td>
                                        <td><?php echo $value['author'] ?></td>
                                        <td><?php echo $value['publisher_name'] ?></td>
                                        <td><?php echo $value['isbn_no'] ?></td>
                                        <td><?php echo $value['subject'] ?></td>
                                        <?php if (empty($value['cover_image'] )){ ?>
                                            <td><img src="/image/default-book-cover.png" height="60px" /></td>
                                        <?php } else{ ?>
                                            <td><img src="/image/<?php echo $value['cover_image'] ?>" height="60px" /></td>
                                        <?php }?>
                                        <?php if (empty($value['subclass_3'] )){ ?>
                                            <td><img src="/image/default-book-cover.png" height="60px" /></td>
                                        <?php } else{ ?>
                                            <td><img src="/image/<?php echo $value['subclass_3'] ?>" height="60px" /></td>
                                        <?php }?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Thêm đầu sách</h4>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Tên đăng nhập</label>
                                <input type="text" class="form-control" name="add-username" id="add-username" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Họ và tên</label>
                                <input type="text" class="form-control" name="add-fullname" id="add-fullname" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" name="add-password" id="add-password" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Nhắc lại mật khẩu</label>
                                <input type="password" class="form-control" name="add-confirm-password" id="add-confirm-password" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>

                    <!-- select -->
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select class="form-control" name="add-status" id="add-status">
                            <option value="1">Đang hoạt động</option>
                            <option value="2">Ngừng hoạt động</option>
                            <option value="3">Cấm sử dụng</option>
                        </select>
                    </div>

                    <div class="form-group has-success hidden">
                        <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> <span class="message success"></span></label>
                    </div>

                    <div class="form-group has-error hidden">
                        <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> <span class="message error"></span></label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <a type="submit" class="btn btn-primary" id="btn-add">Save changes</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- jQuery 3 -->
<script src="/public/admin/javascripts/book.js"></script>
