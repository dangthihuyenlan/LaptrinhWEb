<?php 
include("/xampp/htdocs/PROJECT/libs/helper.php");
db_connect();
session_start();
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $password = $_POST['password'];
    $password_check = $_POST['check_password'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];

    $sql = "SELECT * FROM customers WHERE User_name = '$name' and CustomersEmail = '$email'";
    $result = $mysqli->query($sql);
    if($result->num_rows > 0){
        if($password_check == $password){
            $sql = "UPDATE customers set CustomersPassword = '$password' WHERE User_name = '$name' and CustomersEmail = '$email'";
            $result = $mysqli->query($sql);
            if($result){
               echo '<script> alert("Cập nhận mật khẩu mới thành công"); </script>';
               echo'<script> window.location.href = "/PROJECT/view/Login.php"; </script>';
               exit;
            }
        }else{
            echo '<script> alert("Vui lòng xác nhận mật khẩu chính xác!"); </script>';
        }
    }
  }
  db_disconnect();
?>