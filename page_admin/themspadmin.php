<?php
include ('../layout/header_admin.php');
if(!isset($_SESSION["admin"]))
    echo "<script>location='login/dangnhapadmin.php'</script>";

?>
<?php
include ('../page/connect.php');
$layloai="SELECT * FROM loaisp";
$truyvanloai=mysqli_query($conn,$layloai);
?>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $tensanpham=$_POST["tensanpham"];
    $soluong=$_POST["soluong"];
    $anh=$_FILES["anh"];
    $anh2=$_FILES["anh2"];
    $anh3=$_FILES["anh3"];
    $anh4=$_FILES["anh4"];
    $dongia=$_POST["dongia"];
    $thongtin=$_POST["thongtin"];
    $trangthai=$_POST["trangthai"];
    $loaisp=$_POST["loaisp"];
    $brand=$_POST["brand"];

    if($anh["type"]!="image/jpeg" && $anh["type"]!="image/png")
    {
        echo "<script>alert('Hãy chọn đúng định dạng hình')</script>";
        echo "<script>location='table_editable.php';</script>";
        return;
    }

    move_uploaded_file($anh["tmp_name"],"../images/product/hinhanh/".$anh["name"]);
    move_uploaded_file($anh2["tmp_name"],"../images/product/hinhanh/".$anh2["name"]);
    move_uploaded_file($anh3["tmp_name"],"../images/product/hinhanh/".$anh3["name"]);
    move_uploaded_file($anh4["tmp_name"],"../images/product/hinhanh/".$anh4["name"]);

    $them="INSERT INTO sanpham(TenSanPham,SoLuong,Anh,Anh2,Anh3,DonGia,ThongTin,Anh4,TrangThai,MaLoaiSp,MaThuongHieu) VALUES ('".$tensanpham."','".$soluong."','".$anh["name"]."','".$anh2["name"]."','".$anh3["name"]."','".$dongia."','".$thongtin."','".$anh4["name"]."','".$trangthai."','".$loaisp."','".$brand."')";
    if(mysqli_query($conn,$them))
    {
        echo "<script>alert('Thêm thành công')</script>";
        echo "<script>location='table_editable.php';</script>";
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
            <a href="table_editable.php">Sản phẩm</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Thêm sản phẩm</a></li>
    </ul>

    <div class="col-lg-12">
        <div>
            <form method="post" action="<?php echo $_SERVER["REQUEST_URI"];?>" enctype="multipart/form-data">
                <table class="table table-bordered">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <td><input  id="tensanpham" name="tensanpham" class="form-control" style="width: 500px"></td>

                    </tr>
                    <tr>
                        <th>Sô lượng</th>
                        <td><input  id="soluong" name="soluong" class="form-control" style="width: 500px"></td>

                    </tr>
                    <tr>
                        <th>Ảnh</th>
                        <td><input  type="file" id="anh" name="anh" class="form-control" style="width: 500px"></td>

                    </tr>
                    <tr>
                        <th>Ảnh</th>
                        <td><input  type="file" id="anh2" name="anh2" class="form-control" style="width: 500px"></td>

                    </tr>
                    <tr>
                        <th>Ảnh</th>
                        <td><input  type="file" id="anh3" name="anh3" class="form-control" style="width: 500px"></td>

                    </tr>
                    <tr>
                        <th>Ảnh</th>
                        <td><input  type="file" id="anh4" name="anh4" class="form-control" style="width: 500px"></td>

                    </tr>
                    <tr>
                        <th>Đơn giá</th>
                        <td><input  id="dongia" name="dongia" class="form-control" style="width: 500px"></td>

                    </tr>
                    <tr>
                        <th>Thông tin</th>
                        <td><input  id="thongtin" name="thongtin" class="form-control" style="width: 500px"></td>

                    </tr>
                    <?php
                    $sqltrangthai="SELECT * FROM trangthai";
                    $laytrangthai = mysqli_query($conn,$sqltrangthai)
                    ?>
                    <tr>
                        <th>Danh mục</th>
                        <td>
                            <select name="trangthai" id="trangthai">
                                <?php
                                while ($status=mysqli_fetch_array($laytrangthai)){
                                    ?>
                                    <option value="<?php echo $status["id_status"]?>"><?php echo $status["tentrangthai"]?></option>
                                <?php } ?>
                            </select>
                        </td>

                    </tr>
                    <tr>
                        <th>Danh mục</th>
                        <td>
                            <select name="loaisp" id="loaisp">
                                <?php
                                while ($cotloai=mysqli_fetch_array($truyvanloai)){
                                ?>
                                <option value="<?php echo $cotloai["MaLoaiSP"]?>"><?php echo $cotloai["TenLoai"]?></option>
                                <?php } ?>
                            </select>
                        </td>

                    </tr>
                    <?php
                    $thuonghieu="SELECT * FROM thuonghieu";
                    $truyvanthuonghieu=mysqli_query($conn,$thuonghieu);
                    ?>
                    <tr>
                        <th>Thương hiệu</th>
                        <td>
                            <select name="brand" id="brand">
                                <?php
                                while ($rowbrand=mysqli_fetch_array($truyvanthuonghieu)){
                                    ?>
                                    <option value="<?php echo $rowbrand["MaThuongHieu"]?>"><?php echo $rowbrand["TenThuongHieu"]?></option>
                                <?php } ?>
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
<script>
    $(document).ready(function () {
        $("#luu").click(function () {
            tensanpham=$('#tensanpham').val();
            soluong=$('#soluong').val();
            anh=$('#anh').val();
            dongia=$('#dongia').val();
            thongtin=$('#thongtin').val();
            trangthai=$('#trangthai').val();


            loi=0;
            if(tensanpham=="" || soluong=="" || anh=="" || dongia=="" || thongtin=="" || trangthai=="" )
            {
                loi++;

                $("#thongbao").text("Hãy nhập đầy đủ thông tin");

            }
            if(matkhau!=nhaplaimatkhau)
            {
                loi++;
                $("#thongbao").text("Mật khẩu không trùng khớp");
            }
            if(isNaN(dienthoai))
            {
                loi++;
                $("#thongbao").text("Điện thoại phải là số!");

            }


            if (loi!=0)
            {
                return false;
            }
        });


    });
</script>
