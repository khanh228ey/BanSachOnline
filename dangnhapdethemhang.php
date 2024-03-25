<?php
//dang nhap de them hang vao gio
session_start();
require 'connect/config.php';
?>
<?php
if(isset($_POST['submit'])){
    if(!isset($_POST['txtuser'])){
        header('location: acccount.php');
    }
    else{
        header('location: cart.php');
    }
}

?>