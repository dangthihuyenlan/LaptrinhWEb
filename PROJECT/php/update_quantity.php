<?php
include("/xampp/htdocs/PROJECT/libs/helper.php");
db_connect();
$CartID = $_POST['id'];
$change = $_POST['change'];
$sql = "UPDATE cart SET Cart_quantity = Cart_quantity + $change WHERE CartID = '$CartID'";
       $result = $mysqli->query($sql);

db_disconnect();
?>
