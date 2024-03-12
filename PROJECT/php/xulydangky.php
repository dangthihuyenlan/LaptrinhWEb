<?php
include("/xampp/htdocs/PROJECT/libs/helper.php");
   db_connect();
   if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $Check_password = $_POST['check_password'];


    $sql = "SELECT * FROM customers WHERE User_name = '$name' ";
    $result = $mysqli->query($sql);
    
    if ($result->num_rows > 0) {
        echo '<script>alert("Tên người dùng đã tồn tại"); </script>';
        echo '<script> window.history.back(); </script>';
        exit;
    }else{
        if($Check_password == $Password){
        $sql = "INSERT INTO customers VALUES ('','$name','', '$Password' ,'$Email','')";
        $result = $mysqli->query($sql);
        if($result){
            echo '<script>alert("Đăng ký thành công"); </script>';
            echo '<script> window.location.href = "/PROJECT/view/Login.php"; </script>';
            exit;
        }else{
            echo '<script>alert("Đăng ký không thành công"); </script>';
        }
    }else{
        echo '<script>alert("Vui lòng xác nhận mật khẩu chính xác!"); </script>';
        echo '<script> window.history.back(); </script>';
        exit;
    }
  }
}
?>