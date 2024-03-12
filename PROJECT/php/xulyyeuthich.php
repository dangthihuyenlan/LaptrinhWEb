<?php 
include('/xampp/htdocs/PROJECT/libs/helper.php');
db_connect();
  if($_GET['name_customers'] != ''){
    $Name_customers = $_GET['name_customers'];
    $id_product = $_GET['id_product'];
    
    $id_customers = $mysqli->query("SELECT CustomersID from customers where User_name = '$Name_customers'")->fetch_assoc()['CustomersID'];
    $sql ="SELECT * FROM favorite where CustomersID = '$id_customers' and ProductID = '$id_product'";
    $result = $mysqli->query($sql);
    if($result->num_rows > 0){
        echo'<script> alert("Bạn đã thêm sản phẩm này vào yêu thích rồi"); </script>';
        echo'<script> window.history.back(); </script>';
    }else{
        $sql ="INSERT INTO  favorite values('','$id_customers','$id_product')";
        $result= $mysqli->query($sql);
        if($result){
            echo'<script> alert("Thêm vào yêu thích thành công"); </script>';
            echo'<script> window.history.back(); </script>';
        }
    }
  }else{
    echo'<script> alert("Vui lòng đăng nhập!"); </script>';
    echo'<script> window.history.back(); </script>';
  }

?>