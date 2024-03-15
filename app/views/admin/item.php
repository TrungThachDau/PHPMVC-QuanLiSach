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
global $conn;
$admin = new AdminController($conn);
$sach = $admin->Detail($ItemId);

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

