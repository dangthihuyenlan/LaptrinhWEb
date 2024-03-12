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
                <p>QUÊN MẬT KHẨU</p>
            </div>
            <div class="content_user">
                <form action="/PROJECT/php/xulymail.php" method="post">
                    <div class="conten_form">
                        <div class="input_name_pass">
                            <input type="text" name="name" placeholder="Tên đăng nhập" id="" required> <br>
                            <input type="email" name="email" placeholder="email" id="" required> <br>
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