<?php
include ('../layout/header_admin.php');
if(!isset($_SESSION["admin"]))
    echo "<script>location='login/dangnhapadmin.php'</script>";

?>
<?php
include ('../page/connect.php');
if(!isset($_GET["MaSP"]))
    echo "<script>location='table_editable.php'</script>";
$laydulieu="SELECT * FROM sanpham  WHERE MaSanPham='".$_GET["MaSP"]."'";
$truyvanlaydulieu=mysqli_query($conn,$laydulieu);
if(mysqli_num_rows($truyvanlaydulieu)>0)
{
    $cot=mysqli_fetch_array($truyvanlaydulieu);
}
else
{
    echo "<script>location='table_editable.php'</script>";

}

$layloai="SELECT * FROM loaisp";
$truyvanloai=mysqli_query($conn,$layloai);
?>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $tensanpham=$_POST["tensanpham"];
    $soluong=$_POST["soluong"];
    $anh=$cot["Anh"];
    $anh2=$cot["Anh2"];
    $anh3=$cot["Anh3"];
    $anh4=$cot["Anh4"];
    $dongia=$_POST["dongia"];
    $thongtin=$_POST["thongtin"];
    $trangthai=$_POST["trangthai"];
    $loaisp=$_POST["loaisp"];
    $brand=$_POST["brand"];


    if($_FILES["anh"]["name"]!="")
    {
        unlink("../images/product/hinhanh/".$anh);
        $anh=$_FILES["anh"]["name"];
        move_uploaded_file($_FILES["anh"]["tmp_name"],"../images/product/hinhanh/".$anh);
    }
    if($_FILES["anh2"]["name"]!="")
    {
        unlink("../images/product/hinhanh/".$anh2);
        $anh2=$_FILES["anh2"]["name"];
        move_uploaded_file($_FILES["anh2"]["tmp_name"],"../images/product/hinhanh/".$anh2);
    }
    if($_FILES["anh3"]["name"]!="")
    {
        unlink("../images/product/hinhanh/".$anh3);
        $anh3=$_FILES["anh3"]["name"];
        move_uploaded_file($_FILES["anh3"]["tmp_name"],"../images/product/hinhanh/".$anh3);
    }
    if($_FILES["anh4"]["name"]!="")
    {
        unlink("../images/product/hinhanh/".$anh4);
        $anh4=$_FILES["anh4"]["name"];
        move_uploaded_file($_FILES["anh4"]["tmp_name"],"../images/product/hinhanh/".$anh4);
    }
    $sua="UPDATE sanpham SET TenSanPham='".$tensanpham."',SoLuong='".$soluong."',Anh='".$anh."', Anh2='".$anh2."', Anh3='".$anh3."', DonGia='".$dongia."', ThongTin='".$thongtin."',Anh4='".$anh4."',TrangThai='".$trangthai."',MaLoaiSp='".$loaisp."',MaThuongHieu='".$brand."' WHERE MaSanPham='".$_GET["MaSP"]."' ";

   if(mysqli_query($conn,$sua))
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
        <li><a href="#">Sửa sản phẩm</a></li>
    </ul>

    <div class="col-lg-12">
        <div>
            <form method="post" action="<?php echo $_SERVER["REQUEST_URI"];?>" enctype="multipart/form-data">
                <table class="table table-bordered">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <td><input required id="tensanpham" name="tensanpham" class="form-control" style="width: 500px" value="<?php echo empty($_POST["tensanpham"])? $cot["TenSanPham"]:$_POST["tensanpham"]; ?>"></td>

                    </tr>
                    <tr>
                        <th>Sô lượng</th>
                        <td><input required id="soluong" name="soluong" class="form-control" style="width: 500px"  value="<?php echo empty($_POST["soluong"])? $cot["SoLuong"]:$_POST["soluong"]; ?>"></td>

                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <img width="100px" src="../images/product/hinhanh/<?php echo $cot["Anh"];?>">
                            <img width="100px" src="../images/product/hinhanh/<?php echo $cot["Anh2"];?>">
                            <img width="100px" src="../images/product/hinhanh/<?php echo $cot["Anh3"];?>">
                            <img width="100px" src="../images/product/hinhanh/<?php echo $cot["Anh4"];?>">
                        </td>
                    </tr>
                    <tr>
                        <th>Ảnh</th>
                        <td><input  type="file" id="anh" name="anh" class="form-control" style="width: 500px"></td>

                    </tr>
                    <tr>
                        <th>Ảnh</th>
                        <td><input  type="file" id="anh" name="anh2" class="form-control" style="width: 500px"></td>

                    </tr>
                    <tr>
                        <th>Ảnh</th>
                        <td><input  type="file" id="anh" name="anh3" class="form-control" style="width: 500px"></td>

                    </tr>
                    <tr>
                        <th>Ảnh</th>
                        <td><input  type="file" id="anh" name="anh4" class="form-control" style="width: 500px"></td>

                    </tr>
                    <tr>
                        <th>Đơn giá</th>
                        <td><input required id="dongia" name="dongia" class="form-control" style="width: 500px"  value="<?=number_format($cot["DonGia"],0,",",".")?>" ></td>

                    </tr>
                    <tr>
                        <th>Thông tin</th>
