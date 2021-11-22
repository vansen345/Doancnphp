<?php
include ('../layout/header_admin.php');
if(!isset($_SESSION["admin"]))
    echo "<script>location='login/dangnhapadmin.php'</script>";
?>
<?php
include ('../page/connect.php');
if(isset($_GET["MaSanPham"]))
{
    $xoa="DELETE FROM sanpham WHERE MaSanPham='".$_GET["MaSanPham"]."'";
    if(mysqli_query($conn,$xoa))
    {
        echo "<script>alert('Xóa thành công')</script>";

    }
    else
    {
        echo "<script>alert('Sản phẩm đã có trong đơn đặt')</script>";
    }

}

if(isset($_GET['page'])){
    $page=$_GET['page'];
}
else{
    $page=1;
}
$rowperpgae=4;
$perrow=$page * $rowperpgae-$rowperpgae;
    $dssp="SELECT * FROM sanpham INNER JOIN loaisp ON sanpham.MaLoaiSP=loaisp.MaLoaiSP ORDER BY MaSanPham DESC  LIMIT $perrow,$rowperpgae ";
    $query=mysqli_query($conn,$dssp);
    $totalrow=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM sanpham"));
$totalpage=ceil($totalrow/$rowperpgae);
$listpage="";
for($i=1; $i<=$totalpage; $i++){
    if($page==$i){
        $listpage.='<li class="active"><a style="color: #d33b33" class="page-link" href="table_editable.php?danhsachSP=&page='.$i.'">'.$i.'</a></li>';
    }
    else
    {
        $listpage.='<li><a style="color: #d33b33" class="page-link" href="table_editable.php?danhsachSP&page='.$i.'">'.$i.'</a></li>';
    }
}

?>
<?php
$role= "SELECT * FROM nhanvien WHERE TenDangNhap = '".$_SESSION["admin"]."'";
$queryrole=mysqli_query($conn,$role);
$layquyen= mysqli_fetch_array($queryrole);
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
							Editable Tables <small>editable table samples</small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="index.php">Home</a>
								<i class="icon-angle-right"></i>
							</li>
							<li>
								<a href="#">Sản phẩm</a>
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
									<div class="btn-group">
                                        <?php
                                        if($layquyen["id_role"]==1){


                                        ?>

                                        <a class="btn green" href="themspadmin.php">Thêm</a>
                                        <?php } ?>

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
								<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
									<thead>
										<tr>

											<th>Ảnh</th>
                                            <th>Tên Sản Phẩm</th>
											<th>Số lượng</th>
											<th>Giá</th>
											<th>Thông tin</th>
                                            <th>Danh mục</th>
                                            <th>Trạng thái</th>
											<th>Cập nhật/ sửa</th>
										</tr>
									</thead>
                                    <?php

                                    ?>
									<tbody>
                                    <?php
//
                                    while ($cot=mysqli_fetch_array($query)){
                                    $sql="SELECT * FROM trangthai WHERE id_status = '".$cot["TrangThai"]."'";
                                    $trangthai=mysqli_query($conn,$sql);
                                    $laytrangthai = mysqli_fetch_array($trangthai);



                                        ?>
										<tr >
                                            <td><img class="img-fluid" src="../images/product/hinhanh/<?php echo $cot["Anh"]?>" alt="" /></td>

											<td><?php echo $cot["TenSanPham"] ?></td>

											<td><?php echo $cot["SoLuong"] ?></td>
											<td class="center"><?=number_format($cot["DonGia"],0,",",".")?> VND</td>
											<td><?php echo $cot["ThongTin"]?></td>
                                            <td><?php echo $cot["TenLoai"]?></td>
                                            <td><?php echo $laytrangthai["tentrangthai"]?></td>


											<td>
                                                <?php
                                                if($layquyen["id_role"]==1){


                                                ?>
                                               <a href="suasanpham.php?MaSP=<?php echo $cot["MaSanPham"];?>"><span<i style="width: 29px" class="icon-edit"></i></span></a>
                                                <a onclick="return Del('<?php echo $cot["TenSanPham"];?>')"  href="<?php echo $_SERVER["PHP_SELF"];?>?MaSanPham=<?php echo $cot["MaSanPham"];?>"><span class="Xoadulieu"><i class=""></i>Xóa</span></a>
                                                <?php } ?>
                                            </td>

										</tr>
                                        <?php } ?>



									</tbody>

								</table>


							</div>

						</div>
                        <div class="pt" >
                            <ul class="pagination" style="margin-left: 350px;display: inline-block">
                                <?php
                                echo $listpage;
                                ?>
                            </ul>

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
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
<?php
include ('../layout/footer-admin.php')
?>
<script>
  function Del(name) {
      return confirm("Bạn có chắc muốn xóa sản phẩm: " + name + "?");

  }
</script>
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
