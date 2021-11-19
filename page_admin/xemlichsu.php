<?php
include ('../layout/header_admin.php');
if(!isset($_SESSION["admin"]))
    echo "<script>location='login/dangnhapadmin.php'</script>";
?>
<?php
include ('../page/connect.php');
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
                    Managed Tables <small>managed table samples</small>
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="index.php">Home</a>
                        <i class="icon-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Data Tables</a>
                        <i class="icon-angle-right"></i>
                    </li>
                    <li><a href="#">Managed Tables</a></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
            <div class="span12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box light-grey">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-globe"></i>Managed Table</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"></a>
                            <a href="#portlet-config" data-toggle="modal" class="config"></a>
                            <a href="javascript:;" class="reload"></a>
                            <a href="javascript:;" class="remove"></a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="btn-group">
                                <button id="sample_editable_1_new" class="btn green">
                                    Add New <i class="icon-plus"></i>
                                </button>
                            </div>
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
                        <?php
                            if(isset($_GET["khachhang"])){
                                $magiaodich=$_GET["khachhang"];
//                                $sql="SELECT * FROM dondat WHERE TenDangNhap = '".$magiaodich."'";
//                                $query=mysqli_query($conn,$sql);
//                                $layid=mysqli_fetch_array($query);
                            } else{
                                $magiaodich="";
                            }



                            $sql3="SELECT * FROM dondat WHERE TenDangNhap = '".$magiaodich."' ";
                            $query3=mysqli_query($conn,$sql3);
                            $layid3=mysqli_fetch_array($query3);

//                            $sql4 = "SELECT * FROM ct_dondat WHERE MaDonDat = '" . $layid3["MaDonDat"] . "' ";
//                            $query4 = mysqli_query($conn, $sql4);
//                            $layid4 = mysqli_fetch_array($query4);

                            $sql5 = "SELECT sanpham.*,ct_dondat.*,dondat.*,ct_dondat.SoLuong as 'sl' FROM ct_dondat JOIN sanpham ON ct_dondat.MaSanPham=sanpham.MaSanPham JOIN dondat ON ct_dondat.MaDonDat = dondat.MaDonDat  WHERE TenDangNhap ='".$magiaodich."' ";
                            $query5 = mysqli_query($conn, $sql5);

                            $tongtien="SELECT SUM(tongtien) FROM dondat WHERE TenDangNhap = '".$magiaodich."'";
                            $truyvan=mysqli_query($conn,$tongtien);
                            $laytt=mysqli_fetch_row($truyvan);










//                            $sqlselect= mysqli_query($conn,"SELECT * FROM dondat,sanpham,ct_dondat WHERE ct_dondat.MaSanPham = sanpham.MaSanPham AND thanhvien.TenDangNhap = dondat.TenDangNhap AND  ct_dondat.MaDonDat = '".$magiaodich."'" );
//                        $sqlselect="SELECT ct_dondat.*, ct_dondat.SoLuong as 'sl' FROM ct_dondat INNER JOIN  sanpham ON ct_dondat.MaSanPham = sanpham.MaSanPham WHERE MaDonDat='".$magiaodich."'";
//                        $queryctdd= mysqli_query($conn,$sqlselect);
//                        $sqlselect="SELECT sanpham.*,ct_dondat.* FROM ct_dondat INNER JOIN sanpham ON ct_dondat.MaSanPham=sanpham.MaSanPham WHERE MaDonDat='".$_GET["khachhang"]."'";
//                            $query=mysqli_query($conn,$sqlselect);
//
//                        $sqlselect2="SELECT thanhvien.*,dondat.* FROM dondat INNER JOIN thanhvien ON dondat.TenDangNhap=thanhvien.TenDangNhap WHERE MaDonDat='".$_GET["khachhang"]."'";
//                        $query2=mysqli_query($conn,$sqlselect);
//                        $sql="SELECT ct_dondat.* FROM ct_dondat JOIN sanpham ON sanpham.MaSanPham=ct_dondat.MaSanPham JOIN dondat ON ct_dondat.MaDonDat=dondat.MaDonDat";
//                            $query=mysqli_query($conn,$sql);
                        ?>

                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                            <tr>

                                <th>Mã đơn hàng</th>
                                <th class="hidden-480">Tên sản phẩm</th>
                                <th class="hidden-480">Số lượng</th>
<!--                                <th>Tổng chi</th>-->


                            </tr>
                            </thead>
                            <tbody>
                           <?php

                            while ( $layid5=mysqli_fetch_array($query5)){

                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $layid5["MaDonDat"]?></td>

                                <td><?php echo $layid5["TenSanPham"]?></td>
                                <td class="hidden-480"><?php echo $layid5["sl"]?></td>

                            </tr>
                            <?php } ?>
<!--                           <td>--><?//=number_format($laytt[0],0,",",".")?><!-- VND</td>-->

                           <tr>
                               <th colspan="2" >Tổng chi</th>
                               <th><?php  echo number_format($laytt[0],0,",",".");  ?></th>
                           </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6 responsive" data-tablet="span12 fix-offset" data-desktop="span6">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->

                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
            <div class="span6 responsive" data-tablet="span12 fix-offset" data-desktop="span6">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->

                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
    <!-- END PAGE CONTAINER-->
</div>
<!-- END PAGE -->
</div>
<!-- END CONTAINER -->

<?php
include ('../layout/footer-admin.php')
?>
