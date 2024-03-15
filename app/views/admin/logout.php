<?php
require_once 'lib/database.php';
require_once 'app/controllers/AdminController.php';
global $conn;
$admin = new AdminController($conn);
$admin->Logout();
session_start();
session_destroy();
header('Location: /login');
?>
