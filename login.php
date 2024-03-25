<?php
session_start();
require 'connect/config.php';
?>
<?php
//dang nhap
$username = "";
$pass = "";
$kq = "";
if (isset($_POST['submit'])) {
    $username = $_POST['txtuser'];
    $pass = $_POST['txtpass'];
    $sql = "SELECT * FROM user where email='$username' and matkhau ='$pass'";
    $sql1 = "SELECT * FROM admin_login where adm_name='$username' and matkhau = '$pass'";
    $result = $conn->query($sql);
    $result1 = $conn ->query($sql1); 
    //thực thi 1 truy vấn thông qua đối tượng kết nối $conn 
    if ($result->num_rows>0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['txtusername'] = $username;
            $_SESSION['hotenuser'] = $row["hotenuser"];
            $_SESSION['email'] = $row["email"];
            header('location: index.php');
            $row = $result->fetch_assoc();
        }
    }
    else if($result1->num_rows > 0){
        while ($row = $result1->fetch_assoc()){
        $_SESSION['txtusername'] = $username;
        echo "<script>window.location.replace('http://localhost:3000/Admin/index.php'); </script>";
        $row = $result1->fetch_assoc();
        }
    } 
    else {
        $kq = "Thông tin đăng nhập không chính xác";
    }
}
?>
<?php
//dangky?
$username1 = "";
$hoten = "";
$email = "";
$pass1 = "";
$repass = "";
$kq1 = "";
if (isset($_POST['dangki'])) {
    $hoten = $_POST['hoten'];
    $username1 = $_POST['user_name'];
    $email = $_POST['email'];
    $pass1 = $_POST['pass'];
    $repass = $_POST['repass'];
    if ($repass != $pass1) {
        $kq1 = "Mật khẩu không chính xác";
    } else {
        $sql = "INSERT INTO user(tendangnhap,hotenuser,email,matkhau)
                    VALUES('$username1','$hoten','$email','$pass1')";
        if (mysqli_query($conn, $sql)) {
            $username1 = "";
            $hoten = "";
            $email = "";
            $pass1 = "";
            $repass = "";
            $kq1 = " Đăng kí thành công , bạn có thể đăng nhập";
        } else {
            $kq1 = "Đăng kí không thành công kiểm tra lại thông tin";
        }
    }
    mysqli_close($conn);
}
?>