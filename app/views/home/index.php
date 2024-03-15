<?php
$serverName = "tcp:localhost,1433";
$connectionOptions = array("Database"=>"qlsach",
    "Uid"=>"sa", "PWD"=>"123");
$conn = sqlsrv_connect($serverName, $connectionOptions);
if($conn == false)
    {
        echo "Ket noi that bai";
        die(print_r(sqlsrv_errors(), true));
    }
else
    echo "Ket noi thanh cong";
?>
<header>
    <?php
    include 'app/views/shared/header.php';
    ?>
</header>
<div>
    Trang chủ
</div>
<footer>
    <?php
    include 'app/views/shared/footer.php';
    ?>
</footer>

