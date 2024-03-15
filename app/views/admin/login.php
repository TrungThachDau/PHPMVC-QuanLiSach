<?php
require_once 'lib/database.php';
?>
<header>
    <?php

    include 'app/views/shared/header.php';
    ?>

</header>
<?php
    global $conn;
    if (isset($_POST['sub'])) {
        $name = $_POST['username'];
        $pass = $_POST['password'];
        $sql = "SELECT * FROM TaiKhoan WHERE username = '$name' AND password = '$pass'";
        $stmt = sqlsrv_query($conn, $sql);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
        if (sqlsrv_has_rows($stmt) != 1) {
            echo '<script>alert("Sai tên đăng nhập hoặc mật khẩu")</script>';
        } else {
            $_SESSION['username'] = $name;
            header('Location: /');
        }
    }
?>
<section class="vh-100 gradient-custom">
    <div class="container py-0 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <form class="card bg-dark text-white" style="border-radius: 1rem;" method = "post" action = "">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                            <p class="text-white-50 mb-5">Please enter your login and password!</p>

                            <div class="form-outline form-white mb-4">
                                <input type="text" id="form12" class="form-control form-control-lg" placeholder="Username" name="username" required/>
                                <?php
                                if(!empty($err['username']['required'])){
                                    echo '<span style = "color:red">'
                                        .$err['username']['required'].'</span>';
                                }
                                ?>

                            </div>

                            <div class="form-outline form-white mb-4">
                                <input type="password" id="typePasswordX" class="form-control form-control-lg" placeholder="Password" name="password" required/>
                                <?php
                                if(!empty($err['password']['required'])){
                                    echo '<span style = "color:red">'
                                        .$err['password']['required'].'</span>';
                                }
                                ?>
                            </div>
                            <button class="btn btn-outline-light btn-lg px-5" type="submit" name="sub">Login</button>

                        </div>
                        <a href="./quenmatkhau.php">Quên mật khẩu</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<footer>
    <?php
    include 'app/views/shared/footer.php';
    ?>
</footer>