<?php
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
    <link rel="stylesheet" href="/PROJECT/Admin/Admin.css">
    <script src="/PROJECT/Js/Admin.JS"></script>
    <title>ADMIN</title>
</head>
<body>
    <div class="container">
        <nav class="navbar">
            <div class="name_navbar">
                <p>THE LAST MILE BREAK</p>
            </div>
            <div class="icon_navbar">
                <ion-icon name="person-circle-outline"></ion-icon>
            </div>
        </nav>
        <main class="main">
            <div class="sidebar">
                <ul class="menu_sidebar">
                    <li class="sidebar_1"><a href="#" onclick="showContent('click_1')"><ion-icon name="home-outline"></ion-icon> <p>TỔNG QUAN CỬA HÀNG</p></a></li>
                    <li class="sidebar_2"><a href="#" onclick="showContent('click_2')"><ion-icon name="accessibility-outline"></ion-icon><p>QUẢN LÝ TÀI KHOẢN</p> </a></li>
                    <li class="sidebar_3"><a href="#" onclick="showContent('click_3')"><ion-icon name="shirt-outline"></ion-icon><p>QUẢN LÝ SẢN PHẨM</p> </a></li>
                    <li class="sidebar_4"><a href="#" onclick="showContent('click_4')"><ion-icon name="cube-outline"></ion-icon> <p>QUẢN LÝ KHO</p> </a></li>
                    <li class="sidebar_5"><a href="#" onclick="showContent('click_5')"><ion-icon name="bag-outline"></ion-icon><p>QUẢN LÝ ĐƠN HÀNG</p></a></li>
                </ul>
            </div>
            <div class="content">
                <div class="content_overview">
                    <div class="title">
                        <b>Thống kê cửa hàng</b>
                    </div>
                    <div class="content_overview_1">
                        <?php
                        $Subscriber = 0;
                        $sql_users = "SELECT * FROM customers";
                        $result_user = $mysqli->query($sql_users);
                        if($result_user->num_rows>0){
                            while($result_user->fetch_assoc()){
                                $Subscriber++;
                            }
                        }
                        ?>
                        <div class="overview">
                            <div class="number_view">
                                <b><?php echo  $Subscriber; ?></b>
                                <p>Số người đăng ký </p>
                            </div>
                            <div class="img_view">
                                <ion-icon name="people-outline"></ion-icon>
                            </div>
                        </div>
                        <?php
                        $Product_number = 0;
                        $sql_number_product = "SELECT * FROM product";
                        $result_number_product = $mysqli->query($sql_number_product);
                        if($result_number_product->num_rows>0){
                            while($result_number_product->fetch_assoc()){
                                $Product_number++;
                            }
                        }
                        ?>
                        <div class="overview">
                            <div class="number_view">
                                <b><?php echo $Product_number; ?></b>
                                <p>Số lượng sản phẩm </p>
                            </div>
                            <div class="img_view">
                                <ion-icon name="cube-outline"></ion-icon>
                            </div>
                        </div>
                    </div>
                    <?php
                        $Orders_number = 0;
                        $sql_number_orders = "SELECT Orders_quantity FROM ordersdetail";
                        $result_number_orders = $mysqli->query($sql_number_orders);
                        if($result_number_orders->num_rows>0){
                            while($row =  $result_number_orders->fetch_assoc()){
                                $Orders_quantity = $row['Orders_quantity'];
                                $Orders_number += $Orders_quantity;
                            }
                        }
                        ?>
                    <div class="content_overview_2">
                        <div class="overview">
                            <div class="number_view">
                                <b><?php echo $Orders_number; ?></b>
                                <p>Số lượng sản phẩm đã bán</p>
                            </div>
                            <div class="img_view">
                                <ion-icon name="bag-check-outline"></ion-icon>
                            </div>
                        </div>
                        <?php
                        $Orders_number = 0;
                        $sql_number_orders = "SELECT * FROM ordersdetail inner join product on ordersdetail.ProductID = product.ProductID";
                        $result_number_orders = $mysqli->query($sql_number_orders);
                        if($result_number_orders->num_rows>0){
                            while($row =  $result_number_orders->fetch_assoc()){
                                $Product_price = $row['Product_price'];
                                $Orders_quantity = $row['Orders_quantity'];
                                $Orders_number += $Orders_quantity * $Product_price;
                            }
                        }
                        ?>
                        <div class="overview">
                            <div class="number_view">
                                <b><?php echo number_format( $Orders_number, 0, ',', '.') . '.000₫'; ?></b>
                                <p>Doanh thu</p>
                            </div>
                            <div class="img_view">
                                <ion-icon name="cash-outline"></ion-icon>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="account_user">
                    <div class="content_table">
                        <div class="table">
                            <div class="title_account">
                                <b>QUẢN LÝ TÀI KHOẢN</b>
                            </div>
                            <table>
                                <tr class="cot">
                                    <th>id</th>
                                    <th>Tên đăng nhập</th>
                                    <th>Mật khẩu</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Hành động</th>
                                </tr>
                                <?php
                                  $sql_customers = "SELECT * FROM Customers";
                                  $result_customers = $mysqli->query($sql_customers);
                                  if($result_customers->num_rows > 0){
                                    while($row_customers = $result_customers->fetch_assoc()){
                                        $CustomersID = $row_customers['CustomersID'];
                                        $User_Name = $row_customers['User_name'];
                                        $CustomersPassword  = $row_customers['CustomersPassword'];
                                        $CustomersEmail = $row_customers['CustomersEmail'];
                                        $CustomersPhone = $row_customers['CustomersPhone'];

                                        echo '<tr class="hang_customers" data-customersid = "'.$CustomersID.'">';  
                                        echo '<td>'.$CustomersID.'</td>';  
                                        echo '<td>'.$User_Name.'</td>';
                                        echo '<td>'.$CustomersPassword.'</td>';  
                                        echo '<td>'.$CustomersEmail.'</td>';  
                                        echo '<td>'.$CustomersPhone.'</td>';
                                        echo '<td><button onclick = "delete_customers(this)"><ion-icon name="trash-outline"></ion-icon></button></td>';  
                                        echo '</tr>';  
    
                                    }
                                  }
                                ?>
                            </table>
                            <div class="pagination_customers"></div>
                        </div>
                    </div>
                </div>
                <div class="Product">
                    <div class="content_table">
                        <div class="table">
                            <div class="title_account">
                                <b>QUẢN LÝ SẢN PHẨM</b>
                            </div>
                            <table>
                            
                                <tr class="cot">
                                    <th>id</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Ảnh 1</th>
                                    <th>Ảnh 2</th>
                                    <th>Ảnh 3</th>
                                    <th>Ảnh 4</th>
                                    <th>Giá tiền</th>
                                    <th>Nhóm</th>
                                    <th>Chỉnh sửa</th>
                                    <th>Hành động</th>
                                </tr>
                                <?php
                                $sql = "SELECT * FROM Product";
                                $result = $mysqli->query($sql);
                                if($result -> num_rows >0){
                                    while($row = $result -> fetch_assoc()){
                                        $id_product = $row['ProductID'];
                                        $Product_name = $row['ProductName'];
                                        $img_1 = $row['Img1'];
                                        $img_2 = $row['Img2'];
                                        $img_3 = $row['Img3'];
                                        $img_4 = $row['Img4'];
                                        $Product_price = $row['Product_price'];
                                        $Product_groups = $row['Groups'];
                                        $formattedPrice = number_format($Product_price, 0, ',', '.') . '.000₫';
                                        echo ' <tr class="hang_product" data-id = "'.$id_product.'" data-name="'.$Product_name.'" data-img1 = "'.$img_1.'" data-img2 = "'.$img_2.'" data-img3 = "'.$img_3.'" data-img4 = "'.$img_4.'" data-price="'.$Product_price.'" data-groups ="'.$Product_groups.'">'; 
                                        echo '    <td>'.$id_product.'</td>'; 
                                        echo '    <td>'.$Product_name.'</td>'; 
                                        echo '    <td><img src="/PROJECT/images/anhao/'.$img_1.'" alt=""></td>'; 
                                        echo '    <td><img src="/PROJECT/images/anhao/'.$img_2.'" alt=""></td>'; 
                                        echo '    <td><img src="/PROJECT/images/anhao/'.$img_3.'" alt=""></td>'; 
                                        echo '    <td><img src="/PROJECT/images/anhao/'.$img_4.'" alt=""></td>'; 
                                        echo '    <td>'.$formattedPrice.'</td>'; 
                                        echo '    <td>'.$Product_groups.'</td>';
                                        echo '    <td>
                                                     <button onclick = "edit(this)"><ion-icon name="create-outline"></ion-icon></button></td>'; 
                                        echo '    <td><button onclick = "delete_product(this)"><ion-icon name="trash-outline"></ion-icon></button></td>'; 
                                        echo ' </tr>'; 
                                    }
                                }
                               
                                ?>
                            </table>
                            <div class="pagination"></div>
                            <div class="add_product">
                                <input type="checkbox" id="add_product" style="display: none;">
                                <label for="add_product">
                                     <span class="themsanpham"><ion-icon name="bag-add-outline"></ion-icon></span>
                                </label>
                                <div class="input_add_product">
                                    <form action="/PROJECT/Admin/xulyadmin.php" method="post" enctype="multipart/form-data">
                                        <div class="content_input_add">
                                          <div class="content_input_add_1">
                                            <div class="mb-3">
                                                <label for="name">Tên sản phẩm:</label>
                                                <input type="text" name="name_product" id="name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="price">Giá sản phẩm:</label>
                                                <input type="text" name="price_product" id="price">
                                            </div>
                                            <div class="mb-3">
                                                <label for="quantity">Số lượng sản phẩm:</label>
                                                <input type="text" name="quantity_product" id="quantity">
                                            </div>
                                            <div class="mb-3">
                                                <label for="group">Nhóm sản phẩm:</label>
                                                <select name="group" id="group">
                                                    <option value="Áo thun">Áo thun</option>
                                                    <option value="Áo POLO">Áo POLO</option>
                                                    <option value="Áo Hoodie">Áo Hoodie</option>
                                                    <option value="Áo sweater">Áo sweater</option>
                                                    <option value="Quần">Quần</option>
                                                </select>
                                            </div>
                                          </div>
                                          
                                          <div class="content_input_add_2">
                                            <div class="mb-3">
                                                <label for="imageUpload">Kéo và thả ảnh hoặc nhấn để chọn (tối đa 4 ảnh)</label>
                                                <input type="file" id="imageUpload" name="images[]" style="display: none;" multiple accept="image/*">
                                                <div id="previewContainer"></div>
                                                <button type="submit"name="add_product">Thêm sản phẩm</button>
                                            </div>
                                          </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="input_edit_product">
                                    <form action="/PROJECT/Admin/xulyadmin.php" method="post" enctype="multipart/form-data">
                                        <div class="content_input_add">
                                          <div class="content_input_add_1">
                                          <input type="text" name="product_id" id="id_edit" style="display: none;">
                                            <div class="mb-3">
                                                <label for="name_edit">Tên sản phẩm:</label>
                                                <input type="text" name="name_product" id="name_edit" value="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="price_edit">Giá sản phẩm:</label>
                                                <input type="text" name="price_product" id="price_edit">
                                            </div>
                                            <div class="mb-3">
                                                <label for="group_edit">Nhóm sản phẩm:</label>
                                                <select name="group" id="group_edit">
                                                    <option value="Áo thun">Áo thun</option>
                                                    <option value="Áo POLO">Áo POLO</option>
                                                    <option value="Áo Hoodie">Áo Hoodie</option>
                                                    <option value="Áo sweater">Áo sweater</option>
                                                    <option value="Quần">Quần</option>
                                                </select>
                                            </div>
                                          </div>
                                          
                                          <div class="content_input_add_2">
                                            <div class="mb-3">
                                                <label for="imageUpload_edit">Ảnh sản phẩm</label>
                                                <input type="file" id="imageUpload_edit" name="images[]" style="display: none;" multiple accept="image/*">
                                                <div id="previewContainer_edit"></div>
                                                <button type="submit"name="edit_product">Thay đổi sản phẩm</button>
                                            </div>
                                          </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ware_house">
                    <div class="content_table">
                        <div class="table">
                            <div class="title_account">
                                <b>QUẢN LÝ KHO</b>
                            </div>
                            <table>
                                <tr class="cot">
                                    <th>id</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá tiền</th>
                                    <th>Số lượng trong kho</th>
                                    <th>Chỉnh sửa</th>
                                </tr>
                                <?php
                                $sql = "SELECT * FROM warehouse";
                                $result = $mysqli->query($sql);
                                if($result->num_rows >0){
                                    while($row = $result->fetch_assoc()){
                                        $warehouseID = $row['WarehouseID'];
                                        $ProductID = $row['ProductID'];
                                        $warehouse_quantity = $row['Warehouse_quantity'];

                                        $sql = "SELECT Product.ProductName, Product.Product_price FROM Product inner join Warehouse on Product.ProductID = Warehouse.ProductID Where Product.ProductID = $ProductID ";
                                        $result_product_ware = $mysqli->query($sql);
                                        if($result_product_ware){
                                            $row = $result_product_ware->fetch_assoc();
                                            $ProductName = $row['ProductName'];
                                            $Product_price = $row['Product_price'];
                                          echo'<tr class="hang_warehouse" data-id_warehouse = "'.$warehouseID.'" data-name_product = "'.$ProductName.'" data-quantity_warehouse = "'. $warehouse_quantity.'">';  
                                          echo'<td>'.$warehouseID.'</td>';  
                                          echo'<td>'.$ProductName.'</td>';  
                                          echo'<td>'. $Product_price .'</td>';  
                                          echo'<td>'.$warehouse_quantity.'</td>';  
                                          echo'<td><button onclick ="edit_warehouse(this)"><ion-icon name="create-outline"></ion-icon></button></td>';  
                                          echo'</tr>';  
                                        }
                                    }
                                }
                                ?>
                            </table>
                            <div class="pagination_warehouse"></div>
                            <div class="input_edit_warehouse">
                                    <form action="/PROJECT/Admin/xulyadmin.php" method="post" enctype="multipart/form-data">
                                        <div class="content_input_add">
                                          <div class="content_input_add_1">
                                          <input type="text" name="product_id" id="id_edit" style="display: none;">
                                            <div class="mb-3">
                                                <label for="name_edit">Tên sản phẩm:</label>
                                                <span class="name_show"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label for="update_warehouse">Cập nhật số lượng:</label>
                                                <input type="text" name="Update_warehouse" id="update_warehouse">
                                                <input type="hidden" name="id_warehouse" id="id_warehouse">
                                            </div>
                                          </div>
                                          <div class="content_input_add_2">
                                            <div class="mb-3">
                                                <button type="submit"name="edit_warehouse">Thực hiện</button>
                                            </div>
                                          </div>
                                        </div>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="order">
                    <div class="content_table">
                        <div class="table">
                            <div class="title_account">
                                <b>QUẢN LÝ ĐƠN HÀNG</b>
                            </div>
                            <table>
                                <tr class="cot">
                                    <th>id</th>
                                    <th>Tên khách hàng</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Size</th>
                                    <th>Màu</th>
                                    <th>Số lượng</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th>Ngày mua hàng</th>
                                    <th>Trạng thái</th>
                                    <th>Xóa</th>
                                </tr>
                                <?php 

                                $sql_order = "SELECT * FROM Orders inner join OrdersDetail on Orders.OrdersID = OrdersDetail.OrdersID where Orders.Status != 'Đã giao hàng'";
                                $result_order = $mysqli->query($sql_order);
                                if($result_order->num_rows > 0){
                                    while($row_order = $result_order->fetch_assoc()){
                                        $OrdersID = $row_order['OrdersID'];
                                        $Name = $row_order['Name'];
                                        $Address = $row_order['Address'];
                                        $Phone = $row_order['Phone'];
                                        $Date = $row_order['Date'];
                                        $Status = $row_order['Status'];
                                        $ProductID = $row_order['ProductID'];
                                        $Orders_size = $row_order['Orders_Size'];
                                        $Order_color = $row_order['Orders_Color'];
                                        $Order_quantity = $row_order['Orders_quantity'];

                                        $sql_product = "SELECT ProductName,Product_price  from product where ProductID = '$ProductID'";
                                        $result_product = $mysqli->query($sql_product);
                                        if($result_product->num_rows > 0){
                                            $Name_product = $result_product->fetch_assoc()['ProductName'];

                                            echo '<tr class="hang_orders" data-orders = "'.$OrdersID.'">';   
                                            echo '<td>'.$OrdersID.'</td>';   
                                            echo '<td>'.$Name.'</td>';   
                                            echo '<td>'.$Name_product.'</td>';   
                                            echo '<td>'.$Orders_size.'</td>';   
                                            echo '<td>'.$Order_color.'</td>';   
                                            echo '<td>'.$Order_quantity.'</td>';   
                                            echo '<td>'.$Address.'</td>';
                                            echo '<td>'.$Phone.'</td>';   
                                            echo '<td>'.$Date.'</td>';   
                                            echo '<td>';   
                                            echo '    <select name="trangthai" onchange="updateStatus(this)">'; 
                                            echo '        <option>'.$Status.'</option>';  
                                            echo '        <option value="Chưa xác nhận">Chưa xác nhận</option>';   
                                            echo '        <option value="Đã xác nhận">Đã xác nhận</option>';   
                                            echo '        <option value="Đang giao hàng">Đang giao hàng</option>';   
                                            echo '        <option value="Đã giao hàng">Đã giao hàng</option>';   
                                            echo '        <option value="Đã thanh toán">Đã thanh toán</option>';   
                                            echo '    </select>';   
                                            echo '</td>';   
                                            echo '<td><button onclick="delete_orders(this)"><ion-icon name="trash-outline"></ion-icon></button></td>';   
                                            echo '</tr>';   

                                        }
                                    }
                                }

                                ?>
                            </table>
                            <div class="pagination_orders"></div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>