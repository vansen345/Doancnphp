<?php
include ('../layout/header_admin.php');
if(!isset($_SESSION["admin"]))
    echo "<script>location='login/dangnhapadmin.php'</script>";
?>

<?php
include ('../page/connect.php');
?>

<!-- END SIDEBAR -->
<!-- BEGIN PAGE -->
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
                    Khách Hàng <small>Thông tin khách hàng</small>
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="index.php">Home</a>
                        <i class="icon-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Khách Hàng</a>
                        <i class="icon-angle-right"></i>
                    </li>

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
                        <div class="caption"><i class="icon-user"></i>Thông tin khách hàng</div>
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
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th style="text-align: center" class="">ID</th>
                                    <th style="text-align: center" class="">Sản phẩm</th>
                                    <th class="">Số lượng bán</th>
                                    <th class="">Doanh thu</th>
                                    <th class="">Tiền vốn</th>
                                    <th class="">Lợi nhuận</th>
                                </tr>
                            </thead>
                        <tbody>
                        <?php
                        error_reporting(0);
                        $sort = "SELECT *, SUM(ct_dondat.SoLuong) as total 
                            FROM ct_dondat 
                            INNER JOIN sanpham ON ct_dondat.MaSanPham = sanpham.MaSanPham 
                            INNER JOIN dondat ON dondat.MaDonDat = ct_dondat.MaDonDat
                            WHERE dondat.TrangThai = '1' AND month(CURRENT_DATE) = month(NgayDat) 
                            GROUP BY ct_dondat.MaSanPham 
                            ORDER BY ct_dondat.MaSanPham DESC";
                        $query_sort = mysqli_query($conn, $sort);
                        $total_count = 0;
                        $total_revenues = 0;
                        $total_kho = 0;
                        $total_income = 0;
                        while ($row = mysqli_fetch_array($query_sort)){
                        $query_kho = mysqli_query($conn,"SELECT GiaNhap FROM kho WHERE MaSanPham = '".$row["MaSanPham"]."'");
                        $kho = mysqli_fetch_row($query_kho);

                        $total_count += $row["total"];
                        $total_revenues += $row["Gia"]*$row["total"];
//                        $total_kho += $kho[0] * $row["total"];
//                        $total_income += ($row["Gia"]*$row["total"]) - $kho[0];
                        ?>
                        <tr class="odd gradeX">
                            <td style="text-align: center"><?php echo $row["MaSanPham"]?></td>
                            <td style="text-align: center"><?php echo $row["TenSanPham"]?></td>
                            <td style="text-align: center"><?php echo $row["total"]?></td>
                            <td style="text-align: center"><?php echo number_format($row["Gia"]*$row["total"],0,",",".")?></td>
                            <td style="text-align: center"><?php echo number_format( $kho[0]* $row["total"],0,",",".")?></td>
                            <td style="text-align: center">  <?php echo number_format( ($row["Gia"]*$row["total"]) - $kho[0]* $row["total"],0,",",".")?></td>
                        <?php } ?>
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
<style>
    .pt
    {
        width:100%;
        justify-content:center;
        display:flex;
    }
    .pt li {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color .3s;
    }

    .pt li.active {


    }
    .pt ul{
        list-style-type: none !important;
        margin-right: 453px;
    }

    .pt li:hover:not(.active) {
        background-color: #ddd;
    }
</style>

