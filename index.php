<?php
// index.php - Điểm khởi đầu của ứng dụng

// Khởi tạo session
//session_start();

// Lấy thông tin yêu cầu từ URL
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', $path);
// Phân tích yêu cầu và chuyển hướng đến controller phù hợp
switch ($path) {
    case '/':
        require __DIR__ . '/app/views/home/index.php';
        break;
    case '/login':
        require __DIR__ . '/app/views/admin/login.php';
        break;
    case '/tat-ca-san-pham':
        require __DIR__ . '/app/views/admin/all-item.php';
        break;
    case "/item":
        //kiem tra xem co id hay khong
        require __DIR__ . '/app/views/admin/item.php';
        break;
    case "/admin/logout":
        require __DIR__ . '/app/views/admin/logout.php';
        break;
    // Thêm các trường hợp khác tại đây
    default:
        http_response_code(404);
        require __DIR__ . '/app/views/404.php';
        break;

}

