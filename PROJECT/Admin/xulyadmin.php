<?php
include('/xampp/htdocs/PROJECT/libs/helper.php');
db_connect();
// xử lý dữ liệu gửi qua từ form method post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_product'])) {
        $name_product = $_POST['name_product'];
        $price_product = $_POST['price_product'];
        $quantity_product = $_POST['quantity_product'];
        $groups_product = $_POST['group'];

        $images = $_FILES['images'];

        // Kiểm tra xem có tệp tin được tải lên hay không
        $uploadSuccess = true;
        if (isset($images['name'])) {
            // Khởi tạo các biến để lưu trữ tên ảnh
            $img_1 = $img_2 = $img_3 = $img_4 = '';
            
            // Lặp qua từng ảnh
            foreach ($images['name'] as $key => $img) {
                // Gán giá trị cho từng biến tương ứng
                switch ($key) {
                    case 0:
                        $img_1 = $img;
                        break;
                    case 1:
                        $img_2 = $img;
                        break;
                    case 2:
                        $img_3 = $img;
                        break;
                    case 3:
                        $img_4 = $img;
                        break;
                    // Nếu có nhiều hơn 4 ảnh, bạn có thể mở rộng switch case ở đây
                }
                
                // Kiểm tra xem ảnh đã tồn tại chưa
                $target_file = 'C:/Xampp/htdocs/PROJECT/images/anhao/' . $img;
                while (file_exists($target_file)) {
                    // Tên ảnh đã tồn tại, xử lý tương ứng (ví dụ: thông báo lỗi)
                    echo '<script> alert("Ảnh có tên '.$img.' đã tồn tại vui lòng thay đổi"); </script>';
                    echo '<script> window.history.back(); </script>';
                    $uploadSuccess = false;
                    exit;
                } 
                    // Nếu tên ảnh chưa tồn tại, thực hiện upload
                    move_uploaded_file($images['tmp_name'][$key], $target_file);
                }
            }
        
        if($uploadSuccess){
            $sql = "SELECT * from Product where ProductName = '$name_product' ";
            $result = $mysqli->query($sql);
            if($result->num_rows >0){
                echo'<script> alert("Tên sản phẩm đã tồn tại!"); </script>';
                echo'<script> window.history.back(); </script>';
            }else{
                // tạo trigger cho bảng warehouse
                $triggerQuery = "
                        CREATE TRIGGER after_product_insert
                        AFTER INSERT ON Product
                        FOR EACH ROW
                        BEGIN
                            INSERT INTO Warehouse (WarehouseID,ProductId, Warehouse_quantity) VALUES ('',NEW.ProductId,'$quantity_product');
                        END;
                    ";
                $trigger_result = $mysqli->query($triggerQuery);
    
               
                $sql = "INSERT into Product values ('','$name_product','$img_1','$img_2','$img_3','$img_4','$price_product','$groups_product')";
                $result = $mysqli->query($sql);
                if($result){
                    echo'<script> alert("Thêm sản phẩm thành công");</script>';
                    echo'<script> window.location.href = "/PROJECT/Admin/Admin.php";</script>';
                }else{
                    echo 'lỗi';
                } 
            }
        }
    }

    if (isset($_POST['edit_product'])) {
        $id_product = $_POST['product_id'];
        if(isset($_POST['name_product'])){
            $name_product = $_POST['name_product'];
            $sql = "UPDATE Product SET ProductName = '$name_product' WHERE ProductID = '$id_product'";
            $result_name = $mysqli->query($sql);
        }
        if(isset($_POST['price_product'])){
            $price_product = $_POST['price_product'];
            $sql = "UPDATE Product SET Product_price = '$price_product' WHERE ProductID = '$id_product'";
            $result_price = $mysqli->query($sql);
        }
        if(isset($_POST['group'])){
            $groups_product = $_POST['group'];
            $sql = "UPDATE Product SET Groups = '$groups_product' WHERE ProductID = '$id_product'";
            $result_groups = $mysqli->query($sql);
        }
       echo'<script> alert("Thay đổi thành công!"); </script>';
       echo '<script> window.location.href = "/PROJECT/Admin/Admin.php"; </script>';  
    }

    if(isset($_POST['edit_warehouse'])){
        $quantity_ware_update = $_POST['Update_warehouse'];
        $warehouse_id = $_POST['id_warehouse'];
          $sql = "UPDATE warehouse SET Warehouse_quantity = '$quantity_ware_update' where WarehouseID = '$warehouse_id' ";
          $result = $mysqli->query($sql);
          if($result){
            echo '<script> alert("Cập nhật thành công!"); </script>';
            echo '<script> window.location.href = "/PROJECT/Admin/Admin.php";</script>';
          }
    }

    // cập nhật trạng thái
    if(isset($_POST['ordersID']) && isset($_POST['newStatus'])){
        $ordersID = $_POST['ordersID'];
        $newStatus = $_POST['newStatus'];
    
        // Thực hiện truy vấn UPDATE để cập nhật trạng thái trong CSDL
        if($newStatus ){
            $updateQuery = "UPDATE orders SET Status = '$newStatus' WHERE OrdersID = '$ordersID'";
            $result = $mysqli->query($updateQuery);
    
        // Trả về phản hồi JSON
        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Cập nhật trạng thái thành công']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Có lỗi xảy ra: '.$mysqli->error]);
        }
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Phương thức không hợp lệ']);
    }
    }
    

