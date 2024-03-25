<?php
    require "../connect/config.php";
?>
<?php
//them nhà xuat bản
if(isset($_POST['add']))
{
    $name = $_POST['name'];
    $sql="INSERT INTO  nhaxuatban (nxb_name) 
    VALUES ('$name')";
    if (mysqli_query($conn, $sql)) {
        header('Location: dsnxb.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

 ?>
 <?php
 //update nhà xuat ban
 if(isset($_POST['sua'])){
    $name = $_POST['name'];
    $id = $_POST['id'];
    $sql1 = "UPDATE nhaxuatban set nxb_name = '$name' where nxb_id = '$id'";
    if(mysqli_query($conn,$sql1)){
        header('Location: dsnxb.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
 }
 ?>
