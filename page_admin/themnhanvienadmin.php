<?php
include ('../layout/header_admin.php');
if(!isset($_SESSION["admin"]))
    echo "<script>location='login/dangnhapadmin.php'</script>";

?>
<?php
include ('../page/connect.php');

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

    $kttontai="SELECT * FROM nhanvien WHERE TenDangNhap='".$tendangnhap."'";
    $truyvan=mysqli_query($conn,$kttontai);
    if(mysqli_num_rows($truyvan)>0)
    {
        echo "<script>alert('Tên đăng nhập đã tồn tại')</script>";
    }
    else
    {
        $them="INSERT INTO nhanvien(Hoten,TenDangNhap,MatKhau,Ngaysinh,Gioitinh,Dienthoai) VALUES ('".$hoten."','".$tendangnhap."','".$matkhau."','".$ngaysinh."','".$gioitinh."','".$dienthoai."')";

        if(mysqli_query($conn,$them))
        {
            echo "<script>alert('Thêm thành công')</script>";
            echo "<script>location='nhanvienadmin.php';</script>";
        }
        else{
            echo "<script>alert('Xảy ra lỗi')</script>";
        }

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
        <li><a href="#">Thêm mới nhân viên</a></li>
    </ul>

    <div class="col-lg-12">
        <div>
            <form method="post" action="<?php echo $_SERVER["REQUEST_URI"];?>">
                <table class="table table-bordered">
                    <tr>
                        <th>Họ tên</th>
                        <td><input required id="hoten" name="hoten" class="form-control" style="width: 500px"></td>

                    </tr>
                    <tr>
                        <th>Tên đăng nhập</th>
                        <td><input required id="tendangnhap" name="tendangnhap" class="form-control" style="width: 500px"></td>

                    </tr>
                    <tr>
                        <th>Mật khẩu</th>
                        <td><input required  id="matkhau" name="matkhau" class="form-control" style="width: 500px"></td>

                    </tr>
                    <tr>
                        <th>Ngày sinh</th>
                        <td><input required type="date" id="ngaysinh" name="ngaysinh" class="form-control" style="width: 500px"></td>

                    </tr>
                    <tr>
                        <th>Giới tính</th>
                        <td><input required id="gioitinh" name="gioitinh" class="form-control" style="width: 500px"></td>

                    </tr>
                    <tr>
                        <th>Điện thoại</th>
                        <td><input required id="dienthoai" name="dienthoai" class="form-control" style="width: 500px"></td>

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
