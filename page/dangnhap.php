<?php
session_start();
include ('connect.php');
$tendangnhap=$_POST["tendangnhap"];
$matkhau=$_POST["matkhau"];
$tranghientai=$_POST["tranghientai"];

$kttontai="SELECT * FROM thanhvien WHERE TenDangNhap = '".$tendangnhap."' and MatKhau = '".$matkhau."'";
$truyvan=mysqli_query($conn,$kttontai);
if(mysqli_num_rows($truyvan)>0)
{
    echo "<script>alert('Đăng nhập thành công')</script>";
    $_SESSION["tendangnhap"]=$tendangnhap;
    echo "<script>location='index-3.php'</script>";
}
else
{
    echo "<script>alert('Tài khoản hoặc mật khẩu không đúng')</script>";

}
?>
<script>
    location='<?php echo $tranghientai ?>';
</script>

