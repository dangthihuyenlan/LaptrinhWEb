<?php
  include('/xampp/htdocs/PROJECT/libs/helper.php');
  db_connect();
  if(isset($_GET['favorite_id'])){ 
    $FavoriteID = $_GET['favorite_id'];
    $result = $mysqli->query("DELETE FROM Favorite where FavoriteID = '$FavoriteID'");
    if($result){
        echo '<script> alert("Xóa thành công!"); </script>';
        echo '<script> window.history.back(); </script>';
    }
  }
?>