<?php
include ('../connect.php');

$type=$_POST['type'];
$id=$_POST['id'];
if($type=='like'){
    $sqllike="UPDATE likecmt SET like_count=like_count+1 WHERE id_like= '".$id."'";
}else{
    $sqllike="UPDATE likecmt SET like_count=like_count-1 WHERE id_like= '".$id."'";

}

$querycmt=mysqli_query($conn,$sqllike);
?>
