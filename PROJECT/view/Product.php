<?php
include('/xampp/htdocs/PROJECT/libs/helper.php');
db_connect();
session_start();

if(isset($_SESSION["customersName"])){
    $name = $_SESSION["customersName"];
}else{
    $name = "";
}
$productID = $_GET['productID'];
  $sql ="SELECT * FROM Product INNER JOIN warehouse on Product.ProductID = warehouse.ProductID Where Product.ProductID  = '$productID' ";
  $result = $mysqli->query($sql);
  if($result->num_rows >0){
    $row = $result->fetch_assoc();
    $img =      $row['Img1'];
    $img_2 =    $row['Img2'];
    $img_3 =    $row['Img3'];
    $img_4 =    $row['Img4'];
    $name_product =     $row['ProductName'];
    $price =    $row['Product_price'];
    $groups=    $row['Groups'];
    $warehouse= $row['Warehouse_quantity'];
    $formattedPrice = number_format($price, 0, ',', '.') . '.000₫';
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="/PROJECT/Js/Index.JS"></script>
    <link rel="stylesheet" href="/PROJECT/css/Product.css">
    <title>Document</title>
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
            <div class="product">
            <div class="link">
                    <a href="/PROJECT/Index.php">Trang chủ</a>
                    <p>/</p>
                    <p><b>Sản phẩm</b></p>
                </div>
                <div class="new_product">
                    <div class="product_img">
                        <div class="select_img">
                            <div class="select_img_1">
                                <img class="img_1" src="/PROJECT/images/anhao/<?php echo $img ?> " alt="">
                            </div>
                            <div class="select_img_1">
                                <img class="img_2" src="/PROJECT/images/anhao/<?php echo $img_2 ?>" alt="">
                            </div>
                            <div class="select_img_1">
                                <img class="img_3" src="/PROJECT/images/anhao/<?php echo $img_3 ?>" alt="">
                            </div>
                            <div class="select_img_1">
                                <img class="img_4" src="/PROJECT/images/anhao/<?php echo $img_4 ?>" alt="">
                            </div>
                        </div>
                        <div class="img_show">
                          <img class="img" src="/PROJECT/images/anhao/<?php echo $img ?>" alt="">
                        </div>
                    </div>
                    <div class="product_select">
                        <form action="/PROJECT/php/xulythemcart.php" method="post">
                        <input type="text" name="ProductID" value="<?php echo $productID  ?>" style="display: none;">
                            <div class="name_product">
                                <label for="name"><?php echo $name_product ?></label>
                                <input type="text" name="name" id="name" value="<?php echo $name_product ?>" style="display: none;">
                            </div>
                            <hr style="width: 50%;">
                            <div class="price_product">
                                <label for="price"><?php echo $formattedPrice ?></label>
                                <input type="text" name="price" id="price" value="<?php echo $price ?>" style="display: none;">
                            </div>
                            <div class="color_product">
                                <p>Màu: <b class="color">Black</b></p>
                                        <div class="input_color">
                                            <label for="black">
                                                <input class="black" type="radio" name="color" id="black" value="Black" required>
                                                <span class="span_color"></span>
                                            </label>
                                            <label for="white">
                                                <input class="white" type="radio" name="color" id="white" value="White" required>
                                                <span class="span_color" ></span>
                                            </label>
                                            <label for="red">
                                                <input class="red" type="radio" name="color" id="red" value="Red" required> 
                                                <span class="span_color"></span>
                                            </label>
                                        </div>
                            </div>
                            <div class="size_product">
                                <p>Chọn Size: <b class="size">M</b></p>
                                        <div class="size_input">
                                            <label for="M">
                                                <input class="size_M" type="radio" name="size" id="M" value="M" required>
                                                <span class="M"><b>M</b></span>
                                            </label>
                                            <label for="L">
                                                <input class="size_L" type="radio" name="size" id="L" value="L" required>
                                                <span class="L"><b>L</b></span>
                                            </label>
                                            <label for="XL">
                                                <input class="size_XL" type="radio" name="size" id="XL" value="XL" required>
                                                <span class="XL"><b>XL</b></span>
                                            </label>
                                            <div class="huongdan">
                                                <ion-icon name="create-outline"></ion-icon>
                                                <label for="size">Hướng dẫn chọn size</label>
                                            </div>
                                            
                                        </div>
                            </div>
                            <div class="product_quantity">
                                <p>Chọn số lượng: <b class="quantity">1</b> </p>
                                <div class="quantity_more">
                                    <div class="input_quantity">
                                        <span class="minus">-</span>
                                        <input type="text" class="num" name="soluong" value="1" id="num">
                                        <span class="plus">+</span>
                                    </div>
                                    <div class="submit_more">
                                        <input type="submit" value="THÊM VÀO GIỎ HÀNG" name="more">
                                    </div>
                                </div>
                            </div>
                            <div class="warehous_buy_love">
                                <div class="quantity_warehous">
                                    <p>Còn lại: <?php echo $warehouse; ?> sản phẩm</p>
                                    <input style="display: none;" type="text" name="warehouse" value="<?php echo $warehouse; ?>" >
                                </div>
                                <div class="product_love" data-name_customers="<?php echo $name;?>" data-id_product = "<?php echo $productID; ?>">
                                   <button type="button" onclick="add_favorite(this)"><ion-icon name="heart-outline"></ion-icon></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="infor">
                    <div class="characteristic_product">
                        <div class="titlel_charac">
                            <span></span>
                            <h4>ĐẶC ĐIỂM NỔI BẬT</h4>
                        </div>
                        <div class="content_charac">
                            <div class="form_content_charac">
                                <p><b>Form:</b> rộng</p>
                            </div>
                            <div class="groups_content_charac">
                                <p><b>Nhóm sản phẩm:</b><?php echo $groups; ?></p>
                            </div>
                        </div>
                        <div class="content_infor_product">
                            <label for="infor">
                                <p>Thông tin sản phẩm</p>
                                <hr style="width: 20%; border-width: 1px; border-color: black;">
                            </label>
                            <input type="checkbox" name="" id="infor" style="display: none;">
                            <div class="infor_product">
                                <ul>
                                    <li>Chất vải cotton 2 chiều 260gram</li>
                                    <li>Họa tiết in lụa</li>
                                    <li>form oversize</li>
                                </ul>
                            </div>
                        </div>
                        <div class="content_size_product">
                            <label for="size">
                                <p>Thông tin size sản phẩm</p>
                                <hr style="width: 20%; border-width: 1px; border-color: black;">
                            </label>
                            <input type="checkbox" name="" id="size" style="display: none;">
                            <div class="infor_size_product">
                                <img src="/PROJECT/images/size.jpg" alt="size">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="thank_product">
                    <div class="titel_thank_product">
                        <h3>CẢM ƠN QUÝ KHÁCH ĐÃ LỰA CHỌN SẢN PHẨM ©</h3>
                    </div>
                    <div class="content_thank_product">
                        <div class="support">
                           <div class="support_1">
                             <div class="icon_content_support">
                                <div class="icon_support">
                                    <ion-icon name="car-outline"></ion-icon>
                                </div>
                                <div class="content_support">
                                    <b>Giao hàng nhanh</b>
                                    <p>Từ 2-5 ngày</p>
                                </div>
                             </div>
                             <div class="icon_content_support">
                                <div class="icon_support">
                                    <ion-icon name="swap-horizontal-outline"></ion-icon>
                                </div>
                                <div class="content_support">
                                    <b>Đổi trả linh hoạt</b>
                                    <p>Trong vòng 1 tuần</p>
                                </div>
                             </div>
                             <div class="icon_content_support">
                                <div class="icon_support">
                                    <ion-icon name="card-outline"></ion-icon>
                                </div>
                                <div class="content_support">
                                    <b>Thanh toán dễ dàng <br> qua nhiều hình thức</b>
                                </div>
                             </div>
                           </div>
                           <div class="support_2">
                            <div class="icon_content_support">
                                <div class="icon_support">
                                    <ion-icon name="bag-check-outline"></ion-icon>
                                </div>
                                <div class="content_support">
                                    <b>Miễn phí vận chuyển</b>
                                    <p>Đơn hàng từ 399k</p>
                                </div>
                             </div>
                             <div class="icon_content_support">
                                <div class="icon_support">
                                    <ion-icon name="glasses-outline"></ion-icon>
                                </div>
                                <div class="content_support">
                                    <b>Theo dõi đơn hàng <br> một cách dễ dàng</b>
                                </div>
                             </div>
                             <div class="icon_content_support">
                                <div class="icon_support">
                                    <ion-icon name="id-card-outline"></ion-icon>
                                </div>
                                <div class="content_support">
                                    <b>Hotline hỗ trợ</b>
                                    <p>0373532273</p>
                                </div>
                            </div>
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
<!-- script quantity -->
<script>
    const plus = document.querySelector(".plus"),
    minus = document.querySelector(".minus"),
    quantity = document.querySelector(".quantity"),
    num = document.getElementById('num');
    const num_value = num.value;
    let a = 1;
    plus.addEventListener("click",()=>{
        a++;
        quantity.innerText = a;
        console.log(quantity);
        console.log(num.value = a );
    })
    minus.addEventListener("click",()=>{
        if(a>0){
            a--;
            quantity.innerText = a;
            console.log(quantity);
            console.log(num.value = a );
        }
        
    })
</script>
<!-- scipt color -->
<script>
  const black = document.querySelector(".black"),
  white = document.querySelector(".white"),
  red = document.querySelector(".red"),
  color = document.querySelector(".color");
  
  white.addEventListener("click",()=>{
    color.innerText = white.value;
    console.log(color);
  })
  black.addEventListener("click",()=>{
    color.innerText = black.value;
    console.log(color);
  })
  red.addEventListener("click",()=>{
    color.innerText = red.value;
    console.log(color);
  })
</script>
<!-- script size -->
<script>
    const M = document.querySelector(".size_M"),
    L = document.querySelector(".size_L"),
    XL = document.querySelector(".size_XL"),
    size = document.querySelector(".size");

    M.addEventListener("click",()=>{
        size.innerText = M.value;
        console.log(size);
    })
    L.addEventListener("click",()=>{
        size.innerText = L.value;
        console.log(size);
    })
    XL.addEventListener("click",()=>{
        size.innerText = XL.value;
        console.log(size);
    })
</script>
<!-- script img -->
<script>
    const img_1 = document.querySelector(".img_1"),
    img_2 = document.querySelector(".img_2"),
    img_3 = document.querySelector(".img_3"),
    img_4 = document.querySelector(".img_4"),
    img = document.querySelector(".img");
   
    img_1.addEventListener("click",()=>{
        img.src = img_1.src;
        console.log(img);
    })
    img_2.addEventListener("click",()=>{
        img.src = img_2.src;
        console.log(img);
    })
    img_3.addEventListener("click",()=>{
        img.src = img_3.src;
        console.log(img);
    })
    img_4.addEventListener("click",()=>{
        img.src = img_4.src;
        console.log(img);
    })

</script>
</html>