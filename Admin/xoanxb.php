<?php
    require '../connect/config.php';
    $id = $_GET['nxb_id'];
    $sql = "DELETE FROM nhaxuatban WHERE nxb_id=".$id;
    $sql = "SELECT *FROM sanpham where nxb_id".$id;
    if ($conn->query($sql) === TRUE) {
        header('Location: dsnxb.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }

$conn->close();
?>