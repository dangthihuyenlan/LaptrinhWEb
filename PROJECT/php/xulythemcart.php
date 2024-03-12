<?php
 session_start();

 if(isset($_SESSION["customersName"])){
     $name = $_SESSION["customersName"];
 }else{
     $name = "";
 }
include("/xampp/htdocs/PROJECT/libs/helper.php");
 if($_SERVER['REQUEST_METHOD']  == 'POST'){
    if(isset($_POST['more'])){
        $ProductID = $_POST['ProductID'];
        $color = $_POST['color'];
        $size = $_POST['size'];
        $quantity = $_POST['soluong'];
        $warehouse = $_POST['warehouse'];

        if($quantity > $warehouse){
            echo '<script> alert("Sản phẩm trong kho còn chỉ còn '.$warehouse.'"); </script>';
            echo '<script> window.history.back();  </script>';
        }else{
            db_connect();

         $sql = "SELECT CustomersID FROM customers WHERE User_name = '$name'";
         $result_customers = $mysqli->query($sql);
            if ($result_customers->num_rows > 0) {
           $row = $result_customers->fetch_assoc();
           $customerID = $row['CustomersID'];
           $sql = "INSERT INTO cart
                   VALUES ('','$customerID', '$ProductID','$size','$color','$quantity')";
                   
           $result_insert = $mysqli->query($sql);
               if($result_insert){
                   echo'<script>alert("Thêm vào giỏ hàng thành công!");</script>';
                   echo'<script>window.history.back();</script>';
               }else{
                   echo $mysqli->error;
               }
        } else {
               echo '<script>alert("Vui lòng đăng nhập!"); </script>';
               echo '<script>window.history.back(); </script>';
    }
} 
}    
}
?>