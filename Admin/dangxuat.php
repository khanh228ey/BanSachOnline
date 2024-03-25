<?php 
    session_start();
    session_unset(); 
    echo "<script>window.location.replace('http://localhost:3000/index.php'); </script>";
?>