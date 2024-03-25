<?php
require "connect/config.php";
if (isset($_POST['dathang'])) {
    if (isset($_SESSION['cart'])) {
        $total = $_POST['total'];
        $email =  $_SESSION['email'];
        $ngaydat = $_POST['date'];
        $tenkh = $_SESSION['hotenuser'];
        $diachi = $_POST['diachi'];
        $hinhthucthanhtoan = $_POST['hinhthuctt'];
        $sql1 = "INSERT INTO `hoadon`(`tenkhachhang`, `diachi`, `hinhthucthanhtoan`, `thanhtien`, `email`, `ngaydat`)
         VALUES ('$tenkh','$diachi','$hinhthucthanhtoan','$total','$email','$ngaydat')";
        $row = $conn->query($sql1);
        if ($row === TRUE) {
            header('Location: xacnhandonhang.php');
            unset($_SESSION['cart']);
        } else {
            echo "đã xảy ra lỗi ktra lại code";
        }
    }
}
