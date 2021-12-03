<?php
include ('../layout/header_admin.php');
if(!isset($_SESSION["admin"]))
    echo "<script>location='login/dangnhapadmin.php'</script>";

?>
<?php
include ('../page/connect.php');
if(!isset($_GET["MaNV"]))
    echo "<script>location='nhanvienadmin.php'</script>";
$laydulieu="SELECT * FROM nhanvien  WHERE MaNhanVien='".$_GET["MaNV"]."'";
$truyvanlaydulieu=mysqli_query($conn,$laydulieu);
if(mysqli_num_rows($truyvanlaydulieu)>0)
{
    $cot=mysqli_fetch_array($truyvanlaydulieu);
}
else
{
    echo "<script>location='nhanvienadmin.php'</script>";

}

?>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $hoten=$_POST["hoten"];
    $tendangnhap=$_POST["tendangnhap"];
    $matkhau=$_POST["matkhau"];
    $ngaysinh=$_POST["ngaysinh"];
    $gioitinh=$_POST["gioitinh"];
    $dienthoai=$_POST["dienthoai"];
    $role=$_POST["role"];


        $them="UPDATE nhanvien SET Hoten='".$hoten."',TenDangNhap='".$tendangnhap."',MatKhau='".$matkhau."',Ngaysinh='".$ngaysinh."',Gioitinh='".$gioitinh."',Dienthoai='".$dienthoai."',id_role='".$role."' WHERE MaNhanVien='".$_GET["MaNV"]."'";

        if(mysqli_query($conn,$them))
        {
            echo "<script>alert('Cập nhật thành công')</script>";
            echo "<script>location='nhanvienadmin.php';</script>";
        }
        else{
            echo "<script>alert('Xảy ra lỗi')</script>";
        }


}
?>
<div class="page-content">
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button"></button>
            <h3>portlet Settings</h3>
        </div>
        <div class="modal-body">
            <p>Here will be a configuration form</p>
        </div>
    </div>
    <h3 class="page-title">
        Editable Tables <small>editable table samples</small>
    </h3>
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.php">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="nhanvienadmin.php">Nhân viên</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Thay đổi thông tin</a></li>
    </ul>

    <div class="col-lg-12">
        <div>
            <form method="post" action="<?php echo $_SERVER["REQUEST_URI"];?>">
                <table class="table table-bordered">
                    <tr>
                        <th>Họ tên</th>
                        <td><input required id="hoten" name="hoten" class="form-control" value="<?php echo $cot["Hoten"]?>" style="width: 500px"></td>

                    </tr>
                    <tr>
                        <th>Tên đăng nhập</th>
                        <td><input required id="tendangnhap" name="tendangnhap" class="form-control" value="<?php echo $cot["TenDangNhap"]?>" style="width: 500px"></td>

                    </tr>
                    <tr>
                        <th>Mật khẩu</th>
                        <td><input required  id="matkhau" name="matkhau" type="password"  class="form-control" value="<?php echo $cot["MatKhau"]?>" style="width: 500px"></td>

                    </tr>
                    <tr>
                        <th>Ngày sinh</th>
                        <td><input required type="date" id="ngaysinh" name="ngaysinh" value="<?php echo $cot["Ngaysinh"]?>" class="form-control" style="width: 500px"></td>

                    </tr>
                    <tr>
                        <th>Giới tính</th>
                        <td><input required id="gioitinh" name="gioitinh" value="<?php echo $cot["Gioitinh"]?>" class="form-control" style="width: 500px"></td>

                    </tr>
                    <tr>
                        <th>Điện thoại</th>
                        <td><input required id="dienthoai" name="dienthoai" value="<?php echo $cot["Dienthoai"]?>" class="form-control" style="width: 500px"></td>

                    </tr>
                    <?php
                    $quyen="SELECT * FROM roles";
                    $truyvanquyen=mysqli_query($conn,$quyen);
                    ?>
                    <tr>
                        <th>Quyền</th>
                        <td>
                            <select name="role" id="role">
                                <?php
                                while ($cotquyen=mysqli_fetch_array($truyvanquyen)){
                                    if($cotquyen["id_roles"]==$cot["id_role"]){
                                        ?>
                                        <option selected value="<?php echo $cotquyen["id_roles"]?>"><?php echo $cotquyen["name"]?></option>
                                    <?php } else { ?>
                                        <option  value="<?php echo $cotquyen["id_roles"]?>"><?php echo $cotquyen["name"]?></option>
                                    <?php } } ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th></th>
                        <th><input id="luu" type="submit" value="Lưu" class=" btn-success"></th>

                    </tr>





                </table>
            </form>
        </div>

    </div>

</div>



<?php
include ('../layout/footer-admin.php');
?>
