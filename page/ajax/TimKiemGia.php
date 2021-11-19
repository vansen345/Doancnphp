<?php
include ('../connect.php');
$laysp="SELECT * FROM sanpham";

if(!empty($_POST["gia"]))
    $laysp="SELECT * FROM sanpham WHERE DonGia < '".$_POST["gia"]."'";
$truyvangia=mysqli_query($conn,$laysp);
?>

