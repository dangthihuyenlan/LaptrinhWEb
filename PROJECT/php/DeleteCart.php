<?php
include("/xampp/htdocs/PROJECT/libs/helper.php");
  db_connect();
  $Cartid = $_GET["cartID"];

  $sql = "delete from cart where CartID = '$Cartid'";
  $result = $mysqli->query($sql);
  if($result){
    echo'<script> alert("Xóa sản phẩm khỏi giỏ hàng thành công!");  </script>';
    echo'<script> window.location.href="/PROJECT/view/Giohang.php"; </script>';
  }else{
    echo "Không thành công";
  }
?>