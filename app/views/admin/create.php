<?php
require_once 'lib/database.php';
require_once 'app/controllers/AdminController.php';
?>

<header>
    <?php
    include 'app/views/shared/header.php';

    ?>
</header>

<div>
    <a> Thêm sách mới</a>
    <form method="post" class="w-50 m-auto" enctype='multipart/form-data'>
        <div class="mb-3">
            <label for="name" class="form-label">Name (*)</label>
            <input class="form-control" id="name" name="name" value="<?= $name ?>" /> <span class="text-danger fw-bold"><?= $nameErrors ?></span>
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Description (*)</label>
            <textarea class="form-control" id="desc" name="desc" rows="4"><?= $desc ?></textarea> <span class="text-danger fw-bold"><?= $descErrors ?></span>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price (*)</label>
            <input class="form-control" id="price" name="price" type="number" value="<?= $price ?>" /> <span class="text-danger fw-bold"><?= $priceErrors ?></span>
        </div>
        <div class="mb-3">
            <label for="file">Image file</label>
            <input class="form-control" id="file"type="file" name="file" />
        </div>
        <h5>Chọn Loại Sản Phẩm</h5>
        <?php foreach ($categories as $cate) : ?>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="category" id="category<?= $cate->id ?>" value="<?= $cate->id ?>">
                <label class="form-check-label" for="category<?= $cate->id ?>">
                    <?= $cate->name ?>
                </label>
            </div>
        <?php endforeach; ?>
        <button type="submit" class="btn btn-primary">Add new</button>
    </form>
</div>
<footer>
    <?php
    include 'app/views/shared/footer.php';
    ?>
</footer>