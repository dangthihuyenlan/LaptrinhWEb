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
                <p> MẬT KHẨU MỚI</p>
            </div>
            <div class="content_user">
                <form action="/PROJECT/php/xulypassword_new.php" method="post">
                    <div class="conten_form">
                        <div class="input_name_pass">
                            <input type="password" name="password" placeholder="Mật khẩu" id="" required> <br>
                            <input type="password" name="check_password" placeholder="Xác nhận mật khẩu" id="" required> <br>
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