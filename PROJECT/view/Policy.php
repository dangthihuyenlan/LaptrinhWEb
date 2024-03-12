<?php
    session_start();

    if(isset($_SESSION["customersName"])){
        $name = $_SESSION["customersName"];
    }else{
        $name = "";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="/PROJECT/css/Policy.css">
    <title>Giới thiệu về TLMB</title>
</head>
<body>
    <div class="header">
        <div class="title_header">
                <p>Hello, I'm <span>TLMB</span>always bringing you perfection</p>
            </div>
            <div class="main_header">
                <div class="home">
                    <a href="/PROJECT/Index.php"><ion-icon name="home-outline"></ion-icon></a>
                </div>
                <div class="name_header">
                    <p>The Last Mile Break </p>
                </div>
                <div class="user_header">
                    <div class="icon_love">
                    <a href="/PROJECT/view/Favorite.php"><ion-icon name="heart-outline"></ion-icon></a>
                    </div>
                    <div class="icon_cart">
                        <a href="/PROJECT/view/Giohang.php"><ion-icon name="cart-outline"></ion-icon></a>
                    </div>
                    <div class="icon_user">
                    <?php if($name != ""){
                       echo'<a href="/PROJECT/view/Infor_user.php"><ion-icon name="person-outline"></ion-icon></a>';
                    }else{
                       echo ' <a href="/PROJECT/view/Login.php"><ion-icon name="person-add-outline"></ion-icon></a>';
                    }
                    ?>
                   
                </div>
                </div>
            </div>
        <hr>
        </div>
        <nav>
            <div class="link_nav">
                <div class="menu_SP">
                    <input type="checkbox" id="menu">
                    <label for="menu"><p>Sản phẩm ⇣</p></label>
                    <div class="menu">
                        <ul>
                        <li><a href="/PROJECT/view/Categories/cuahang.php">Tất cả</a></li>
                        <hr>
                        <li><a href="/PROJECT/view/Categories/Ao_polo.php">Áo POLO</a></li>
                        <hr>
                        <li><a href="/PROJECT/view/Categories/Ao_thun.php">Áo Thun</a></li>
                        <hr>
                        <li><a href="/PROJECT/view/Categories/Ao_hoodie.php">Áo Hoodie</a></li>
                        <hr>
                        <li><a href="/PROJECT/view/Categories/Ao_sweater.php">Áo Sweater</a></li>
                        <hr>
                        <li><a href="/PROJECT/view/Categories/Quan.php">Quần</a></li>
                        <hr>
                        </ul>
                    </div>
                </div>
                <a href="/PROJECT/view/Order_details.php">Thông tin đơn hàng</a>
                <a href="/PROJECT/view/Contact.php">Liên Hệ</a>
                <a href="/PROJECT/view/Policy.php">Chính sách</a>
                <a href="/PROJECT/view/Introduce.php">Về TLMB</a>
            </div>
        </nav>
        <hr>
        <main>
            <div class="link">
                <a href="/PROJECT/Index.php">Trang chủ</a>
                <p>/</p>
                <p><b>Chính sách của The Last Mile Break</b></p>
            </div>
            <div class="Policy">
                <div class="content_policy">
                    <div class="content_1">
                        <ul>
                            <li>Với khẩu hiệu “Bước đột phá cuối cùng”, TLMB hướng tới tập trung phát triển và nâng cấp dịch vụ và cải thiện mang đến những điều tốt đẹp nhất dành cho khách hàng để mang lại trải nghiệm nhanh chóng và tiện lợi đến bạn.</li>
                            <li>Giao hàng nhanh chóng, đúng hẹn, đúng điểm cho toàn bộ đơn hàng là những gì chúng mình sẽ làm được trong năm 2023 và tương lai sau này!</li>
                            <li>Hiện tại TLMB đang là đối tác lớn với đơn vị giao hàng nổi tiếng có uy tín GIAO HÀNG TIẾT KIỆM. Tụi mình hỗ trợ giao hàng trên toàn quốc và nước ngoài với chính sách giao hàng cụ thể như sau:</li>
                        </ul>
                    </div>
                    <div class="content_2">
                        <ul>
                            <li>Chính sách đổi/trả hàng trong vòng 30 ngày: Bạn có thể đổi hoặc trả hàng trong vòng 30 ngày kể từ ngày mua hàng. Đảm bảo sản phẩm không bị hư hỏng, vẫn còn nguyên nhãn mác và trong tình trạng ban đầu.
                            </li>
                            <li>Miễn phí đổi trả: Chúng tôi cam kết không tính phí đổi trả hàng. Bạn có thể trả hàng hoặc yêu cầu đổi size, màu sắc hoặc kiểu dáng một cách dễ dàng và tiện lợi.
                            </li>
                            <li>Hoàn tiền đầy đủ hoặc tín dụng mua hàng: Bạn có thể lựa chọn nhận hoàn tiền đầy đủ vào tài khoản của bạn hoặc nhận tín dụng mua hàng để sử dụng cho các lần mua sắm tiếp theo.
                            </li>
                            <li>Đổi hàng trực tuyến hoặc trực tiếp tại cửa hàng: Bạn có thể đổi trả hàng trực tuyến thông qua trang web của chúng tôi hoặc đến trực tiếp cửa hàng của chúng tôi để được hỗ trợ.</li>
                            <li>
                                Chăm sóc khách hàng 24/7: Đội ngũ chăm sóc khách hàng của chúng tôi luôn sẵn sàng hỗ trợ bạn với bất kỳ câu hỏi hoặc vấn đề nào liên quan đến việc đổi trả hàng.
                            </li>
                        </ul>
                    </div>
                    <div class="content_3">
                        <h3>Thời gian giao hàng</h3>
                        <ul>
                            <li>Đối với nội thành Đà Nẵng: Giao hàng trong 1 – 2 ngày (Không tính chủ nhật và các ngày lễ Tết).
                            </li>
                            <li>Đối với ngoại thành: Giao hàng trong 3-4 ngày (Không tính chủ nhật và các ngày lễ Tết).</li>
                            <li>Lưu ý: Thời gian có thể dao động thêm 3 -5 ngày đối với các đợt giảm giá lớn.
                            </li>
                        </ul>
                    </div>
                    <div class="content_4">
                        <h3>Kiểm tra tình trạng đơn hàng</h3>
                        <ul>
                            <li>
                                Bạn có thể truy cập vào Đơn hàng của tôi để kiểm tra trực tiếp tình trạng đơn hàng.
                            </li>
                            <li>Hoặc kiểm tra với bộ phận chăm sóc khách hàng của TLMB qua các trang Mạng xã hội (Facebook, Instgram, TikTok) hoặc Đường dây tiếp nhận phản hồi 123 456 789 bằng việc cung cấp cho tụi mình mã số đơn hàng, số điện thoại của bạn.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
        <footer class="footer">
    <div class="waves">
      <div class="wave" id="wave1"></div>
      <div class="wave" id="wave2"></div>
      <div class="wave" id="wave3"></div>
      <div class="wave" id="wave4"></div>
    </div>
    <ul class="social-icon">
      <li class="social-icon__item"><a class="social-icon__link" href="https://www.facebook.com/jumrk03">
          <ion-icon name="logo-facebook"></ion-icon>
        </a></li>
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-twitter"></ion-icon>
        </a></li>
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-linkedin"></ion-icon>
        </a></li>
      <li class="social-icon__item"><a class="social-icon__link" href="https://www.instagram.com/jumr.t03/">
          <ion-icon name="logo-instagram"></ion-icon>
        </a></li>
    </ul>
    <ul class="menu_footer">
      <li class="menu__item"><a class="menu__link" href="/PROJECT/Index.php">Home</a></li>
      <li class="menu__item"><a class="menu__link" href="/PROJECT/view/Introduce.php">About</a></li>
      <li class="menu__item"><a class="menu__link" href="/PROJECT/view/Policy.php">Services</a></li>
      <li class="menu__item"><a class="menu__link" href="/PROJECT/view/Contact.php">Contact</a></li>

    </ul>
    <p>&copy;2023 THE LAST MILE BREAK| DEDICATED TO YOU ™</p>
  </footer>
</body>
</html>