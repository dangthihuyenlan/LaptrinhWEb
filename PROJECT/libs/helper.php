<?php
$host = "localhost";
$dbname = "data_qlbanhang"; 
$username = "root";
$password = "";

// Biến toàn cục để lưu trữ kết nối MySQLi

function db_connect(){
  global $host, $username, $password, $dbname, $mysqli;
  $mysqli = new mysqli($host, $username, $password, $dbname);
  if ($mysqli->connect_error) {
    die("Kết nối không thành công: " . $mysqli->connect_error);
  }
}

function db_disconnect(){
  global $mysqli;
  if (!is_null($mysqli)) {
    $mysqli->close();
  }
}

function generate_otp() {
  // Sinh số ngẫu nhiên có 6 chữ số
  return sprintf("%06d", mt_rand(1, 999999));
}

function send_email( $email,$name, $otp) {
  $to = $email;
  $subject = 'OTP for password reset';
  $message = "Dear $name,\n\nYour OTP for resetting your password is: $otp\n\nPlease enter this OTP on the confirmation page to proceed with resetting your password.\n\nBest regards,\nThe JUMR team";
  $headers = "From: JUMR <jumrk03@gmail.com>\r\n" .
             "Reply-To: jumrk03@gmail.com\r\n" .
             "X-Mailer: PHP/" . phpversion();
  // Gửi email
  mail($to, $subject, $message, $headers);
}
function get_url($url = '')
    {
        $uri = filter_input(INPUT_SERVER, 'REQUEST_URI',FILTER_SANITIZE_URL);
        $app_path = explode('/', $uri);
        return 'http://' . $_SERVER['HTTP_HOST'] . '/' . $app_path[1] . '/' . $url;
    }
?>