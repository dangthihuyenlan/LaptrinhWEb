<?php
session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $otp = $_POST['OTP'];
    if($_SESSION['otp'] === $otp){
        echo'<script> alert("Xác thực thành công"); </script>';
        echo'<script> window.location.href="/PROJECT/view/Change_password.php"; </script>';
        exit();
    }else{
        echo'<script> alert("Sai OTP, Vui lòng nhập lại."); </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/PROJECT/css/Sign_up.css">
    <title>Đăng nhập TLMB</title>
</head>
<body>
    <nav>
        <p style="color: white;">Đồng hành cùng <label><a style="text-decoration: none; color:red;" href="/PROJECT/view/trangchu.php">TLMB</a></label> nâng cao trải nghiệm của bạn</p>
    </nav>
    <main>
        <div class="title_main">
            <p>The Last Mile Break</p>
        </div>
        <hr style="border-color:black;">
        <div class="user_main">
            <div class="title_user">
                <p>XÁC NHẬN OTP</p>
            </div>
            <div class="content_user">
                <form action="" method="post">
                    <div class="conten_form">
                        <div class="input_name_pass">
                        <input type="password" name="OTP" placeholder="Mã OTP" id="" required>
                        </div>
                        <div class="input_submit_reset">
                            <p><a href="/PROJECT/view/Login.php"><u>Quay về đăng nhập</a></p>
                            <input type="submit" value="Xác nhận">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>