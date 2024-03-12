<?php
include("/xampp/htdocs/PROJECT/libs/helper.php");
db_connect();
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
     $name = $_POST['name'];
     $email = $_POST['email'];
     $otp = generate_otp();
     $sql = "SELECT * FROM customers WHERE 
     User_name = '$name' and CustomersEmail = '$email'";
     $result = $mysqli->query($sql);

     if($result->num_rows > 0){
        send_email($email, $name, $otp);
        session_start();
        $_SESSION['otp'] = $otp;
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;
        header('Location: confirm_otp.php'); 
        exit ();
     }else{
        echo '<script> alert("Tên tài khoảng không có hoặc không chính xác!"); </script>';
        echo '<script> window.history.back(); </script>'; 
     }
   }
  


?>