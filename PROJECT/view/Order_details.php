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
    <link rel="stylesheet" href="/PROJECT/css/Order_details.css">
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
            <div class="link">
                <a href="/PROJECT/Index.php">Trang chủ</a>
                <p>/</p>
                <p><b>Thông tin đơn hàng</b></p>
                <p>/</p>
                <a href="/PROJECT/view/PurchaseOrders.php">Đơn hàng đã mua</a>
            </div>

            <?php 
            include("/xampp/htdocs/PROJECT/libs/helper.php");
            db_connect();
            if($name != ''){
                $sql = "SELECT CustomersID FROM customers where User_name = '$name'";
                $result_name = $mysqli->query($sql);
            if($result_name->num_rows > 0){
                $customersID = $result_name->fetch_assoc()['CustomersID'];
                $sql ="SELECT * FROM ordersdetail inner join orders on ordersdetail.OrdersID = orders.OrdersID where CustomersID = '$customersID' and orders.Status != 'Đã giao hàng'";
                $result_ordersdetail = $mysqli->query($sql);
                if($result_ordersdetail->num_rows>0){
                    while($row = $result_ordersdetail->fetch_assoc()){
                        $OrderDetailID = $row['OrdersDetailID'];
                        $ProductID = $row['ProductID'];
                        $OrderID = $row['OrdersID'];
                        $size_product = $row['Orders_Size'];
                        $color_product = $row['Orders_Color'];
                        $quantity_product = $row['Orders_quantity'];
                        $Shipping = $row['Shipping'];
                        $Payment = $row['Payment'];
                        $Address = $row['Address'];
                        $Phone = $row['Phone'];
                        $Name = $row['Name'];
                        $Date_order = $row['Date'];
                        $Condition_order = $row['Status'];

                        // echo $OrderDetailID,' ',$ProductID,' ',$OrderID,' ',$Order_Size,' ', $Order_Color,' ',$Order_Quantity,' ',$Shipping,' ',$Payment,' ',$Address,' ',$Phone,' ', $Name ,' ',$Date,' ';
                        $sql ="SELECT * FROM Product where ProductID = '$ProductID'";
                        $result_product = $mysqli->query($sql);
                        if($result_product->num_rows > 0){
                            while($row = $result_product->fetch_assoc()){
                                $ProductID = $row['ProductID'];
                                $img_product = $row['Img1'];
                                $name_product = $row['ProductName'];
                                $price_product = $row['Product_price'];
                                
                                
                                $total_order = $price_product * $quantity_product ;
                                
                                $formattedPrice = number_format($price_product,0,',','.').'.000₫';
                                echo '             <hr class="hr">'  ;   
                        echo ' <div class="order_details">'  ;   
                        echo '     <div class="details_product_order">'  ;   
                        echo '         <div class="product_1">'  ;   
                        echo '             <div class="product">'  ;   
                        echo '                 <div class="img_product">'  ;   
                        echo '                     <img src="/PROJECT/images/anhao/'. $img_product.'" alt="">'  ;   
                        echo '                 </div>'  ;   
                        echo '                 <div class="infor_product">'  ;   
                        echo '                     <div class="product_name">'  ;   
                        echo '                         <p><b>'.$name_product.'</b></p>'  ;   
                        echo '                     </div>'  ;   
                        echo '                     <div class="product_color">'  ;   
                        echo '                     <p>Màu: '.$color_product.'</p>'  ;   
                        echo '                     </div>'  ;   
                        echo '                     <div class="product_size">'  ;   
                        echo '                         <p>Size: '.$size_product.'</p>'  ;   
                        echo '                     </div>'  ;   
                        echo '                     <div class="product_quantity" >'  ;   
                        echo '                         <p>Số lượng: '.$quantity_product.'</p>'  ;   
                        echo '                     </div>'  ;   
                        echo '                 </div>'  ;   
                        echo '             </div>'  ;   
                        echo '             <div class="money_condition">'  ;   
                        echo '                 <div class="money">'  ;   
                        echo '                     <b>'. $formattedPrice.'</b>'  ;   
                        echo '                 </div>'  ;   
                        echo '                 <div class="condition">'  ;   
                        echo '                     <p>'.$Condition_order.'</p>'  ;   
                        echo '                 </div>'  ;   
                        echo '             </div>'  ;   
                        echo '         </div>'  ;   
                        echo '         <div class="order_hr">'  ;   
                        echo '             <hr>'  ;   
                        echo '         </div>'  ;   
                        echo '         <div class="product_2">'  ;   
                        echo '             <div class="shipping_total">'  ;   
                        echo '                 <div class="shipping_date">'  ;   
                        echo '                     <p>Đơn hàng được đặt ngày '.$Date_order.'</p>'  ;   
                        echo '                 </div>'  ;   
                        echo '             </div>'  ;   
                        echo '             <div class="button">'  ;   
                        echo '                 <div class="button_contact">'  ;   
                        echo '                     <button onclick="contact()">Liên hệ người bán</button>'  ;   
                        echo '                 </div>'  ;   
                        echo '                 <div class="button_huy" data-orderid ="'.$OrderID.'" data-quantity ="'.$quantity_product.'" data-orderdetailid ="'.$OrderDetailID.'" data-productid ="'.$ProductID.'" >'  ;   
                        echo '                     <button onclick="huy(this)">Hủy đơn hàng</button>'  ;   
                        echo '                 </div>'  ;   
                        echo '             </div>'  ;   
                        echo '         </div>'  ;   
                        echo '     </div>'  ;     
                        echo ' </div>'  ;   
        
                            }
                        }

                        

                       

                        

                    }
                }else{
                   echo '  <div class="number_order">';
                   echo '  <p>Bạn chưa có đơn hàng nào!</p>';
                   echo '  </div>';
                }
            }
            }else{
                   echo '  <div class="number_order">';
                   echo '  <p>Vui lòng đăng nhập!</p>';
                   echo '  </div>';
            }
            
            ?>
          
            
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
<!-- script contact -->
<script>
  function contact(){
    window.location.href = "/PROJECT/view/Contact.php";
  }
</script>
<!-- script huy -->
<script>
    function huy(button) {
    var orderID = button.closest('.button_huy').dataset.orderid;
    var quantity = button.closest('.button_huy').dataset.quantity;
    var OrderDetailID = button.closest('.button_huy').dataset.orderdetailid;
    var ProductID  = button.closest('.button_huy').dataset.productid;
    
    const confirmdelete = confirm("Bạn có muốn hủy đơn hàng này?");
    
    if (confirmdelete) {
        // Sử dụng encodeURIComponent để tránh vấn đề với các ký tự đặc biệt trong orderID và quantity
        orderID = encodeURIComponent(orderID);
        quantity = encodeURIComponent(quantity);



        window.location.href = '/PROJECT/php/DeleteOrder.php?orderID=' + orderID + '&OrderDetail='+ OrderDetailID + '&quantity=' + quantity + '&productID=' + ProductID;
    }
}
</script>
</body>
</html>