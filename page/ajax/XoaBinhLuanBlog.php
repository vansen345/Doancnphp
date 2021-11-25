<?php
include ('../connect.php');

$xoabinhluan="DELETE FROM binhluanblog WHERE MaBinhLuanBlog='".$_POST["mabinhluanblog"]."'";

if(mysqli_query($conn,$xoabinhluan))
    echo "Xoá bình luận thành công";
else
    echo "Đã xảy ra lỗi";
?>
<?php
