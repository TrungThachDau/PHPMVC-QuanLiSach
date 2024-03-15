<?php
include 'app/views/shared/header.php';
include 'app/controllers/AdminController.php';
global $conn;
$admin = new AdminController($conn);
$tacgiaList = $admin->getAllAuthors();

if(isset($_GET['Id'])) {
    $BookId = $_GET['Id'];
    $book = $admin->Detail($BookId);
    if(isset($_POST['TenSach']) && isset($_POST['nxb']) && isset($_POST['Tacgia'])) {
        $admin->updateBooks($BookId, $_POST['TenSach'], $_POST['nxb'], $_POST['Tacgia']);
        header('Location: /tat-ca-san-pham');
    }
} else {
    echo "Error: Book ID is missing.";
    exit;
}
?>
</header>
<div>
<h3>Cập nhật sách</h3>
<form action="" method="POST">
    <div class="form-group">
        <label for="Id">Id</label>
        <input type="text" class="form-control" id="Id" name="Id" value="<?php echo $book->Id; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="TenSach">Tên sách</label>
        <input type="text" class="form-control" id="TenSach" name="TenSach" value="<?php echo $book->TenSach; ?>">
    </div>
    <div class="form-group">
        <label for="nxb">Nhà xuất bản</label>
        <input type="text" class="form-control" id="nxb" name="nxb" value="<?php echo $book->nxb; ?>">
    </div>
    <div class="form-group">
        <label for="Tacgia">Tác giả</label>
        <select class="form-control" id="Tacgia" name="Tacgia">
            <?php foreach ($tacgiaList as $tacgia): ?>
                <option value="<?php echo $tacgia['Id']; ?>" <?php if($tacgia['Id'] == $book->Tacgia) echo 'selected'; ?>><?php echo $tacgia['TenTacGia']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <input type="submit" value="Cập nhật sách">
</form>
</div>