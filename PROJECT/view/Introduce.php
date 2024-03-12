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
    <link rel="stylesheet" href="/PROJECT/css/Introduce.css">
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
                <p><b>Giới thiệu về The Last Mile Break</b></p>
            </div>
            <div class="introduce">
                <div class="content_introduce">
                    <div class="title">
                        <h3>
                            Chào mừng bạn đến với shop thời trang TLMB của chúng tôi
                        </h3>
                    </div>
                    <div class="content">
                        <p>
                            Chúng tôi tự hào là địa chỉ mua sắm trực tuyến hàng đầu cho các sản phẩm quần áo thời trang chất lượng cao. Với sự đa dạng và
                            <br>phong cách đa dạng, chúng tôi cam kết mang đến cho bạn những trải nghiệm mua sắm tuyệt vời và đáng nhớ.
                        </p>
                        <img src="/PROJECT/images/img_introduce1.png" alt="">
                        <p>
                            Tại cửa hàng của chúng tôi, bạn sẽ tìm thấy một bộ sưu tập đa dạng của các mặt hàng thời trang từ áo phông, áo sơ mi, áo khoác đến quần jeans, váy đầm và nhiều hơn nữa. Chúng tôi luôn cập nhật xu hướng mới nhất và mang đến cho bạn những sản phẩm phong cách nhất, từ những thương hiệu nổi tiếng đến các nhà thiết kế độc quyền.
                            <br>
                            <br>

Đội ngũ nhân viên tận tâm của chúng tôi sẽ luôn sẵn sàng hỗ trợ bạn trong quá trình mua sắm. Chúng tôi cam kết cung cấp các sản phẩm chất lượng cao, chất liệu tốt và kiểu dáng thời trang. Bạn có thể yên tâm rằng mỗi món đồ mà bạn chọn sẽ là một sự đầu tư tuyệt vời cho tủ đồ của bạn.
<br>
<br>

Chúng tôi hiểu rằng mua sắm trực tuyến là một trải nghiệm thuận tiện và chúng tôi cam kết cung cấp dịch vụ mua sắm trực tuyến an toàn và đáng tin cậy. Chúng tôi đảm bảo giao hàng nhanh chóng và đúng hẹn, cùng với chính sách đổi trả linh hoạt để đảm bảo sự hài lòng tuyệt đối của bạn.
<br>
<br>

Hãy tham quan cửa hàng trực tuyến của chúng tôi ngay bây giờ và khám phá thế giới thời trang đa dạng và phong cách. Chúng tôi hy vọng rằng bạn sẽ tìm thấy những sản phẩm ưa thích của mình và có một trải nghiệm mua sắm thú vị tại cửa hàng của chúng tôi.
                        </p>
                        <img src="/PROJECT/images/img_introduce2.png" alt="">
                        <p>Xin cảm ơn vì đã lựa chọn chúng tôi là điểm đến mua sắm trực tuyến của bạn. Hãy đặt niềm tin vào chúng tôi và chúng tôi sẽ không làm bạn thất vọng!</p>
                        <p class="thank">Thank You</p>
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