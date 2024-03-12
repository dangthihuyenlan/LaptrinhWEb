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
    <link rel="stylesheet" href="/PROJECT/css/Giohang.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
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
            <div class="tittle_main">
                <a href="/PROJECT/view/Categories/cuahang.php">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                    <p>Tiếp tục mua hàng</p>
                </a>
            </div>
             <div class="main">
                <div class="content_main">
                    <div class="cart_product">
                        <div class="title_cart_product">
                            <div class="icon_cart">
                                <ion-icon name="cart-outline"></ion-icon>
                                <p><b>GIỎ HÀNG</b></p>
                            </div>
                        </div>
                        <div class="Number_orders" style="display: flex; ">
                            <p>Số sản phẩm trong giỏ hàng:  <span class="Number_product"></span> </p>
                        </div>
                        <?php 
                        include'/xampp/htdocs/PROJECT/libs/helper.php';
                        $total_price = 0;
                        $ship = 50;
                        $Number_time = 0;
                        if($name != "" ){
                            db_connect();
                            $sql = "SELECT CustomersID from customers WHERE User_name = '$name'";
                            $result_customers = $mysqli->query($sql);
                             if($result_customers -> num_rows > 0){
                                $row = $result_customers->fetch_assoc();
                                $customersID = $row['CustomersID'];
                                $sql = "SELECT * FROM cart
                                INNER JOIN product ON cart.ProductID = product.ProductID
                                WHERE cart.CustomersID = '$customersID'";

                                $result_cart = $mysqli->query($sql);
                                if($result_cart -> num_rows > 0){
                                    while($row = $result_cart->fetch_assoc()){
                                        $Product_name = $row['ProductName'];
                                        $Product_img = $row['Img1'];
                                        $Product_quantity   = $row ['Cart_quantity'];
                                        $Product_price =  $row['Product_price'];
                                        $Product_size = $row ['Cart_Size'];
                                        $Product_color = $row ['Cart_Color'];
                                        $CartID = $row['CartID'];
                                        $ProductID = $row['ProductID'];
                                        $sql ="SELECT Warehouse_quantity from warehouse where ProductID = '$ProductID'";
                                        $result = $mysqli->query($sql);
                                        if($result->num_rows > 0){
                                            $warehouse_quantity = $result->fetch_assoc()['Warehouse_quantity'];
                                        }
                                        
                                        $Product_total = $Product_price * $Product_quantity;
                                        $formattedPrice = number_format($Product_total, 0, ',', '.') . '.000₫';
                                        $total_price += $Product_total;
                                    echo '<div class="product">';    
                                    echo '<div class="content_product">';    
                                    echo '    <div class="img_product">';    
                                    echo '        <img src="/PROJECT/images/anhao/'.$Product_img.'" alt="">';    
                                    echo '    </div>';    
                                    echo '    <div class="name_product">';    
                                    echo '        <p class="name"><b>'.$Product_name.'</b></p>';    
                                    echo '        <p class="color_size">'.$Product_color.','.$Product_size.'</p>';    
                                    echo '    </div>';    
                                    echo '    <div class="quantity_product">';    
                                    echo '        <div class="span_quantity">';    
                                    echo '            <span class="minus">-</span>';    
                                    echo '            <span class="number">'. $Product_quantity.'</span>';      
                                    echo '            <span class="plus">+</span>';    
                                    echo '        </div>';    
                                    echo '    </div>';    
                                    echo '    <div class="money_product">';    
                                    echo '        <p class="money">'.$formattedPrice.'</p>';    
                                    echo '    </div>';    
                                    echo '    <div class="delete_product"  data-warehouse_quantity="'.$warehouse_quantity.'" data-quantity ="'.$Product_quantity.'" data-cartid="'. $CartID.'">';    
                                    echo '        <span class="delete">'; 
                                    echo '            <button onclick="DeleteCart(this)"> <ion-icon name="trash-outline"></ion-icon> </button>';    
                                    echo '        </span>';    
                                    echo '    </div>';    
                                    echo '</div>';    
                                    echo '</div>';   
                                    }
                                $Number_time ++;
                                }
                             }
                        }
                        db_disconnect();
                        ?>
                       
                        <!-- cart payouts -->
                    </div>
                    <div class="cart_payouts">
                        <div class="payouts">
                            <div class="title">
                                <h3>Tạm tính</h3>
                            </div>
                            <hr class="hr">
                            <div class="sum_money">
                                <div class="content_sum_money">
                                    <div class="title_sum_money">
                                        <p>Tổng giá</p>
                                    </div>
                                    <div class="number_sum_money">
                                        <p class="sum_number"><?php echo  number_format($total_price, 0, ',', '.') . '.000₫' ?></p>
                                    </div>
                                </div>
                                <div class="content_sum_money">
                                    <div class="title_sum_money">
                                        <p>Phí giao hàng</p>
                                    </div>
                                    <div class="number_sum_money">
                                        <p class="ship"><?php echo number_format($ship, 0, ',', '.') . '.000₫' ?></p>
                                    </div>
                                </div>
                                <hr class="hr">
                                <div class="content_sum_money">
                                    <div class="title_sum_money">
                                        <p>Tổng thanh toán</p>
                                    </div>
                                    <div class="number_sum_money">
                                          <?php
                                               echo '<p> '.number_format($total_price + 50 , 0, ',', '.') . '.000₫'.' </p>';  
                                          ?>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="submit_pay">
                                <button onclick="pay_btn()" class="button_pay" >THANH TOÁN</button>
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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
 // Sự kiện tăng giảm
$('.minus').on('click', function() {
  var productId = $(this).closest('.product').find('.delete_product').data('cartid');
  var product_quantity = $(this).closest('.product').find('.delete_product').data('quantity');
  if(product_quantity > 1){
    updateQuantity(productId, -1);
  }
});

$('.plus').on('click', function() {
  var productId = $(this).closest('.product').find('.delete_product').data('cartid');
  var warehouse_quantity = $(this).closest('.product').find('.delete_product').data('warehouse_quantity');
  var product_quantity = $(this).closest('.product').find('.delete_product').data('quantity');

  if(product_quantity >= warehouse_quantity){
    alert("Số lượng sản phẩm trong kho còn "+warehouse_quantity);
  }else{
    updateQuantity(productId, 1);
  }

});

// Hàm gửi yêu cầu AJAX để cập nhật số lượng
function updateQuantity(productId, change) {
  $.ajax({
    type: 'POST',
    url: '/PROJECT/php/update_quantity.php',
    data: {id: productId, change: change},
    success: function(response) {
      // Nếu cập nhật thành công, làm mới trang để cập nhật giỏ hàng
      location.reload();
    }
  });
}
</script>
<!-- script delete -->
<script>
    function DeleteCart(button) {
        var cartID = button.closest('.delete_product').dataset.cartid;
        const confirmdelete = confirm("Bạn có muốn xóa sản phẩm khỏi giỏ hàng?");
        if(confirmdelete){
            window.location.href = '/PROJECT/php/DeleteCart.php?cartID=' + cartID;
        }
    }
</script>
<script>
           var numbertime = <?php echo $Number_time ?>;
           const number_order =document.querySelector(".Number_product");
           number_order.innerText =numbertime;
   </script>
<!-- sự kiện thanh toán -->
<script>
    function pay_btn(){
        var CustomersID = <?php echo json_encode($customersID); ?>;
        var url ='/PROJECT/view/pay.php?CustomersID=' + CustomersID;

        window.location.href = url;
    }
</script>
</html>