<?php
// Xoá toàn bộ các biến session
session_start();
if (isset($_SESSION["customersName"])){
    session_unset();
    session_destroy();
    echo '<script> alert("Đăng xuất thành công!"); </script>';
    echo '<script> window.location.href = "/PROJECT/Index.php";</script>';
    exit; 
}
?>