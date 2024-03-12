<?php
include("/xampp/htdocs/PROJECT/libs/helper.php");
db_connect();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM customers WHERE User_name = '$name'" ;
    $result = $mysqli->query($sql);
    if($result->num_rows > 0){
        if($password == $result->fetch_assoc()["CustomersPassword"]){
          session_start();
          $_SESSION['customersName'] = $name;
          echo '<script> alert("Đăng nhập thành công"); </script>';
          echo'<script> window.location.href="/PROJECT/Index.php"; </script>';
          exit;
        }else{
            echo '<script> alert("Nhập sai mật khẩu!"); </script>';
            echo '<script> window.history.back(); </script>';
            exit;
        }
    }else{
        echo '<script> alert("Tên người dùng chưa được đăng ký!"); </script>';
        echo '<script> window.history.back(); </script>';
        exit;
    }
}

db_disconnect();

?>