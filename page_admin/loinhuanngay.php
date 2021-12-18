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
            <h3>Widget Settings</h3>
        </div>
        <div class="modal-body">
            Widget settings form goes here
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
                    Doanh Thu 7 Ngày Qua
               </h3>
                <ul class="breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="index.php">Home</a>
                        <i class="icon-angle-right"></i>
                    </li>
                    <li><a href="#">   Doanh Thu 7 Ngày Qua</a></li>
                    <li class="pull-right no-text-shadow">
                        <div id="dashboard-report-range" class="dashboard-date-range tooltips no-tooltip-on-touch-device responsive" data-tablet="" data-desktop="tooltips" data-placement="top" data-original-title="Change dashboard date range">
                            <i class="icon-calendar"></i>
                            <span></span>
                            <i class="icon-angle-down"></i>
                        </div>
                    </li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <?php
        $tong = "SELECT SUM(tongtiengoc) FROM dondat WHERE NgayDat <= NOW() - INTERVAL 0 DAY AND NgayDat > NOW() - INTERVAL 8 DAY AND TrangThai = '1'";
        $query_tong = mysqli_query($conn,$tong);
        $result_tong = mysqli_fetch_row($query_tong);
        ?>
        <div id="dashboard">
            <!-- BEGIN DASHBOARD STATS -->
            <div class="row-fluid">
                <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
                    <div >
                        <div class="card-body">
                        <div class="">

                                <span style="font-size: 15px">Doanh thu 7 ngày qua : <?php echo number_format($result_tong[0],0,",",".")?> VNĐ</span>

                            <p >
                            <h4 class="text-success" style="margin-left: 150px;margin-bottom: 10px">

                            </h4>
                            </p>
                        </div>
                        </div>

                    </div>
                </div>
                <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
                    <div class="dashboard-stat green">

                    </div>
                </div>
                <div class="span3 responsive" data-tablet="span6  fix-offset" data-desktop="span3">

                </div>
                <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
                    <div class="dashboard-stat yellow">


                    </div>
                </div>
            </div>
            <!-- END DASHBOARD STATS -->
            <div class="clearfix"></div>
            <div class="row-fluid">
                <!--                        <p>Thống kê đơn hàng theo : <span id="text-date"></span></p>-->
                <!--                        <div id="myfirstchart" style="height: 250px;"></div>-->
                <canvas id="chart-js"   style="min-height: 250px; height: 250px; max-height: 350px; max-width: 50%;"></canvas>
            </div>
            <!--
                            </div>

                        </div>
                        <-- END PAGE CONTAINER-->
        </div>


        <!-- END PAGE -->
    </div>
    <?php
    $i = 0;
    for ($i;$i<7;$i++) {
        $sum = "SELECT SUM(tongtiengoc) FROM dondat WHERE NgayDat = DATE(NOW())-'$i' AND TrangThai = '1'";
        $query_sum = mysqli_query($conn,$sum);
        $get_sum = mysqli_fetch_row($query_sum);
        ?>
        <input type="hidden" id="day<?php echo $i?>" value="<?php echo $get_sum[0]?>">
    <?php }?>


    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->

    <?php
    include ('../layout/footer-admin.php');
    ?>

    <!--<script>-->
    <!--    $(document).ready(function () {-->
    <!--        thongke();-->
    <!--        new Morris.Line({-->
    <!--            element: 'myfirstchart',-->
    <!--            xkey: 'date',-->
    <!--            ykeys: ['date','order','sale','quanity'],-->
    <!--            labels: ['Đơn hàng','Doanh thu','Số lượng bán ra']-->
    <!--        });-->
    <!--        function thongke() {-->
    <!--            var text = '365 ngày qua';-->
    <!--            $("#text-date").text(text);-->
    <!--            $.ajax({-->
    <!--                url:"page_admin/thongke.php",-->
    <!--                method:"POST",-->
    <!--                dataType:"JSON",-->
    <!--                success:function (data) {-->
    <!--                    char.setData(data);-->
    <!--                    $("#text-date").text(text);-->
    <!--                }-->
    <!--            });-->
    <!--        }-->
    <!--    });-->
    <!---->
    <!--</script>-->
