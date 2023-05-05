<?php
$open = "contact";
require_once __DIR__."/../../autoload/autoload.php";

//$user = $db->fetchAll("users");
//
//$sql = "SELECT users.* FROM users ORDER BY ID DESC ";
$sql = "SELECT * FROM contact ORDER BY id DESC";
//$product = $db->fetchAll("product");
$contact = $db->fetchsql($sql);
?>
<?php require_once __DIR__."/../../layouts/header.php"; ?>


    <!--Nội dụng-->
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active">User</li>
        </ol>
        <!-- End.Breadcrumbs-->
        <div class="admin-title-top">
            <h1>Tài khoản khách hàng</h1>
        </div>
        <div class="clearfix"></div>
        <!--Thông báo lỗi    -->
        <?php require_once __DIR__."/../../../partials/notification.php"; ?>
        <div class="admin-content">
            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Tài khoản</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Xử lý</th>
                                <th>Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 1; foreach ($contact as $item): ?>
                                <tr>
                                    <td><?php echo $stt ?></td>
                                    <td><?php echo $item['name'] ?></td>
                                    <td><?php echo $item['phone'] ?></td>
                                    <td><?php echo $item['email'] ?></td>
                                    <td>
                                        <a class="btn btn-xs <?php echo $item['home'] == 0 ? 'btn-danger' : 'btn-success' ?>" href="status.php?id=<?php echo $item['id'] ?>">
                                            <?php echo $item['home'] == 0 ? 'Chưa xử lý' : 'Đã xử lý' ?>
                                        </a>
                                    </td>
                                    <td>
                                        <ul class="list-action">
                                            <li class="item-edit">
                                                <a href="view.php?id=<?php echo $item['id'] ?>" title="Xem chi tiết">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </li>
                                            <li class="item-delete">
                                                <a href="delete.php?id=<?php echo $item['id'] ?>" title="Xóa">
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