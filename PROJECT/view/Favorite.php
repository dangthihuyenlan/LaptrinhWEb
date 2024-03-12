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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="/PROJECT/Js/Index.JS"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="/PROJECT/css/Favorite.css">
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
                <p><b>Sản phẩm yêu thích</b></p>
            </div>
            <div class="Favorite">
                <div class="Content_Favorite">
                    <div class="content">
                        <div class="title">
                            <p>Đơn hàng bạn đã yêu thích </p><ion-icon name="heart-circle-outline"></ion-icon>
                        </div>
                        <div class="container">
                            <?php
                            include('/xampp/htdocs/PROJECT/libs/helper.php');
                            db_connect();
                            if($name != ''){
                               $CustomersID =  $mysqli->query("SELECT CustomersID from customers where User_name = '$name'")->fetch_assoc()['CustomersID'];
                               $result = $mysqli->query("SELECT * FROM Favorite where CustomersID = '$CustomersID'");
                               if($result->num_rows > 0){
                                    $sql = "SELECT * FROM favorite inner join product on favorite.ProductID = product.ProductID where CustomersID = '$CustomersID'";
                                    $result_product = $mysqli->query($sql);
                                    if($result_product->num_rows > 0){
                                        while($row = $result_product->fetch_assoc()){
                                            $FavoriteID = $row['FavoriteID'];
                                            $ProductID = $row['ProductID'];
                                            $ProductName = $row['ProductName'];
                                            $Img = $row['Img1'];
                                            $Product_price = $row['Product_price'];

                                            echo ' <div class="product" data-id_product = "'.$ProductID.'" data-id ="'.$FavoriteID.'">'; 
                                            echo ' <div class="img_product">'; 
                                            echo '     <img src="/PROJECT/images/anhao/'.$Img.'" alt="">'; 
                                            echo ' </div>'; 
                                            echo ' <div class="content_product">'; 
                                            echo '     <b>'.$ProductName.'</b>'; 
                                            echo '     <p>'.$Product_price.'.000đ</p>'; 
                                            echo ' </div>'; 
                                            echo ' <div class="delete_product">'; 
                                            echo '     <button onclick="delete_click(this)"><ion-icon name="trash-outline"></ion-icon></button>
                                                       <button onclick="review(this)"><ion-icon name="chevron-forward-circle-outline"></ion-icon></button>'; 
                                            echo ' </div>'; 
                                            echo ' </div>'; 
                                        }
                                    }
                               }else{
                                echo '<div class="no_result">Bạn chưa có sản phẩm yêu thích nào! </div>';
                              }
                            }else{
                                echo '<div class="no_result">Vui lòng đăng nhập! </div>';
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