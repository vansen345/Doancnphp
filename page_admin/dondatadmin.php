<?php
include ('../layout/header_admin.php');
if(!isset($_SESSION["admin"]))
    echo "<script>location='login/dangnhapadmin.php'</script>";
?>
<?php
include ('../page/connect.php');
$truyvan=mysqli_query($conn,"SELECT dondat.*,thanhvien.Hoten as 'hotentv',nhanvien.Hoten as 'hotennv' FROM dondat JOIN thanhvien ON dondat.TenDangNhap=thanhvien.TenDangNhap JOIN nhanvien ON dondat.MaNhanVien=nhanvien.MaNhanVien");
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
                       Đơn Hàng <small>Thông tin đơn hàng</small>
                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="../page_admin/index.php">Home</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">Đơn hàng</a>
                            <i class="icon-angle-right"></i>

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
                            <div class="caption"><i class="icon-edit"></i>Thông tin đơn hàng</div>
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
                            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                <thead>
                                <tr>

                                    <th>Mã đơn đặt</th>
                                    <th>Khách hàng</th>
                                    <th>Nhân viên xử lý</th>
                                    <th>Trạng thái</th>
                                    <th>Nơi giao</th>
                                    <th>Ngày đặt</th>

                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($cot=mysqli_fetch_array($truyvan)){


                                    ?>
                                    <tr >


                                        <td><?php echo $cot["MaDonDat"] ; ?></td>

                                        <td><?php echo $cot["hotentv"]; ?></td>
                                        <td><?php echo $cot["hotennv"];?></td>

                                        <td>
                                            <?php if(trim($cot["TrangThai"])==0){
                                                echo "<span class='label bg-red'>Chưa giao</span>";
                                            } else {
                                                echo "<span class='label bg-green'>Đã giao</span>";

                                            } ?>

                                        </td>
                                        <td><?php echo $cot["NoiGiao"];?></td>
                                        <td><?php echo date("d/m/Y",strtotime($cot["NgayDat"])); ?></td>

                                        <td>
                                            <a href="chitietdondat.php?MaDD=<?php echo $cot["MaDonDat"]; ?>" class="btn-success">Xem chi tiết</a>
                                        </td>

                                    </tr>
                                <?php } ?>



                                </tbody>

                            </table>


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
		<!-- END SIDEBAR -->
		<!-- BEGIN PAGE -->

	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
<?php
include ('../layout/footer-admin.php')
?>