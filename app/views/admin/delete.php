<?php
require_once 'lib/database.php';
require_once 'app/controllers/AdminController.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete Book</title>
</head>
<body>
    <h1>Delete Book</h1>
    
    <?php
    // Check if the book ID is provided
    if (isset($_GET['Id'])) {
        $bookId = $_GET['Id'];
        global $conn;
        $admin = new AdminController($conn);

        // Check if the form is submitted
        if(isset($_POST['confirm_delete'])) {
            $sach = $admin->deleteBooks($bookId);

            // Display a success message
            echo "<p>Book with ID $bookId has been deleted successfully.</p>";
        } else {
            // Display a confirmation form
            echo "<form method='POST'>
                    <p>Are you sure you want to delete the book with ID $bookId?</p>
                    <input type='submit' name='confirm_delete' value='Yes, delete it'>
                  </form>";
        }
    } else {
        // Display an error message if the book ID is not provided
        echo "<p>Error: Book ID is missing.</p>";
    }
    ?>
    
    <a href="/tat-ca-san-pham">Go back to book list</a>
</body>
</html>