<?php
session_start();

if(isset($_SESSION["customersName"])){
    $name = $_SESSION["customersName"];
}else{
    $name = "";
}
include('/xampp/htdocs/PROJECT/libs/helper.php');
db_connect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="/PROJECT/css/pay.css">
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
            <div class="pay_product">
                <p style="text-align: center; margin-top: 10px;"><b><a href="/PROJECT/Index.php" style="text-decoration: none; color: black;">Trang chủ</a>/ Thanh toán</b></p>
                <div class="new_pay_product">
                   <div class="title_pay_product">
                    <p><b>THANH TOÁN<ion-icon name="wallet-outline"></ion-icon></b></p>
                   </div>
                   <form action="/PROJECT/php/xulythanhtoan.php" method="post">
                   <div class="content_pay_product">
                      <div class="content_pay_1">
                      <?php
                          $total_quantity = 0; 
                          $total_price = 0;
                          $CustomerID = $_GET['CustomersID'];

                          $sql = "SELECT * FROM cart inner join product on cart.ProductID = product.ProductID where CustomersID = $CustomerID";
                          $result = $mysqli->query($sql);
                          if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                $img = $row['Img1'];
                                $name_product = $row['ProductName'];
                                $price_product = $row['Product_price'];
                                $color = $row['Cart_Color'];

                                $size = $row['Cart_Size'];
                                $quantity = $row['Cart_quantity'];
                                $total =  $price_product * $quantity ;
                                $Cartid = $row['CartID'];
                                $total_quantity += $quantity;
                                $total_price += $total;
                       echo '     <div class="infor_product">';    
                       echo '     <div class="img_product">';    
                       echo '         <img src="/PROJECT/images/anhao/'.$img.'" alt="">';       
                       echo '     </div>';    
                       echo '     <div class="information_product">';    
                       echo '         <p style="font-size: 20px;"><b>'.$name_product.'</b></p>';       
                       echo '         <p style="margin-left: 5px;">Màu: '.$color.', size '.$size.'</p>';    
                       echo '         <p style="margin-left: 5px;">Số lượng:'.$quantity.'</p>';       
                       echo '         <p style="margin-left: 5px;"><b>  '.number_format( $total, 0, ',', '.') . '.000₫'.' </b></p>';      
                       echo '     </div>';    
                       echo ' </div>';    
                              
                            }
                          }
                          

                         
                            
                       ?>
                      </div>
                     
                      <div class="content_pay_2">
                        
                            <div class="delivery_information">
                                <div class="title_delivery">
                                    <div class="icon_title_delivery">
                                        <ion-icon name="map-outline"></ion-icon>
                                    </div>
                                    <div class="p_title_delivery">
                                        <p><b>THÔNG TIN GIAO HÀNG</b></p>
                                    </div>
                                </div>
                                <div class="input_delivery">
                                   <?php
                                     $sql= "SELECT * FROM address inner join customers on address.CustomersID = customers.CustomersID where customers.User_name = '$name'";
                                     $result = $mysqli->query($sql);
                                     if($result->num_rows > 0){
                                        while($row_address = $result->fetch_assoc()){
                                            $AddressID = $row_address['AddressId'];
                                            $CustomersName = $row_address['CustomersName'];
                                            $Address = $row_address['address'];
                                            $Customers_Phone = $row_address['CustomersPhone'];

                                            
                                            echo '<div class="address">';
                                            echo '<input type="radio" name="address" value="'.$AddressID.'">';
                                            echo ' <div class="content_address">'; 
                                            echo ' <div class="content_address_1">'; 
                                            echo ' <div class="name_phone">'; 
                                            echo '     <p>'.$CustomersName.'</p>'; 
                                            echo '     <hr>'; 
                                            echo '     <p style="color: rgb(100, 98, 98) ;">'.$Customers_Phone.'</p>'; 
                                            echo ' </div>'; 
                                            echo ' <div class="address_delete">'; 
                                            echo '     <p style="color: rgb(100, 98, 98); margin-top: 5px;">'.$Address.'</p>'; 
                                            echo ' </div>'; 
                                            echo ' </div>'; 
                                            echo ' </div>'; 
                                            echo ' </div>'; 
                                        }
                                     }else{
                                        echo 'vui lòng cập nhật thông tin giao hàng!';
                                        echo '<div class="button_update_addree">';  
                                        echo '<button type="button" onclick="update()"> Tại đây </button>';  
                                        echo '</div>';  
                                     }
                                   ?>
                                </div>
                               
                                <div class="procedure_pay">
                                    <div class="content_procedure_pay_1">
                                        <div class="icon_title_procedure">
                                            <img src="/PROJECT/images/icon/car.png" alt="">
                                            <p><b>Phương thức vận chuyển</b></p>
                                        </div>
                                        <div class="input_procedure" style="margin-top: -10px;">
                                            <label for="ship">
                                                <input type="radio" name="procedure_ship" id="ship" style="display: none;" value="Giao hàng nhanh" >
                                                <span class="ship"></span>
                                            </label>
                                            <p>Giao hàng nhanh</p>
                                        </div>
                                    </div>
                                    <div class="content_procedure_pay_2">
                                        <div class="icon_title_procedure">
                                            <img src="/PROJECT/images/icon/wallet.png" alt="" style="width: 50px; margin-left: 5px;">
                                            <p><b>Phương thức thanh toán</b></p>
                                        </div>
                                        <div class="input_procedure">
                                            <label for="procedure">
                                                <input type="radio" name="procedure_pay" id="procedure" style="display: none;" value="Thanh toán khi nhận hàng">
                                                <span class="procedure"></span>
                                            </label>
                                            <p>Thanh toán khi nhận hàng</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit_delivery">
                                    <input type="submit" value="Thanh Toán" name="pay">
                                </div>
                            </div>
                            <div class="procedure_sum_money">
                                <div class="sum_money">
                                    <div class="content_Provisional_money">
                                        <div class="title_content_Provisional">
                                            <p><b>TẠM TÍNH</b></p>
                                        </div>
                                        <div class="quantity_number_ship">
                                            <div class="quantity_number_ship_1">
                                                <div class="p_quantity_number_ship">
                                                    <p>Số lượng</p>
                                                </div>
                                                <div class="result_quantity_number_ship">
                                                    <p><?php echo $total_quantity; ?></p>
                                                    <input type="text" name="tongsoluong" id="" value="<?php echo $total_quantity?>" style="display: none;">
                                                </div>
                                            </div>
                                            <div class="quantity_number_ship_1">
                                                <div class="p_quantity_number_ship">
                                                    <p>Tạm tính</p>
                                                </div>
                                                <div class="result_quantity_number_ship">
                                                    <p><?php echo number_format($total_price, 0,',','.'). '.000đ';  ?></p>
                                                </div>
                                            </div>
                                            <div class="quantity_number_ship_1">
                                                <div class="p_quantity_number_ship">
                                                    <p>Phí vận chuyển</p>
                                                </div>
                                                <div class="result_quantity_number_ship">
                                                    <?php 
                                                       if($total_price < 799){
                                                        $ship = 50;
                                                        echo' <p> ' .number_format($ship, 0,',','.'). '.000đ'.'</p>';
                                                        
                                                       }else{
                                                        $ship = 0;
                                                        echo'<p>'.$ship.'</p>';
                                                       }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="hr">
                                                <hr>
                                            </div>
                                            <div class="quantity_number_ship_1">
                                                <div class="p_quantity_number_ship">
                                                    <p>Tổng</p>
                                                </div>
                                                <div class="result_quantity_number_ship">
                                                    <?php
                                                    $total = $total_price + $ship;
                                                     echo' <p> ' .number_format($total, 0,',','.'). '.000đ'.'</p>';
                                                     echo '<input type="text" name="tongthanhtoan" id="" value="'.$total.'" style="display: none;">';
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                      </div>
                   </div>
                   </form>
                </div>
            </div>
        </main>
        <footer>
            <p>The Last Mile Break™</p>
        </footer>
</body>
<!-- script -->
<script>
  function update(){
     window.location.href="/PROJECT/view/Infor_user.php";
     exit();
  }
</script>
</html>