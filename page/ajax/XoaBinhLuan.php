<?php
include ('../connect.php');

$xoabinhluan="DELETE FROM binhluan WHERE MaBinhLuan='".$_POST["mabinhluan"]."'";

if(mysqli_query($conn,$xoabinhluan))
    echo "Xoá bình luận thành công";
else
    echo "Đã xảy ra lỗi";
?>
