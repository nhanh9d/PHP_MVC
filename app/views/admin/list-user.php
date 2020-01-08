<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách người dùng
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Danh sách người dùng</li>
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
                                    <th>Tên đăng nhập</th>
                                    <th>Họ</th>
                                    <th>Tên</th>
                                    <th>Trạng thái</th>
                                </tr>
                                <?php foreach($listUser as $key => $value){ ?>
                                    <tr>
                                        <td><?php echo $value['user_id'] ?></td>
                                        <td><?php echo $value['username'] ?></td>
                                        <td><?php echo $value['firstname'] ?></td>
                                        <td><?php echo $value['lastname'] ?></td>
                                        <?php if($value['status'] == 1){ ?>
                                            <td><span class="label label-success">Đang hoạt động</span></td>
                                        <?php } ?>
                                        <?php if($value['status'] == 2){ ?>
                                            <td><span class="label label-warning">Ngừng hoạt động</span></td>
                                        <?php } ?>
                                        <?php if($value['status'] == 3){ ?>
                                            <td><span class="label label-danger">Cấm sử dụng</span></td>
                                        <?php } ?>
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
                <h4 class="modal-title">Thêm người dùng</h4>
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
<script src="/public/admin/javascripts/user.js"></script>
