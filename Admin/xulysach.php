<?php
require '../connect/config.php';
?>
<?php
//them sach
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $hinhanh = $_FILES['hinhanh']['name'];
    move_uploaded_file($_FILES['hinhanh']['tmp_name'], '../img/' . $_FILES['hinhanh']['name']);
    $manxb = $_POST['nxb'];
    $gia = $_POST['gia'];
    $khuyenmai = $_POST['khuyenmai'];
    $giakhuyenmai = $_POST['giakhuyenmai'];
    $tacgia = $_POST['tacgia'];
    $mota = $_POST['mota'];
    $sql = "INSERT INTO sanpham( `sp_ten`, `sp_gia`, `sp_giakhuyenmai`, `sp_img`, `sp_khuyenmai`, `nxb_id`, `sp_mota`, `tacgia`) 
    VALUES('$name','$gia','$giakhuyenmai','$hinhanh','$khuyenmai','$manxb','$mota','$tacgia')";
    if (mysqli_query($conn, $sql)) {
        header('Location: dssach.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<?php
// Sua sach
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $hinhanh = $_FILES['hinhanh']['name'];
    move_uploaded_file($_FILES['hinhanh']['tmp_name'], '../images/' . $_FILES['hinhanh']['name']);
    $manhasx = $_POST['manhasx'];
    $gia = $_POST['gia'];
    $khuyenmai  = $_POST['khuyenmai'];
    $mota = $_POST['mota'];
    $giakhuyenmai = $_POST['giakhuyenmai'];
    $tacgia = $_POST['tacgia'];
    $sql1 = "UPDATE sanpham SET sp_ten='$name',sp_gia='$gia',sp_giakhuyenmai='$giakhuyenmai',
    sp_img='$hinhanh',sp_khuyenmai='$khuyenmai',
    nxb_id='$manhasx',sp_mota='$mota',tacgia='$tacgia'
    WHERE sp_id= '$id' ";
        if (mysqli_query($conn, $sql1)) {
            header('Location: dssach.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

?>

