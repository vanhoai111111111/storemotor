<?php
$open = "categoryPost";
require_once __DIR__."/../../autoload/autoload.php";

// Lấy tên danh mục tin tức
$category = $db->fetchAll("category_post");

?>
<?php require_once __DIR__."/../../layouts/header.php"; ?>


    <!--Nội dụng-->
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active">Danh mục tin tức</li>
        </ol>
        <!-- End.Breadcrumbs-->
        <div class="admin-title-top">
            <h1>Danh mục tin tức</h1>
        </div>
        <!-- End. admin-title-top   -->
        <div class="button-custom">
            <a class="btn-add" href="add.php"><i class="fa fa-plus"></i> Thêm mới</a>
        </div>
        <!--End.button-custom    -->
        <div class="clearfix"></div>
        <!--Thông báo lỗi    -->
        <?php require_once __DIR__."/../../../partials/notification.php"; ?>

        <div class="admin-content">
            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Danh mục tin tức</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên danh mục</th>
                                <th>Slug</th>
                                <th>Home</th>
                                <th>Ngày tạo</th>
                                <th>Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 1; foreach ($category as $item): ?>
                                <tr>
                                    <td><?php echo $stt ?></td>
                                    <td><?php echo $item['name'] ?></td>
                                    <td><?php echo $item['slug'] ?></td>
                                    <td>
                                        <a class="btn <?php echo $item['home'] == 1 ? 'btn-success' : 'btn-danger' ?>" href="home.php?id=<?php echo $item['id'] ?>">
                                            <?php echo $item['home'] == 1 ? 'Active' : 'Pause' ?>
                                        </a>
                                    </td>
                                    <td><?php echo $item['created_at'] ?></td>
                                    <td>
                                        <ul class="list-action">
                                            <li class="item-edit">
                                                <a href="edit.php?id=<?php echo $item['id'] ?>" title="Chỉnh sửa danh mục">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </li>
                                            <li class="item-delete">
                                                <a href="delete.php?id=<?php echo $item['id'] ?>" title="Xóa danh mục">
                                                    <i class="fa fa-trash-alt"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <?php $stt++ ; endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">Đồ án tốt nghiệp - Sinh Viên: Tạ Mạnh Tiền</div>
            </div>
        </div>
        <!--End.admin-content-->
    </div>
    <!--End.container-fluid-->


<?php require_once __DIR__."/../../layouts/footer.php"; ?>