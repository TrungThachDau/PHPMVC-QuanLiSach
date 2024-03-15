<?php

require_once 'lib/database.php';
require_once 'app/models/Sach.php';
 class AdminController
 {
        private $conn;
        public function __construct($conn)
        {
            $this->conn = $conn;
        }
//        public function login()
//        {
//            global $conn;
//            if (isset($_POST['sub'])) {
//                $name = $_POST['username'];
//                $pass = $_POST['password'];
//                $sql = "SELECT * FROM TaiKhoan WHERE username = '$name' AND password = '$pass'";
//                $stmt = sqlsrv_query($conn, $sql);
//
//                if ($stmt === false) {
//                    die(print_r(sqlsrv_errors(), true));
//                }
//                if (sqlsrv_has_rows($stmt) != 1) {
//                    echo '<script>alert("Sai tên đăng nhập hoặc mật khẩu")</script>';
//                } else {
//                    $_SESSION['username'] = $name;
//                    header('Location: /');
//                }
//            }
//        }
        public function logout()
        {
            session_destroy();
            header('Location: /');
        }
        public function allitem()
        {
            global $conn;
            $sql = "SELECT * FROM Sach";
            $stmt = sqlsrv_query($conn, $sql);
            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }
            $sach = [];
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $sach[] = $row;
            }
            require_once 'app/views/admin/all-item.php';
        }
     public function getAllBooks()
     {

         $query = "SELECT Sach.Id, Sach.TenSach, Sach.nxb, TacGia.TenTacGia FROM Sach JOIN TacGia ON Sach.Tacgia = TacGia.Id";
         $stmt = sqlsrv_query($this->conn, $query);
         if ($stmt === false) {
             die(print_r(sqlsrv_errors(), true));
         }

         $books = [];

         while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
             $book = new Sach();
             $book->Id = $row['Id'];
             $book->TenSach = $row['TenSach'];
             $book->nxb = $row['nxb'];
             $book->Tacgia = $row['TenTacGia'];
             $books[] = $book;
         }

         return $books;
     }
     public function Detail($Id)
     {
//         $query = "SELECT * FROM Sach WHERE Id = $Id";
//            $stmt = sqlsrv_query($this->conn, $query);
//            if ($stmt === false) {
//                die(print_r(sqlsrv_errors(), true));
//            }
//            $book = new Sach();
//            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
//                $book->Id = $row['Id'];
//                $book->TenSach = $row['TenSach'];
//                $book->nxb = $row['nxb'];
//                $book->Tacgia = $row['Tacgia'];
//
//            }
//            return $book;
// Sử dụng prepared statement để tránh SQL Injection
         $query = "SELECT * FROM Sach WHERE Id = 1";
         $params = array($Id);
         $stmt = sqlsrv_query($this->conn, $query, $params);

         if ($stmt === false) {
             die(print_r(sqlsrv_errors(), true));
         }

         // Kiểm tra xem có kết quả trả về không
         if(sqlsrv_has_rows($stmt)) {

             while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                 $book = new Sach();
                 $book->Id = $row['Id'];
                 $book->TenSach = $row['TenSach'];
                 $book->nxb = $row['nxb'];
                 $book->Tacgia = $row['Tacgia'];
             }
             return $book;
         } else {
             echo "Không tìm thấy sách.";
         }
     }
        public function create()
        {
            $query = "SELECT * FROM LoaiSach";
            $stmt = sqlsrv_query($this->conn, $query);
            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }
            $categories = [];
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $categories[] = $row;
            }
            if($_SERVER['REQUEST_METHOD']==='POST')
            {
                $book = new Sach();
                $book->TenSach = $_POST['TenSach'];
                $book->nxb= $_POST['nxb'];
                $book->Tacgia = $_POST['Tacgia'];

                $query = "INSERT INTO Sach (TenSach, nxb, Tacgia) VALUES (?, ?, ?)";
                $params = array($book->TenSach, $book->nxb, $book->Tacgia);
                $stmt = sqlsrv_query($this->conn, $query, $params);
                if ($stmt === false) {
                    die(print_r(sqlsrv_errors(), true));
                }
                header('Location: /admin/tat-ca-san-pham');

            }

        }
 }
?>

