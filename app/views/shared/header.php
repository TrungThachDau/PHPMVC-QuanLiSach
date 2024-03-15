<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">QL Sách</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link text-dark" >Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/tat-ca-san-pham">Danh sách sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/quyen-rieng-tu">Quyền riêng tư</a>
                        </li>
                        <li>
                            <?php
                            if (isset($_SESSION['username'])) {
                                echo'<a>Xin chào, '.$_SESSION['username'].'!</a>';
                                echo '<a class="nav-link text-dark" href="/admin/logout">Đăng xuất</a>';
                            } else {
                                echo '<a class="nav-link text-dark" href="/login">Đăng nhập</a>';
                            }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- <script src="~/lib/jquery/dist/jquery.min.js"></script>
    <script src="~/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="~/js/site.js" asp-append-version="true"></script>
    @await RenderSectionAsync("Scripts", required: false) -->
</body>
</html>

