<?php
    require '../connect/config.php';
    $id = $_GET['sp_id'];

    // sql to delete a record
    $sql = "DELETE FROM sanpham WHERE sp_id=".$id;

    if ($conn->query($sql) === TRUE) {
        header('Location: dssach.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }

$conn->close();
?>
        <script>
function myFunction() {
    alert("Xóa thành công");
}
</script>