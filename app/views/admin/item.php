<?php
$title = 'Chi tiết sách';
if (isset($_GET["Id"])) {
    $ItemId = $_GET["Id"];
}
?>
<?php
require_once 'lib/database.php';
require_once 'app/controllers/AdminController.php';
?>
<header>
    <?php
    include 'app/views/shared/header.php';
    ?>

</header>
<?php
// item.php - Trang chi tiết sách
// $book là biến được truyền từ controller
// $book = new Sach();
// $book->Id = 1;

// item.php - Trang chi tiết sách

global $conn;
$admin = new AdminController($conn);
$sach = $admin->Detail(1);

// Kiểm tra xem $sach có phải là null không
if($sach == null) {
    // Nếu không phải null, hiển thị Id của sách
    echo "Không tìm thấy sách";
}


?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Chi tiết sách</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sách</th>
                        <th>Nhà xuất bản</th>
                        <th>Tác giả</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $sach->Id ?></td>
                        <td><?= $sach->TenSach ?></td>
                        <td><?= $sach->nxb ?></td>
                        <td><?= $sach->Tacgia ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<footer>
    <?php
    include 'app/views/shared/footer.php';
    ?>
</footer>

