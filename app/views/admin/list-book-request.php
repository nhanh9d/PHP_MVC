<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Yêu cầu thêm đầu sách
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Yêu cầu thêm đầu sách</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên sách</th>
                                    <th>Yêu cầu bởi</th>
                                    <th>Mô tả</th>
                                    <th></th>
                                </tr>
                                <?php foreach($listBookRequest as $key => $value){ ?>
                                    <tr>
                                        <td><?php echo $value['book_request_id'] ?></td>
                                        <td><?php echo $value['book_title'] ?></td>
                                        <td><?php echo $value['username'] ?></td>
                                        <td><?php echo $value['user_note'] ?></td>
                                        <?php if($value['is_approved'] == 0){ ?>
                                            <td>
                                                <a href="#" class="label label-success btn-accept-request" data-request-id="<?php echo $value['book_request_id'] ?>" data-title="<?php echo $value['book_title'] ?>">Đồng ý</a>
                                                <a href="#" class="label label-warning btn-decline-request" data-request-id="<?php echo $value['book_request_id'] ?>">Từ chối</a>
                                            </td>
                                        <?php } ?>
                                        <?php if($value['is_approved'] == 1){ ?>
                                            <td><span class="label label-success">Đã thêm</span></td>
                                        <?php } ?>
                                        <?php if($value['is_approved'] == -1){ ?>
                                            <td><span class="label label-warning">Đã từ chối</span></td>
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
<!-- jQuery 3 -->
<script src="/public/admin/javascripts/borrowbook.js"></script>
