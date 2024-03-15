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
$sach = $admin->getAllBooks();
?>
<div>
    <a href="/Admin/Create">Thêm sản phẩm mới</a>
    <h2>Danh sách sản phẩm</h2>
    <select class="form-select" id="SortDrop" name="SortDrop" onchange="Sort()">
        <option value="">Sắp xếp</option>
        <option value="Id">Mã</option>
        <option value="Price">Giá</option>
        <option value="Name">Tên</option>
    </select>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Mã sản phẩm</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Giá</th>
            <th scope="col">Loại</th>
            <th scope="col">Mô tả</th>

            <th scope="col">Hình ảnh</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($sach as $item){
            echo '<tr>';
            echo '<td>'.htmlspecialchars($item->Id).'</td>';
            echo '<td>'.htmlspecialchars($item->TenSach).'</td>';
            echo '<td>'.htmlspecialchars($item->Tacgia).'</td>';
            echo '<td>'.htmlspecialchars($item->nxb).'</td>';
            echo '<td>
                    <a href="/item?Id='.$item->Id.'">Chi tiết</a>
                   </td>
            <td><a href="/Admin/Edit/'.$item->Id.'">Sửa</a></td>
            <td><a href="/Admin/Delete/'.$item->Id.'">Xóa</a></td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>
<footer>
    <?php
    include 'app/views/shared/footer.php';
    ?>
</footer>
<script>
    function Sort()
    {
        var sort = document.getElementById("SortDrop").value;
        window.location.href = "/Home/Index?sort=" + sort;
    }

</script>