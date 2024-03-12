<?php
    session_start();

    if(isset($_SESSION["customersName"])){
        $name = $_SESSION["customersName"];
    }else{
        $name = "";
    }
    include("/xampp/htdocs/PROJECT/libs/helper.php");
    db_connect();
    $sql = "SELECT * FROM customers where User_name  = '$name'";
    $result = $mysqli->query($sql);
    if($result->num_rows >0){
        $row = $result->fetch_assoc();
        $User_Name = $row['User_name'];
        $Customers_ID = $row['CustomersID'];
        $Customers_Img = $row['Customers_img'];
        $Customers_Password = $row['CustomersPassword'];
        $Customers_Email = $row['CustomersEmail'];
        $Customers_Phone = $row['CustomersPhone'];
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="/PROJECT/css/Infor_user.css">
    <title>Giới thiệu về TLMB</title>
</head>
<body>
    <div class="header">
        <div class="title_header">
                <p>Hello, I'm <span>TLMB</span>always bringing you perfection</p>
            </div>
            <div class="main_header">
                <div class="home">
                    <a href="/PROJECT/Index.php"><ion-icon name="home-outline"></ion-icon></a>
                </div>
                <div class="name_header">
                    <p>The Last Mile Break </p>
                </div>
                <div class="user_header">
                    <div class="icon_love">
                    <a href="/PROJECT/view/Favorite.php"><ion-icon name="heart-outline"></ion-icon></a>
                    </div>
                    <div class="icon_cart">
                        <a href="/PROJECT/view/Giohang.php"><ion-icon name="cart-outline"></ion-icon></a>
                    </div>
                    <div class="icon_user">
                    <?php if($name != ""){
                       echo'<a href="/PROJECT/view/Infor_user.php"><ion-icon name="person-outline"></ion-icon></a>';
                    }else{
                       echo ' <a href="/PROJECT/view/Login.php"><ion-icon name="person-add-outline"></ion-icon></a>';
                    }
                    ?>
                   
                </div>
                </div>
            </div>
        <hr>
        </div>
        <nav>
            <div class="link_nav">
                <div class="menu_SP">
                    <input type="checkbox" id="menu">
                    <label for="menu"><p>Sản phẩm ⇣</p></label>
                    <div class="menu">
                        <ul>
                        <li><a href="/PROJECT/view/Categories/cuahang.php">Tất cả</a></li>
                        <hr>
                        <li><a href="/PROJECT/view/Categories/Ao_polo.php">Áo POLO</a></li>
                        <hr>
                        <li><a href="/PROJECT/view/Categories/Ao_thun.php">Áo Thun</a></li>
                        <hr>
                        <li><a href="/PROJECT/view/Categories/Ao_hoodie.php">Áo Hoodie</a></li>
                        <hr>
                        <li><a href="/PROJECT/view/Categories/Ao_sweater.php">Áo Sweater</a></li>
                        <hr>
                        <li><a href="/PROJECT/view/Categories/Quan.php">Quần</a></li>
                        <hr>
                        </ul>
                    </div>
                </div>
                <a href="/PROJECT/view/Order_details.php">Thông tin đơn hàng</a>
                <a href="/PROJECT/view/Contact.php">Liên Hệ</a>
                <a href="/PROJECT/view/Policy.php">Chính sách</a>
                <a href="/PROJECT/view/Introduce.php">Về TLMB</a>
            </div>
        </nav>
        <hr>
        <main>
            <div class="link">
                <a href="/PROJECT/Index.php">Trang chủ</a>
                <p>/</p>
                <p><b>Thông tin</b></p>
            </div>
            <div class="infor_user">
                <div class="content_user">
                <div class="content_1">
                    <div class="img_name">
                        <?php
                        if($Customers_Img == ''){
                           echo '<div class="img">'; 
                           echo '<img src="/PROJECT/images/Anhmacdinh.png" alt="">'; 
                           echo '</div>'; 
                        }else{
                            echo '<div class="img">'; 
                            echo '<img src="/PROJECT/images/anhuser/'.$Customers_Img.'" alt="">'; 
                            echo '</div>'; 
                        }
                        ?>
                    <div class="select_img">
                    <input type="checkbox"  id="img_select" style="display: none;">
                    <label for="img_select"><u >Thay đổi<ion-icon name="pencil-outline"></ion-icon></u></label>
                    <div class="input_select_img">
                        <form action="/PROJECT/php/xulyUser.php" method="post"  enctype="multipart/form-data">
                        <input type="file" name="file_img">
                        <input type="hidden" name="Customers_ID" value="<?php echo $Customers_ID ?>">
                        <input class="submit" name="edit_img" type="submit" value="Thay đổi">
                        </form>
                    </div>
                    </div>
                    </div>
                </div>
                <div class="content_2">
                    <b>THÔNG TIN CÁ NHÂN</b>
                    <div class="content">
                    <form action="/PROJECT/php/xulyUser.php" method="post">
                        <div class="content_name">
                        <input type="checkbox"  id="name" style="display: none;">
                        <div class="name_show">
                             <p>Tên đăng nhập:</p><span><?php echo $User_Name ?></span>
                             <label for="name"><u>Thay đổi<ion-icon name="pencil-outline"></ion-icon></u></label>
                            </div>
                            <div class="name_input">
                            <input class="name_user" type="text" name="name_user">
                            <input type="hidden" name="Customers_ID" value="<?php echo $Customers_ID ?>">
                            <input class="submit" name="edit_name" type="submit" value="Thay đổi">
                            </div>
                        </div>

                        <div class="content_name">
                        <input type="checkbox"  id="email" style="display: none;">
                            <div class="name_show">
                             <p>Email:</p><span><?php echo $Customers_Email ?></span>
                             <label for="email"><u>Thay đổi<ion-icon name="pencil-outline"></ion-icon></u></label>
                            </div>
                            <div class="name_input">
                            <input class="name_user" type="email" name="email_user">
                            <input type="hidden" name="Customers_ID" value="<?php echo $Customers_ID ?>">
                            <input class="submit" type="submit" name="edit_email" value="Thay đổi">
                            </div>
                        </div>

                        <div class="content_name">
                        <input type="checkbox"  id="sdt" style="display: none;">
                            <div class="name_show">
                             <p>Số điện thoại:</p><?php
                                 if($Customers_Phone == ''){
                                    echo'<span> chưa có số điện thoại </span>';
                                 }else{
                                    echo '<span> '.$Customers_Phone.'</span>';
                                 }
                             ?>
                             <label for="sdt"><u>Thay đổi<ion-icon name="pencil-outline"></ion-icon></u></label>
                            </div>
                            <div class="name_input">
                            <input class="name_user" type="text" name="sdt_user">
                            <input type="hidden" name="Customers_ID" value="<?php echo $Customers_ID ?>">
                            <input class="submit" type="submit" name="edit_sdt" value="Thay đổi">
                            </div>
                        </div>
                        <hr class="hr">
                        <div class="address_user">
                            <input type="checkbox"id="address_submit" style="display: none;">
                            <div class="title_address">
                                <p style="color: blueviolet;">ĐỊA CHỈ CỦA TÔI</p>
                                <label for="address_submit">
                                    <span class="add_address">Thêm</span>
                                </label>
                            </div>

                            <div class="input_add_address">
                                <input type="text" name="hovaten" placeholder="Họ và Tên"><br>
                                <input type="hidden" name="Customers_ID" value="<?php echo $Customers_ID ?>">
                                <select name="province" id="province" onchange="getDistricts()">
                                    <option class="" value="" selected disabled>Tỉnh/Thành phố</option>
                                </select>

                                <select name="district" id="district" onchange="getWards()">
                                    <option class="" value="" selected disabled>Quận/Huyện</option>
                                </select>

                                <select name="ward" id="ward">
                                    <option class="" value="" selected disabled>Phường/Xã</option>
                                </select><br>
                                <input style="margin-top: 5px; width: 41% ;" type="text" name="specific"  placeholder="Địa chỉ cụ thể"><br>
                                <input style="width: 20%; margin-left: 100px ; margin-top: 5px; background-color: black; color:white; font-weight: 700;" type="submit" value="Lưu" name="add_address">
                            </div>

                            <hr class="hr">
                            <?php
                            $sql = "SELECT * FROM address where CustomersID = '$Customers_ID'";
                            $result = $mysqli->query($sql);
                            if($result->num_rows >0){
                                while($row_address = $result->fetch_assoc()){
                                    $AddressID = $row_address['AddressId'];
                                    $CustomersName = $row_address['CustomersName'];
                                    $Address = $row_address['address'];
                                    
                                    echo ' <div class="content_address">'; 
                                    echo ' <div class="content_address_1">'; 
                                    echo ' <div class="name_phone">'; 
                                    echo '     <p>'.$CustomersName.'</p>'; 
                                    echo '     <hr>'; 
                                    echo '     <p style="color: rgb(100, 98, 98) ;">'.$Customers_Phone.'</p>'; 
                                    echo ' </div>'; 
                                    echo ' <div class="address_delete">'; 
                                    echo '     <p style="color: rgb(100, 98, 98); margin-top: 5px;">'.$Address.'</p>'; 
                                    echo ' </div>'; 
                                    echo ' </div>'; 
                                    echo ' <div class="content_address_2" data-address_id ="'.$AddressID.'">'; 
                                    echo '    <button type="button" onclick="delete_address(this)"><ion-icon name="trash-outline"></ion-icon></button>'; 
                                    echo ' </div>'; 
                                    echo ' </div>'; 
                                }
                            }else{
                                echo ' <div class="content_address">'; 
                                echo ' <p>Vui lòng thêm địa chỉ <ion-icon name="warning-outline"></ion-icon></p>'; 
                                echo ' </div>'; 
                               }
                            ?>
                            
                            
                        </div>
                        
                        </form>
                        <div class="Logout_link">
                        <span class="Logout">
                        <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                    </div>
                    </div>
                </div>
               
                </div>
            </div>
        </main>
        <footer class="footer">
    <div class="waves">
      <div class="wave" id="wave1"></div>
      <div class="wave" id="wave2"></div>
      <div class="wave" id="wave3"></div>
      <div class="wave" id="wave4"></div>
    </div>
    <ul class="social-icon">
      <li class="social-icon__item"><a class="social-icon__link" href="https://www.facebook.com/jumrk03">
          <ion-icon name="logo-facebook"></ion-icon>
        </a></li>
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-twitter"></ion-icon>
        </a></li>
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-linkedin"></ion-icon>
        </a></li>
      <li class="social-icon__item"><a class="social-icon__link" href="https://www.instagram.com/jumr.t03/">
          <ion-icon name="logo-instagram"></ion-icon>
        </a></li>
    </ul>
    <ul class="menu_footer">
      <li class="menu__item"><a class="menu__link" href="/PROJECT/Index.php">Home</a></li>
      <li class="menu__item"><a class="menu__link" href="/PROJECT/view/Introduce.php">About</a></li>
      <li class="menu__item"><a class="menu__link" href="/PROJECT/view/Policy.php">Services</a></li>
      <li class="menu__item"><a class="menu__link" href="/PROJECT/view/Contact.php">Contact</a></li>

    </ul>
    <p>&copy;2023 THE LAST MILE BREAK| DEDICATED TO YOU ™</p>
  </footer>
</body>
<script>
    const logout =document.querySelector(".Logout");

    logout.addEventListener("click",()=>{
       const confirmLogout =confirm("Bạn có muốn đăng xuất?");
       if(confirmLogout){
         window.location.href = "/PROJECT/php/Logout.php";
       }
    })
</script>
<!-- script api address -->
<script>
function fetchData(url, callback) {
    fetch(url)
        .then(response => response.json())
        .then(data => callback(data))
        .catch(error => console.error('Error fetching data:', error));
}

function updateProvinces(provinces) {
    var provinceSelect = document.getElementById('province');
    provinceSelect.innerHTML = '<option class="" value="" selected disabled>Tỉnh/Thành phố</option>';
    provinces.forEach(function(province) {
        provinceSelect.innerHTML += '<option class="' + province.code + '" value="' + province.name + '">' + province.name + '</option>';
    });
}

function updateDistricts(districts) {
    var districtSelect = document.getElementById('district');
    districtSelect.innerHTML = '<option value="" selected disabled>Quận/Huyện</option>';
    districts.forEach(function(district) {
        districtSelect.innerHTML += '<option class="' + district.code + '" value="' + district.name + '">' + district.name + '</option>';
    });
}

function updateWards(wards) {
    var wardSelect = document.getElementById('ward');
    wardSelect.innerHTML = '<option value="" selected disabled>Phường/Xã</option>';
    wards.forEach(function(ward) {
        wardSelect.innerHTML += '<option class="' + ward.code + '" value="' + ward.name + '">' + ward.name + '</option>';
    });
}

function getDistricts() {
    var selectedProvinceCode = document.getElementById('province').options[document.getElementById('province').selectedIndex].classList;;
    if (selectedProvinceCode) {
        var apiUrl = 'https://provinces.open-api.vn/api/d?depth=2&code=' + selectedProvinceCode;
        fetchData(apiUrl, function(data) {
            // Lọc danh sách quận/huyện theo mã tỉnh/thành phố được chọn
            var districtsInSelectedProvince = data.filter(function(district) {
                return district.province_code == selectedProvinceCode;
            });
            updateDistricts(districtsInSelectedProvince);
        });
    }
}


function getWards() {
    var selectedDistrictCode = document.getElementById('district').options[document.getElementById('district').selectedIndex].classList;;
    if (selectedDistrictCode) {
        var apiUrl = 'https://provinces.open-api.vn/api/w?depth=2&code=' + selectedDistrictCode;
        fetchData(apiUrl, function(data) {
            // Lọc danh sách xã theo mã quận/huyện được chọn
            var wardsInSelectedDistrict = data.filter(function(ward) {
                return ward.district_code == selectedDistrictCode;
            });
            updateWards(wardsInSelectedDistrict);
        });
    }
}


// Lấy danh sách tỉnh/thành phố ban đầu khi trang được tải
fetchData('https://provinces.open-api.vn/api/?depth=2', function(data) {
    updateProvinces(data);
});
</script>
<!-- script delet address -->
<script>
    function delete_address(button){
        var Address_id =button.closest('.content_address_2').dataset.address_id;
        const confirmdelete = confirm("Bạn có muốn xóa địa chỉ này không?");
        if(confirmdelete){
            window.location.href = '/PROJECT/php/xulyUser.php?address_id=' + Address_id;
        }
    }
</script>
</html>