// xử lý các sự kiện onclick javascript
// ************************************
// Xóa sản phẩm
if(isset($_GET['product_id'])){
    $Product_id = $_GET['product_id'];

    $sql_warehouse = "DELETE FROM Warehouse WHERE ProductID = '$Product_id'";
    $result_warehouse = $mysqli->query($sql_warehouse);

    $sql_ordersDetail = "DELETE FROM ordersdetail WHERE ProductID = '$Product_id'";
    $result_ordersdetail = $mysqli->query($sql_ordersDetail);

    $sql_cart = "DELETE FROM cart WHERE ProductID = '$Product_id'";
    $result_cart = $mysqli->query($sql_cart);

    $sql_favorite = "DELETE FROM favorite WHERE ProductID = '$Product_id'";
    $result_favorite = $mysqli->query($sql_favorite);

    if($result_warehouse){
        $sql = "DELETE FROM Product WHERE ProductID = '$Product_id'";
        $result = $mysqli->query($sql);
        if($result){
            echo'<script> alert("Xóa sản phẩm thành công!"); </script>';
            echo '<script> window.history.back(); </script>';
        }else{
            echo $mysqli->error;
        }
    }
}
// xóa tài khoảng
if(isset($_GET['customers_id'])){
    $CustomersID = $_GET['customers_id'];


    $mysqli->query("DELETE FROM address where CustomersID = '$CustomersID'");
    if($mysqli->query("SELECT OrdersID from orders where CustomersID ='$CustomersID'")->num_rows > 0){
        $OrdersID = $mysqli->query("SELECT OrdersID from orders where CustomersID ='$CustomersID'")->fetch_assoc()['OrdersID'];
        $mysqli->query("DELETE FROM ordersdetail where OrdersID ='$OrdersID'");
        $mysqli->query("DELETE FROM orders where OrdersID ='$OrdersID'");
    }
    $mysqli->query("DELETE FROM cart where CustomersID ='$CustomersID'");
    $mysqli->query("DELETE FROM favorite where CustomersID = '$CustomersID'");

    $result_delete_customers = $mysqli->query("DELETE FROM customers where CustomersID = '$CustomersID'");
    if($result_delete_customers){
        echo'<script> alert("Xóa tài khoảng người dùng thành công!"); </script>';
        echo '<script> window.history.back(); </script>';
    }else{
        echo $mysqli->error;
    }
}
// Xóa đơn hàng
if(isset($_GET['orders_id'])){
    $Orders_id = $_GET['orders_id'];

    $mysqli->query("DELETE FROM ordersdetail where OrdersID = '$Orders_id'");
    
    if($mysqli->query("DELETE FROM orders where OrdersID = '$Orders_id'")){
        echo'<script> alert("Xóa đơn hàng số '.$Orders_id.' thành công!"); </script>';
        echo '<script> window.history.back(); </script>';
    }else{
        echo $mysqli->error;
    }
}
?>
