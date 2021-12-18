<?php
include ('../layout/header_admin.php');
if(!isset($_SESSION["admin"]))
    echo "<script>location='login/dangnhapadmin.php'</script>";
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
							Dashboard <small>statistics and more</small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="index.php">Home</a>
								<i class="icon-angle-right"></i>
							</li>
							<li><a href="#">Dashboard</a></li>
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
				<div id="dashboard">
					<!-- BEGIN DASHBOARD STATS -->
					<div class="row-fluid">
						<div class="span3 responsive" data-tablet="span6" data-desktop="span3">
							<div class="dashboard-stat blue">
								<div class="visual">
									<i class="icon-user"></i>
								</div>
                                <?php
                                $kh="SELECT * FROM thanhvien";
                                $truyvankh=mysqli_query($conn,$kh);
                                $laykh=mysqli_num_rows($truyvankh)
                                ?>
								<div class="details">
									<div class="number">
										<?php echo $laykh ?>
									</div>
									<div class="desc">                           
										Khách hàng
									</div>
								</div>
								<a class="more" href="table_managed.php">
								View more <i class="m-icon-swapright m-icon-white"></i>
								</a>                 
							</div>
						</div>
						<div class="span3 responsive" data-tablet="span6" data-desktop="span3">
							<div class="dashboard-stat green">
								<div class="visual">
									<i class="icon-shopping-cart"></i>
								</div>
                                <?php
                                $donhang="SELECT * FROM dondat";
                                $truyvandd= mysqli_query($conn,$donhang);
                                $tongdd=mysqli_num_rows($truyvandd)
                                ?>
								<div class="details">
									<div class="number"><?php echo $tongdd ?></div>
									<div class="desc">Đơn hàng</div>
								</div>
								<a class="more" href="dondatadmin.php">
								View more <i class="m-icon-swapright m-icon-white"></i>
								</a>                 
							</div>
						</div>
						<div class="span3 responsive" data-tablet="span6  fix-offset" data-desktop="span3">
							<div  class="dashboard-stat purple">
								<div class="visual">
									<i class="icon-calendar"></i>
								</div>
                                <?php
                                $sum = "SELECT SUM(tongtiengoc) FROM dondat WHERE NgayDat = DATE(NOW()) AND TrangThai = '1'";
                                $query_sum = mysqli_query($conn,$sum);
                                $get_sum = mysqli_fetch_row($query_sum);
                                ?>
								<div class="details">
                                    <div class="desc"> Tổng doanh thu trong ngày</div>
									<div class="number"><?=number_format($get_sum[0],0,",",".")?> VND</div>
								</div>

							</div>
						</div>
<!--                        <div class="span3 responsive" data-tablet="span6  fix-offset" data-desktop="span3">-->
<!--                            <div  class="dashboard-stat purple">-->
<!--                                <div class="visual">-->
<!--                                    <i class="icon-calendar"></i>-->
<!--                                </div>-->
<!--                                --><?php
//                                $sum2 = "SELECT SUM(tongtiengoc) FROM dondat WHERE NgayDat = MONTH() AND TrangThai = '1'";
//                                $query_sum2 = mysqli_query($conn,$sum2);
//                                $get_sum2 = mysqli_fetch_row($query_sum2);
//                                ?>
<!--                                <div class="details">-->
<!--                                    <div class="desc"> Tổng doanh thu trong ngày</div>-->
<!--                                    <div class="number">--><?//=number_format($get_sum2[0],0,",",".")?><!-- VND</div>-->
<!--                                </div>-->
<!---->
<!--                            </div>-->
<!--                        </div>-->


						<div class="span3 responsive" data-tablet="span6" data-desktop="span3">
							<div class="dashboard-stat yellow">
								<div class="visual">
									<i class="icon-money"></i>
								</div>
                                <?php
                                $doanhthu="SELECT SUM(tongtiengoc) FROM dondat WHERE TrangThai='1'";
                                $truyvan=mysqli_query($conn,$doanhthu);
                                $laydoanhthu=mysqli_fetch_row($truyvan);
                                ?>
								<div class="details">
                                    <div class="desc">Tổng doanh thu</div>
									<div class="number"><?=number_format($laydoanhthu[0],0,",",".")?> VND</div>

								</div>

							</div>
						</div>
					</div>
					<!-- END DASHBOARD STATS -->
					<div class="clearfix"></div>
					<div class="row-fluid">
<!--                        <p>Thống kê đơn hàng theo : <span id="text-date"></span></p>-->
<!--                        <div id="myfirstchart" style="height: 250px;"></div>-->
                        <div>
                            <canvas id="myChart"></canvas>
                        </div>
					</div>
                    <?php
                    $ddh="SELECT * FROM dondat WHERE TrangThai = '0'";
                    $ct=mysqli_query($conn,$ddh);
                    $tinh=mysqli_num_rows($ct);
                    ?>
<!--
				</div>

			</div>
			<-- END PAGE CONTAINER-->
		</div>


		<!-- END PAGE -->
	</div>
            <?php
            $i = 1;
            for ($i;$i<13;$i++) {
                $get_total = "SELECT SUM(tongtiengoc) as total FROM dondat WHERE month(NgayDat) = '$i' and TrangThai = '1'";
                $query = mysqli_query($conn, $get_total);
                $mysql = mysqli_fetch_array($query);
                ?>
                <input type="hidden" id="total<?php echo $i?>" value="<?php echo $mysql["total"]?>">
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
