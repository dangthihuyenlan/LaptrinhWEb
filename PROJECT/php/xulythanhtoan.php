 <?php
session_start();
if(isset($_SESSION["customersName"])){
  $name = $_SESSION["customersName"];
}else{
  $name = "";
}
include('/xampp/htdocs/PROJECT/libs/helper.php');
db_connect();
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
   if(isset($_POST['pay'])){
      $address = $_POST['address'];
      $procedure_ship = $_POST['procedure_ship'];
      $procedure_pay = $_POST['procedure_pay'];
      $date =  date("Y-m-d H:i:s");

      if($address == '' || $procedure_ship == '' || $procedure_pay == ''){
        echo'<script> alert("Vui lòng chọn thông tin giao hàng!"); </script>';
        echo'<script> window.history.back(); </script>';
      }else{

        $sql_CustomersID = "SELECT * FROM customers where User_name = '$name'";
        $result_customersID = $mysqli->query($sql_CustomersID);
        if($result_customersID->num_rows > 0){
          while ($row = $result_customersID->fetch_assoc()) {
            $CustomersID  = $row['CustomersID'];
            $CustomersPhone = $row['CustomersPhone'];
          }
          $sql_address = "SELECT * FROM address where AddressId = '$address'";
          $result_address = $mysqli->query($sql_address);
          if($result_address->num_rows>0){
            while ($row =$result_address->fetch_assoc()) {
              $CustomersName = $row['CustomersName'];
              $Customers_Address = $row['address'];
            }

          $sql_insert_order ="INSERT INTO orders values ('','$CustomersID','$procedure_ship','$procedure_pay','$Customers_Address','$CustomersPhone','$CustomersName','$date','Đang chờ xác nhận')";
          $result_insert_order = $mysqli->query($sql_insert_order);
          if($result_insert_order == true){
            $lastOrderID = $mysqli->insert_id;
          }

          $sql_cart ="SELECT * FROM cart where CustomersID = '$CustomersID'";
          $result_cart = $mysqli->query($sql_cart);

          $Order_product = array();
          if($result_cart->num_rows > 0){
            while($row = $result_cart->fetch_assoc() ){

              $Order_product[] = array(
                'CartID' => $row['CartID'],
                'ProductID' => $row['ProductID'],
                'Cart_size' => $row['Cart_Size'],
                'Cart_color' => $row['Cart_Color'],
                'Cart_quantity' => $row['Cart_quantity']
              );
            }
            foreach($Order_product as $Order_products){
              $CartID = $Order_products['CartID'];
              $ProductID = $Order_products['ProductID'];
              $Cart_size = $Order_products['Cart_size'];
              $Cart_color = $Order_products['Cart_color'];
              $Cart_quantity = $Order_products['Cart_quantity'];

              $sql_insert_orderDetail = "INSERT INTO ordersdetail values ('','$ProductID','$lastOrderID',' $Cart_size','$Cart_color','$Cart_quantity')";
              $result_orderDetail = $mysqli->query($sql_insert_orderDetail);

              if($result_orderDetail){
                $sql_delete_cart = "Delete FROM cart where CartID = '$CartID'";
                $result_delete_cart = $mysqli->query($sql_delete_cart);
                 $sql_update_quantity = "Update warehouse SET Warehouse_quantity = Warehouse_quantity - $Cart_quantity where ProductID = '$ProductID' ";
                 $result_update = $mysqli->query($sql_update_quantity);
              }

             
            }
            if($result_update){
              echo'<script> alert("Đã đặt hàng thành công!"); </script>';
              echo'<script> window.location.href="/PROJECT/view/Order_details.php"; </script>';
            }
           
          }
          }
          

        }
      }
   }
 }

?>
