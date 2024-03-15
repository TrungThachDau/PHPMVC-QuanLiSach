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
$tacgia = $admin->getAllAuthors();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $admin->createBooks($_POST);
}
?>
<div class="container">

    <h3>Thêm sách mới</h3>
    <form action="/admin/create" method="post">
        <div class="form-group">
            <label class="form-label" for="TenSach">Tên sách:</label>
            <input class="form-control" placeholder="Nhập tên sách" type="text" id="TenSach" name="TenSach" required><br>
        </div>
        <div class="form-group">
            <label for="nxb">Nhà xuất bản:</label>
            <input type="text" class="form-control" id="nxb" name="nxb" required><br>
        </div>
        <!-- Dropdown danh sách loại sách -->
        <label for="Tacgia">Tác giả:</label>
        <select class="form-select" id="Tacgia" name="Tacgia">
            <?php foreach ($tacgia as $tacgia): ?>
                <option value="<?php echo $tacgia['Id']; ?>"><?php echo $tacgia['TenTacGia']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <input type="submit" value="Thêm sách">
    </form>
</div>
<footer>
    <?php
    include 'app/views/shared/footer.php';
    ?>
</footer>