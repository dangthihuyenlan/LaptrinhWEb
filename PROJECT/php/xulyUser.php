<?php
  include('/xampp/htdocs/PROJECT/libs/helper.php');
  db_connect(); 
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['edit_img'])){
        $Customers_ID = $_POST['Customers_ID'];
        $target_dir = "C:/Xampp/htdocs/PROJECT/images/anhuser/"; // Thư mục lưu trữ ảnh
        $target_file = $target_dir . basename($_FILES["file_img"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
        // Kiểm tra xem tệp có phải là hình ảnh thực sự không
        $check = getimagesize($_FILES["file_img"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo '<script> alert("Tệp này không phải hình ảnh!"); </script>';
            echo '<script> window.history.back(); </script>';
            $uploadOk = 0;
        }
        // Kiểm tra kích thước file
        if ($_FILES["file_img"]["size"] > 500000) {
            echo '<script> alert("Xin lỗi, tệp bạn quá lớn!"); </script>';
            echo '<script> window.history.back(); </script>';
            $uploadOk = 0;
        }
    
        // Cho phép chỉ các định dạng file hình ảnh cụ thể (có thể điều chỉnh theo nhu cầu)
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo '<script> alert("Xin lỗi, vui lòng tải tệp đúng định dạng(png, jpeg, gif)"); </script>';
            echo '<script> window.history.back(); </script>';
            $uploadOk = 0;
        }
    
        // Kiểm tra xem có lỗi nào không
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // Nếu mọi thứ đều đúng, thực hiện lưu trữ tệp và thông tin vào cơ sở dữ liệu
            if (move_uploaded_file($_FILES["file_img"]["tmp_name"], $target_file)) {
                $image_path = basename($_FILES["file_img"]["name"]);
    
                // Insert thông tin vào cơ sở dữ liệu
                $sql = "UPDATE customers SET Customers_img = '$image_path'  where CustomersID = '$Customers_ID'";
                if ($mysqli->query($sql) === TRUE) {
                     echo '<script> alert("Thay đổi ảnh thành công?"); </script>';
                     echo '<script> window.history.back(); </script>';
                } else {
                    echo "Error: " . $sql . "<br>" . $mysqli->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    if(isset($_POST['edit_name'])){
        $name_update = $_POST['name_user'];
        $CustomersID = $_POST['Customers_ID'];
        
        $sql = "SELECT  User_name FROM Customers where User_name = '$name_update'";
        $result = $mysqli->query($sql);
        if( $result-> num_rows > 0){
            echo '<script> alert("Tên người dùng đã tồn tại vui lòng nhập tên mới!"); </script>';
            echo '<script> window.history.back(); </script>';
        }else{
            $sql = "UPDATE Customers SET User_name  = '$name_update' WHERE CustomersID ='$CustomersID' ";
            $result = $mysqli->query($sql);
            if($result){
                echo '<script> alert("Cập nhật tên đăng nhập mới thành công!Vui lòng đăng nhập lại"); </script>';
                echo '<script> window.location.href = "/PROJECT/view/Login.php"; </script>';
            }
        }
      }
    if(isset($_POST['edit_email'])){
      $email_update = $_POST['email_user'];
      $CustomersID = $_POST['Customers_ID'];
      
      
          $sql = "UPDATE Customers SET CustomersEmail  = '$email_update' WHERE CustomersID ='$CustomersID' ";
          $result = $mysqli->query($sql);
          if($result){
              echo '<script> alert("Cập nhật Email mới thành công!Vui lòng đăng nhập lại"); </script>';
              echo '<script> window.location.href = "/PROJECT/view/Login.php"; </script>';
          }
      }
    if(isset($_POST['edit_sdt'])){
      $phone_update = $_POST['sdt_user'];
      $CustomersID = $_POST['Customers_ID'];
      
      
          $sql = "UPDATE Customers SET CustomersPhone  = '$phone_update' WHERE CustomersID ='$CustomersID' ";
          $result = $mysqli->query($sql);
          if($result){
              echo '<script> alert("Cập nhật số điện thoại mới thành công!"); </script>';
              echo '<script> window.history.back(); </script>';
          }
      } 
    if(isset($_POST['add_address'])){
        $Name_customers = $_POST['hovaten'];
        $Customers_ID = $_POST['Customers_ID'];
        $province = $_POST['province'];
        $district = $_POST['district'];
        $ward = $_POST['ward'];
        $specific = $_POST['specific'];


        $sql = "INSERT INTO address value ('','$Customers_ID',' $Name_customers','$specific, $ward, $district, $province')";
        $result = $mysqli->query($sql);
        if($result){
            echo '<script> alert("Thêm địa chỉ mới thành công!"); </script>';
            echo '<script> window.history.back(); </script>';
        }else{
            echo $mysqli->error;
        }  
    }
}
   if(isset($_GET['address_id'])){
      $address_id = $_GET['address_id'];

      $sql = "DELETE from address WHERE AddressId = '$address_id'";
      $result = $mysqli->query($sql);
      if($result){
        echo'<script> alert("Xóa thành công!"); </script>';
        echo '<script> window.history.back(); </script>';
      }else{
        echo $mysqli->error;
      }
   }else{
    echo 'Lỗi';
   }
  db_disconnect();

?>