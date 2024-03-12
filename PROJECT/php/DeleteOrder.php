<?php
  include("/xampp/htdocs/PROJECT/libs/helper.php");
  db_connect();
   $OrderID = $_GET['orderID'];
   $quantity = $_GET['quantity'];
   $productID = $_GET['productID'];
   $orderDetailId = $_GET['OrderDetail'];
   
  //  echo $OrderID ,$quantity, $productID ,$orderDetailId;
   
   
    $sql = "DELETE FROM ordersdetail where OrdersDetailID = '$orderDetailId'";
    $result_delete = $mysqli->query($sql);
    if($result_delete === true){

      $sql_select ="SELECT * FROM ordersdetail where OrdersID = '$OrderID'";
      $result_orderDetail = $mysqli->query($sql_select);
      if($result_orderDetail->num_rows == 0){
        $sql_delete_order = "DELETE  FROM orders where OrdersID = '$OrderID'";
        $result_delete = $mysqli->query($sql_delete_order);
      }
      $sql ="UPDATE Warehouse SET Warehouse_quantity = Warehouse_quantity + $quantity where ProductID = '$productID' ";
      $result_update = $mysqli->query($sql);
      if($result_update === true){
        echo '<script> alert("Hủy đơn hàng thành công!"); </script>';
        echo '<script> window.history.back(); </script>';
      }
   }
?>