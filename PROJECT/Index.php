<?php
    session_start();

    if(isset($_SESSION["customersName"])){
        $name = $_SESSION["customersName"];
    }else{
        $name = "";
    }
    include"/xampp/htdocs/PROJECT/libs/helper.php";
    db_connect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/PROJECT/css/trangchu.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src= "/PROJECT/Js/Index.JS"></script>
    <title>The Last Mile Break</title>
</head>
<body>
    <div class="header">
    <div class="title_header">
            <p>Hello, I'm <span>TLMB </span>always bringing you perfection</p>
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
        <div class="page_home">
            <div class="main_img">
                <div class="img">
                    <img src="/PROJECT/images/img1.png" alt="anh1">
                    <img src="/PROJECT/images/img2.png" alt="anh2">
                    <img src="/PROJECT/images/img3.png" alt="anh2">
                </div>
            </div>
            <div class="main_content_home">
                <div class="content_1">
                    <div class="text_1">
                        <div class="content_text_1">
                            <hr>
                            <h2>SẢN PHẨM</h2>
                            <hr>
                            <p>Tập hợp top những sản <br> phẩm của các localbrand nổi <br> tiếng</p>
                            <a href="/PROJECT/view/cuahang.php"><u>Mua ngay</u></a>
                        </div>
                    </div>
                    <div class="img_1">
                        <img src="/PROJECT/images/img_1.png" alt="img_1">
                    </div>
                </div>
                <hr style="width: 90%; margin: auto; border-width: 2px; border-color: black;">
                <div class="content_1">
                    <div class="img_1" >
                        <img src="/PROJECT/images/home2.png" alt="img_1" style="width: 120%; margin-top: 200px; ">
                    </div>
                    <div class="text_1">
                        <div class="content_text_1" >
                            <hr>
                            <h2>CHẤT LƯỢNG</h2>
                            <hr>
                            <p>Mang đến cho khách hàng <br> sản phẩm cực kì tốt<br> và chất lượng.</p>
                        </div>
                    </div>
                </div>
                <hr style="width: 90%; margin: auto; border-width: 2px; border-color: black;">
                <div class="sanphamnew">
                    <div class="new_title">
                        <h2>SẢN PHẨM MỚI NHẤT</h2>
                    </div>
                   <div class="new_product">
                    <!-- product 1 -->
                    <?php
                     $sql = "Select * from product";
                       $result = $mysqli->query($sql);
                       $count = 0;
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                
                                $productID = $row['ProductID'];
                                $productName = $row['ProductName'];
                                $Price = $row['Product_price'];
                                $img_1 = $row['Img1'];
                                $groups = $row['Groups'];
                                $formattedPrice = number_format($Price, 0, ',', '.') . '.000₫';
                                echo '   <div class="product">'; 
                                echo '   <div class="conten_product">'; 
                                echo '   <div class="product_img">'; 
                                echo '       <img class="take_img" src="/PROJECT/images/anhao/'.$img_1.'" alt="">'; 
                                echo '   </div>'; 
                                echo '   <div class="product_name">'; 
                                echo '       <p class="take_name" >'.$productName.'</p>'; 
                                echo '   </div>'; 
                                echo '   <div class="product_price">'; 
                                echo '       <p class="take_price" >'.$formattedPrice.'</p>'; 
                                echo '   </div>'; 
                                echo '   <div class="product_submit">'; 
                                echo '   <div class="product_button">'; 
                                echo '       <p class="take_productID" style="display: none;" >'.$productID.'</p>';
                                echo '       <button onclick="view_product_1()">XEM CHI TIẾT SẢN PHẨM</button>'; 
                                echo '   </div>'; 
                                echo '   </div>'; 
                                echo '   </div>'; 
                                echo ' </div>'; 
                                $count++;

                                if($count >= 4){
                                    break;
                                }
                                
                            }
                        }
                    ?>
                   </div>
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
