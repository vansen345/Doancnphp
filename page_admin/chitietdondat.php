<?php
include ('../layout/header_admin.php');
if(!isset($_SESSION["admin"]))
    echo "<script>location='login/dangnhapadmin.php'</script>";
?>

<?php
include ('../page/connect.php');
if(isset($_GET["MaDDXoa"]))
{
    $xoaDD="DELETE FROM ct_dondat WHERE MaDonDat='".$_GET["MaDDXoa"]."'";
    if(mysqli_query($conn,$xoaDD))
    {
        mysqli_query($conn, "DELETE FROM dondat WHERE MaDonDat='".$_GET["MaDDXoa"]."'");
        echo "<script>alert('Xóa thành công')</script>";
    }
    else
    {
        echo "<script>alert('Đã xảy ra lỗi')</script>";

    }
}
if(!isset($_GET["MaDD"]))
    echo "<script>location='dondatadmin.php';</script>";
$laychitiet="SELECT dondat.*, thanhvien.Hoten as 'hotentv',thanhvien.Dienthoai as 'dt' FROM dondat INNER JOIN  thanhvien ON dondat.TenDangNhap=thanhvien.TenDangNhap WHERE MaDonDat='".$_GET["MaDD"]."'";
$truyvanlaychitiet=mysqli_query($conn,$laychitiet);
if(mysqli_num_rows($truyvanlaychitiet)>0)
{
    $cotDDH=mysqli_fetch_array($truyvanlaychitiet);

    $laychitietDD="SELECT sanpham.*,ct_dondat.* FROM ct_dondat INNER JOIN sanpham ON ct_dondat.MaSanPham=sanpham.MaSanPham WHERE MaDonDat='".$_GET["MaDD"]."'";
    $truyvanlaychitietDD=mysqli_query($conn,$laychitietDD);
}
else{
    echo "<script>location='dondatadmin.php';</script>";
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
    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->
        <div class="row-fluid">
            <div class="span12">
                <!-- BEGIN STYLE CUSTOMIZER -->
                <div class="color-panel hidden-phone">
                    <div class="color-mode-icons icon-color"></div>
                    <div class="color-mode-icons icon-color-close"></div>
                    <div class="color-mode">
                        <p>THEME COLOR</p>
                        <ul class="inline">
                            <li class="color-black current color-default" data-style="default"></li>
                            <li class="color-blue" data-style="blue"></li>
                            <li class="color-brown" data-style="brown"></li>
                            <li class="color-purple" data-style="purple"></li>
                            <li class="color-grey" data-style="grey"></li>
                            <li class="color-white color-light" data-style="light"></li>
                        </ul>
                        <label>
                            <span>Layout</span>
                            <select class="layout-option m-wrap small">
                                <option value="fluid" selected>Fluid</option>
                                <option value="boxed">Boxed</option>
                            </select>
                        </label>
                        <label>
                            <span>Header</span>
                            <select class="header-option m-wrap small">
                                <option value="fixed" selected>Fixed</option>
                                <option value="default">Default</option>
                            </select>
                        </label>
                        <label>
                            <span>Sidebar</span>
                            <select class="sidebar-option m-wrap small">
                                <option value="fixed">Fixed</option>
                                <option value="default" selected>Default</option>
                            </select>
                        </label>
                        <label>
                            <span>Footer</span>
                            <select class="footer-option m-wrap small">
                                <option value="fixed">Fixed</option>
                                <option value="default" selected>Default</option>
                            </select>
                        </label>
                    </div>
                </div>
                <!-- END BEGIN STYLE CUSTOMIZER -->
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Editable Tables <small>editable table samples</small>
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="../page_admin/index.php">Home</a>
                        <i class="icon-angle-right"></i>
                    </li>
                    <li>
                        <a href="../page_admin/dondatadmin.php">Đơn hàng</a>
                        <i class="icon-angle-right"></i>
                    </li>
                    <li><a href="#">Chi tiết đơn đặt</a></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
            <div class="span12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-edit"></i>Editable Table</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"></a>
                            <a href="#portlet-config" data-toggle="modal" class="config"></a>
                            <a href="javascript:;" class="reload"></a>
                            <a href="javascript:;" class="remove"></a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">

                            <div class="btn-group pull-right">
                                <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="#">Print</a></li>
                                    <li><a href="#">Save as PDF</a></li>
                                    <li><a href="#">Export to Excel</a></li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <?php
                            $tp="SELECT * FROM pvs_tinhthanhpho WHERE matp = '".$cotDDH["thanhpho"]."'";
                            $querytp=mysqli_query($conn,$tp);
                            $laytp=mysqli_fetch_array($querytp);

                            $quanhuyen="SELECT * FROM pvs_quanhuyen WHERE maqh = '".$cotDDH["quanhuyen"]."'";
                            $queryqh=mysqli_query($conn,$quanhuyen);
                            $layqh=mysqli_fetch_array($queryqh);


                            ?>
                        <form id="duyethang" method="post" action="<?php echo $_SERVER["REQUEST_URI"];?>">
                            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">

                                <tbody>
                                <tr>
                                    <td>
                                        <b>Mã đơn đặt hàng:</b> <?php echo $cotDDH["MaDonDat"];?> <br>
                                        <b>Khách hàng:</b> <?php echo $cotDDH["hotentv"];?><br>
                                        <b>Nơi giao:</b> <?php echo $cotDDH["NoiGiao"];?>,<?php echo $layqh["name_quanhuyen"]?>,<?php echo $laytp["name_city"] ?> <br>
                                        <b>Số điện thoại:</b> <?php echo $cotDDH["dt"];?><br>
                                        <b>Ngày đặt:</b> <?php echo date("d/m/Y",strtotime($cotDDH["NgayDat"])); ?><br>
                                        <b>Trạng thái:
                                            <?php
                                            if($cotDDH["TrangThai"]==0) {
                                             echo 'Chưa giao';
                                             } else {
                                                echo 'Đã giao';

                                             }?>

                                        </b>

                                    </td>

                                    <td colspan="3">
                                        Trạng thái:

                                        <select name="TrangThai" id="TrangThai" class="form-control">

                                            <option  value="0">Chưa giao</option>
                                            <option value="1"> Đã giao</option>

                                        </select>
                                        <button style="margin-bottom: 10px" name="capnhattinhtrang" type="submit" class="btn-primary">Cập nhật</button>


                                        <br>
                                        <a style="margin-left: 70px;padding: 5px;margin-bottom: 5px" href="<?php echo $_SERVER["PHP_SELF"];?>?MaDDXoa=<?php echo $cotDDH["MaDonDat"]?>" id="xoa" class="btn-danger">Xóa</a>



                                    </td>


                                </tr>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng đặt</th>
                                    <th>ĐƠn giá</th>
                                    <th>Tổng tiền</th>
                                </tr>
                                <?php
                                $tongtien=0;
                                while ($cotCT=mysqli_fetch_array($truyvanlaychitietDD))
                                {

                                   $tongtien+=$cotCT["SoLuong"] * $cotCT["DonGia"];
                                ?>
                                <tr>
                                    <td><?php echo $cotCT["TenSanPham"]; ?></td>
                                    <td><?php echo $cotCT["SoLuong"]; ?></td>
                                    <td><?=number_format($cotCT["DonGia"],0,",",".")?></td>
                                    <td><?php
                                        $total=$cotCT["SoLuong"]*$cotCT["DonGia"];

                                        echo number_format($total,0,",",".");
                                        ?></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <th><?php  echo number_format($tongtien,0,",",".");  ?></th>
                                </tr>
                                </tbody>

                            </table>

                        </form>
                        </div>



                    </div>

                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER-->
</div>
<!-- END PAGE -->
</div>


<?php
if($_SERVER["REQUEST_METHOD"]=="POST") {


    $laynv = "SELECT * FROM nhanvien WHERE TenDangNhap='" . $_SESSION["admin"] . "'";
    $truyvanlaynv = mysqli_query($conn, $laynv);
    $cotTV = mysqli_fetch_array($truyvanlaynv);
    if (isset($_POST["TrangThai"])) {
        $trangthai = $_POST["TrangThai"];

        mysqli_query($conn, "UPDATE dondat SET TrangThai='" . $trangthai . "',MaNhanVien='" . $cotTV["MaNhanVien"] . "' WHERE MaDonDat='" . $_GET["MaDD"] . "'");

        echo "<script>location='dondatadmin.php';</script>";


    }
}


?>

<?php
include ('../layout/footer-admin.php');
?>
<script>
    $(document).ready(function () {
    $('#xoa').click(function () {
    if(!confirm("Bạn có thục sự muốn xóa"))
      return false;

     });

    });
</script>




