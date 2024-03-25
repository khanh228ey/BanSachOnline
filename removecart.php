<?php
// Xóa tất cả
if (isset($_POST['removeAll'])) {
    unset($_SESSION['cart']);
    header('Location: cart.php');
}
// Xóa 1 sản phẩm
if (isset($_POST['remove'])) {
    $idsprm = $_POST["idsprm"];
    if (isset($_SESSION['cart'][$idsprm])) {
        unset($_SESSION['cart'][$idsprm]);
        echo "<script>window.location.replace('http://localhost:3000/cart.php'); </script>";
    }
}
?>