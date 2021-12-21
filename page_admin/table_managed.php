<?php
include ('../layout/header_admin.php');
if(!isset($_SESSION["admin"]))
    echo "<script>location='login/dangnhapadmin.php'</script>";
?>
<?php
$search = isset($_GET['search_kh']) ? $_GET['search_kh'] : "";
if($search){
    $where ="WHERE Hoten LIKE '%".$search."%' ";
}
include ('../page/connect.php');
$item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 4;
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * $item_per_page;
if($search)
{
    $sql="SELECT * FROM thanhvien INNER JOIN dondat ON thanhvien.TenDangNhap = dondat.TenDangNhap WHERE Hoten LIKE '%".$search."%' AND TrangThai='1' GROUP BY dondat.TenDangNhap  LIMIT ".$item_per_page." OFFSET ".$offset ;
    $querydm=mysqli_query($conn,$sql);
    $total = mysqli_query($conn, "SELECT * FROM thanhvien WHERE Hoten LIKE '%".$search."%'");
}
else{
    $sql="SELECT * FROM thanhvien INNER JOIN dondat ON thanhvien.TenDangNhap = dondat.TenDangNhap WHERE TrangThai='1' GROUP BY dondat.TenDangNhap LIMIT ".$item_per_page." OFFSET ".$offset;
    $querydm=mysqli_query($conn,$sql);
    $total = mysqli_query($conn, "SELECT * FROM thanhvien ");
}
$total = $total->num_rows;
$totalpage = ceil($total / $item_per_page);


?>
<?php
$dondat="SELECT * FROM dondat";
$querydd=mysqli_query($conn,$dondat);
$rowdd=mysqli_fetch_array($querydd);
//?>

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
                                <div class="input-group">
                                    <div class="form-outline">
                                        <form action="" method="get">
                                            <input type="text" value="<?=isset($_GET['search_kh']) ? $_GET['search_kh'] : ""?>"  name="search_kh" id="form1" class="form-control" />
                                            <button style="margin-bottom: 10px" type="submit" class="btn btn-primary">
                                                <i class="icon-search"></i>
                                            </button>
                                        </form>

                                    </div>

                                </div>
								<table class="table table-striped table-bordered table-hover" id="sample_1">
									<thead>
										<tr>

											<th style="text-align: center" class="">Họ tên</th>
                                            <th style="text-align: center" class="">Tiền khách chi</th>
                                            <th class=""></th>

<!--											<th>Chỉnh sửa</th>-->
										</tr>
									</thead>
                                    <?php
                                    if(mysqli_num_rows($querydm) > 0){
                                    ?>
									<tbody>
                                    <?php
                                    while ($cot=mysqli_fetch_array($querydm))
                                    {
                                        $getcount = "SELECT MaDonDat FROM dondat WHERE TenDangNhap = '".$cot["TenDangNhap"]."' AND TrangThai='1'";
                                        $db = mysqli_query($conn,$getcount);
                                        $count = mysqli_num_rows($db);

                                        $tongchi="SELECT SUM(tongtiengoc) FROM dondat WHERE TenDangNhap = '".$cot["TenDangNhap"]."' AND TrangThai='1'";
                                        $truyvantt=mysqli_query($conn,$tongchi);
                                        $ttt=mysqli_fetch_row($truyvantt);

                                    ?>
										<tr class="odd gradeX">
											<td style="text-align: center"><?php echo $cot["Hoten"]?></td>
                                            <td style="text-align: center"><?php echo number_format($ttt[0],0,",","."); ?></td>
<!--                                          --><?php
//                                                if($count > 0){
//                                            ?>
											<td style="text-align: center;"><a href="xemtong.php?khachhang=<?php echo $cot["TenDangNhap"]?>"><span class="label label-success">Xem lịch sử</span></a></td>
<!--                                            --><?php //} else{?>
<!--                                                <td style="text-align: center;">-->
<!--                                                    <a><span  class="label bg-red">Khách chưa đơn</span></a>-->
<!--                                                </td>-->
<!--                                            --><?php //}?>
										</tr>
                                    <?php } ?>

									</tbody>
                                    <?php } ?>
								</table>
                                <?php
                                include ('phantrangkh.php')
                                ?>

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
