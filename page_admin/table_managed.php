<?php
include ('../layout/header_admin.php');
if(!isset($_SESSION["admin"]))
    echo "<script>location='login/dangnhapadmin.php'</script>";
?>
<?php
include ('../page/connect.php');
//if(isset($_GET['page'])){
//    $page=$_GET['page'];
//}
//else{
//    $page=1;
//}
//$rowperpgae=4;
//$perrow=$page * $rowperpgae-$rowperpgae;
//$sqldm="SELECT * FROM thanhvien,dondat,ct_dondat WHERE thanhvien.TenDangNhap = dondat.TenDangNhap  LIMIT $perrow,$rowperpgae";
//$querydm=mysqli_query($conn,$sqldm);
//$totalrow=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM thanhvien"));
//$totalpage=ceil($totalrow/$rowperpgae);
//$listpage="";
//for($i=1; $i<=$totalpage; $i++){
//    if($page==$i){
//        $listpage.='<li class="active"><a style="color: #d33b33" class="page-link" href="table_managed.php?danhsachSP=&page='.$i.'">'.$i.'</a></li>';
//    }
//    else
//    {
//        $listpage.='<li><a style="color: #d33b33" class="page-link" href="table_managed.php?danhsachSP&page='.$i.'">'.$i.'</a></li>';
//    }
//}
$sql="SELECT * FROM thanhvien";
$querydm=mysqli_query($conn,$sql);
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

											<th class="hidden-480">Họ tên</th>
											<th class="hidden-480">Tên đăng nhập</th>

                                            <th class="hidden-480">Điện thoại</th>
                                            <th class="hidden-480">Địa chỉ</th>
                                            <th class="hidden-480">Email</th>

<!--											<th>Chỉnh sửa</th>-->
										</tr>
									</thead>
									<tbody>
                                    <?php
                                    while ($cot=mysqli_fetch_array($querydm))
                                    {


                                    ?>
										<tr class="odd gradeX">

											<td><?php echo $cot["Hoten"]?></td>
											<td class="hidden-480"><?php echo $cot["TenDangNhap"]?></td>

											<td class="center hidden-480"><?php echo $cot["Dienthoai"]?></td>
                                            <td class="center hidden-480"><?php echo $cot["Diachi"]?></td>
                                            <td class="center hidden-480"><?php echo $cot["Email"]?></td>
<!--                                            <td class="center hidden-480">--><?php //echo $cot["NgayDat"]?><!--</td>-->
											<td ><a href="xemlichsu.php?khachhang=<?php echo $cot["TenDangNhap"]?>"><span class="label label-success">Xem lịch sử</span></a></td>
										</tr>
                                    <?php } ?>

									</tbody>
								</table>
                                <div class="row" >
                                    <ul class="pagination" style="margin-left: 350px;display: inline-block">
<!--                                        --><?php
//                                        echo $listpage;
//                                        ?>
                                    </ul>

                                </div>
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