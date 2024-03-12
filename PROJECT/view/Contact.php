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
    <link rel="stylesheet" href="/PROJECT/css/Contact.css">
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
                <p><b>Liên hệ</b></p>
            </div>
            <div class="contact">
                <div class="banner_contact">
                    <p>
                        <span>T</span>
                        <span>L</span>
                        <span>M</span>
                        <span>B</span>
                    </p>
                </div>
                <div class="content_contact">
                   <b>Contact US</b>
                   <p>Chúng tôi luôn nỗ lực mỗi ngày để mang đến cho khách hàng những sản phẩm và dịch vụ tốt nhất.
                </p>
                <p><b>Thời gian làm việc:</b> Thứ Hai - Chủ Nhật, 10:00 AM - 9:00 PM</p>
                <b>Các kênh liên hệ:</b>
                <ul>
                    <li>Hotline chăm sóc khách hàng: 037 35 322 73</li>
                    <li>Hotline mua hàng: 037 35 322 73</li>
                    <li>Email: jumrk03@gmail.com</li>
                    <li>Danh sách cửa hàng: Hệ thống cửa hàng tại 109 phạm như xương-Đà nẵng</li>
                    <li>Mạng xã hội: <a href="https://www.facebook.com/jumrk03/"><u>Facebook</u></a>- <a href="https://www.instagram.com/jumr.t03/"><u>Instagram</u></a>-<a href="https://zaloapp.com/qr/p/1t6i0w2el3sp3?src=qr"><u>Zalo</u></a>-<a href="https://www.tiktok.com/@jk_sp03?_t=8hN3nxodAAb&_r=1"><u>Tiktok</u></a></li>
                </ul>
                <p>Mọi thắc mắc xin liên hệ chúng tôi sẽ phục vụ quý khách một cách tốt nhất.</p>
                <p>Xin chân thành cảm ơn!</p>
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