<!--                        <td><textarea  class="form-control col-md-8"  id="thongtin" name="thongtin" cols="30" rows="10" value="--><?php //echo empty($_POST["thongtin"])? $cot["ThongTin"]:$_POST["thongtin"]; ?><!--" required></textarea></td>-->
                        <td><textarea class="form-control col-md-8" name="thongtin" id="thongtin" cols="50" rows="30" style="height: 100px; color: black"><?php echo empty($_POST["thongtin"])? $cot["ThongTin"]:$_POST["thongtin"]; ?></textarea></td>
<!--                        <td><input required id="thongtin" name="thongtin" class="form-control" style="width: 500px"  value="--><?php //echo empty($_POST["thongtin"])? $cot["ThongTin"]:$_POST["thongtin"]; ?><!--"></td>-->

                    </tr>
                    <?php
                    $sqltrangthai="SELECT * FROM trangthai";
                    $laytrangthai = mysqli_query($conn,$sqltrangthai)
                    ?>
                    <tr>
                        <th>Trạng thái</th>
<!--                        <td><input required id="trangthai" name="trangthai" class="form-control" style="width: 500px"  value="--><?php //echo empty($_POST["trangthai"])? $cot["TrangThai"]:$_POST["trangthai"]; ?><!--"></td>-->
                        <td>
                            <select name="trangthai" id="trangthai">
                                <?php
                                while ($cotloai=mysqli_fetch_array($laytrangthai)){
                                    if($cotloai["id_status"]==$cot["TrangThai"]){
                                        ?>
                                        <option selected value="<?php echo $cotloai["id_status"]?>"><?php echo $cotloai["tentrangthai"]?></option>
                                    <?php } else { ?>
                                        <option  value="<?php echo $cotloai["id_status"]?>"><?php echo $cotloai["tentrangthai"]?></option>
                                    <?php } } ?>
                            </select>
                        </td>

                    </tr>
                    <tr>
                        <th>Danh mục</th>
                        <td>
                            <select name="loaisp" id="loaisp">
                                <?php
                                while ($cotloai=mysqli_fetch_array($truyvanloai)){
                                    if($cotloai["MaLoaiSP"]==$cot["MaLoaiSp"]){
                                    ?>
                                    <option selected value="<?php echo $cotloai["MaLoaiSP"]?>"><?php echo $cotloai["TenLoai"]?></option>
                                    <?php } else { ?>
                                <option  value="<?php echo $cotloai["MaLoaiSP"]?>"><?php echo $cotloai["TenLoai"]?></option>
                                <?php } } ?>
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
                                while ($cotbrand=mysqli_fetch_array($truyvanthuonghieu)){
                                    if($cotbrand["MaThuongHieu"]==$cot["MaThuongHieu"]){
                                        ?>
                                        <option selected value="<?php echo $cotbrand["MaThuongHieu"]?>"><?php echo $cotbrand["TenThuongHieu"]?></option>
                                    <?php } else { ?>
                                        <option  value="<?php echo $cotbrand["MaThuongHieu"]?>"><?php echo $cotloai["TenThuongHieu"]?></option>
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

