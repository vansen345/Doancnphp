<?php
include ('../layout/header_admin.php');
if(!isset($_SESSION["admin"]))
    echo "<script>location='login/dangnhapadmin.php'</script>";
?>
<?php
include ('../page/connect.php');
//if(!isset($_GET["khachhang"]))
//    echo "<script>location='table_managed.php';</script>";

$laychitiet="SELECT * FROM thanhvien WHERE TenDangNhap ='".$_GET["khachhang"]."'";
$truyvanlaychitiet=mysqli_query($conn,$laychitiet);
$cotDDH = mysqli_fetch_array($truyvanlaychitiet);

$tongtien="SELECT SUM(tongtiengoc) FROM dondat WHERE TenDangNhap = '".$_GET["khachhang"]."' AND TrangThai='1'";
$truyvan=mysqli_query($conn,$tongtien);
$laytt=mysqli_fetch_row($truyvan);




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
                    Kh??ch H??ng <small>L???ch s??? giao d???ch</small>
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="../page_admin/index.php">Home</a>
                        <i class="icon-angle-right"></i>
                    </li>
                    <li>
                        <a href="../page_admin/table_managed.php">Kh??ch h??ng</a>
                        <i class="icon-angle-right"></i>
                    </li>
                    <li><a href="#">L???ch s??? giao d???ch</a></li>
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
                        <div class="caption"><i class="icon-edit"></i>L???ch s??? giao d???ch</div>
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
                        <?php

                        ?>
                        <div>
                            <form id="duyethang" method="post" action="<?php echo $_SERVER["REQUEST_URI"];?>">

                                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                    <tbody>
                                    <h3>Th??ng tin kh??ch h??ng</h3>
                                    <tr>
                                        <td>
                                            <b><i class="icon-user"></i> H??? t??n:</b> <?php echo $cotDDH["Hoten"];?> <br>
<!--                                            <b><i class="icon-map-marker"></i> ?????a ch???:</b> --><?php //echo $cotDDH["Diachi"];?><!--<br>-->
                                            <b><i class="icon-phone"></i> S??? ??i???n tho???i:</b> <?php echo $cotDDH["Dienthoai"];?><br>
                                        </td>
                                        <?php
                                        $countsl = "SELECT MaDonDat FROM dondat WHERE TenDangNhap = '".$_GET["khachhang"]."' AND TrangThai='1'";
                                        $db = mysqli_query($conn,$countsl);
                                        $count = mysqli_num_rows($db);

                                        $tongtien2="SELECT SUM(tongtiengoc) FROM dondat WHERE TenDangNhap = '".$_GET["khachhang"]."' AND TrangThai='1'";
                                        $truyvan2=mysqli_query($conn,$tongtien2);
                                        $laytt2=mysqli_fetch_row($truyvan2);

                                        $goal2=5000000;
                                        $laygoal2= number_format($goal2,0,",",".");
                                        $vip2= 10000000;
                                        $layvip2= number_format($vip2,0,",",".");
                                        ?>
                                        <td>
                                            <?php if($laytt2[0] > $goal2){ ?>
                                                <b><i class="icon-user"></i> Lo???i:</b> Kh??ch ti???m n??ng <br>
                                            <?php } else  { ?>
                                            <b><i class="icon-user"></i> Lo???i:</b> Kh??ch th?????ng <br>
                                            <?php } ?>
                                            <b><i class="icon-mail-reply-all"></i> Email:</b> <?php echo $cotDDH["Email"] ?><br>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <?php

                        ?>

                        <?php
                        $countsp="SELECT MaSanPham FROM ct_dondat INNER JOIN dondat ON ct_dondat.MaDonDat = dondat.MaDonDat  WHERE TenDangNhap= '".$_GET["khachhang"]."' AND TrangThai='1'";
                        $sp=mysqli_query($conn,$countsp);
                        $laysp=mysqli_num_rows($sp)
                        ?>

                        <?php
//                        $point=0;
//                        $tinhpoint="SELECT tongtiengoc FROM dondat WHERE TenDangNhap= '".$cotDDH["TenDangNhap"]."' AND TrangThai='1' AND tongtiengoc > '2000000' ";
//                        $laypoint=mysqli_query($conn,$tinhpoint);
//                        while ($truyvanpoint=mysqli_fetch_array($laypoint)){
//                            $point=  number_format($laypoint["tongtiengoc"],0,",",".");
//                        }
                        ?>

                        <?php
                        $firsdate="SELECT NgayDat FROM dondat WHERE TenDangNhap = '".$_GET["khachhang"]."' AND TrangThai='1'";
                        $date=mysqli_query($conn,$firsdate);
                        $xuatdate=mysqli_fetch_array($date);
                        ?>
                        <form id="duyethang" method="post" action="<?php echo $_SERVER["REQUEST_URI"];?>">
                            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                <tbody>
                                <h3>L???ch s??? giao d???ch</h3>
                                <tr>
                                    <td>
                                        <b><i class="icon-file-text"></i> T???ng s??? h??a ????n:</b> <?php echo $count ?>  <br>
                                        <b><i class="icon-shopping-cart"></i> T???ng s??? s???n ph???m ???? mua:</b> <?php echo $laysp ?> <a data-toggle="modal" data-target=".bd-example-modal-lg" ><i class="icon-search" ></i></a><br>
                                        <b><i class="icon-money"></i> T???ng chi: </b> <?php echo number_format($laytt[0],0,",","."); ?><br>
                                    </td>
                                    <?php
//                                    $show=0;
//                                   $point= number_format($truyvanpoint["tongtiengoc"],0,",",".");
//                                    $mucpoint= 3000000;
//                                    $formatpoint= number_format($mucpoint,0,",",".");
                                    ?>
                                    <td>
                                          <b><i class="icon-calendar"></i> Ng??y b???t ?????u mua h??ng:</b> <?php
                                        $date=date_create($xuatdate["NgayDat"]);
                                        echo date_format($date,"d/m/Y");?><br>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>

                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">-->
<!--    Launch demo modal-->
<!--</button>-->

<!-- Modal -->
<?php
$sql5 = "SELECT sanpham.*,ct_dondat.*,dondat.*,ct_dondat.SoLuong as 'sl',dondat.TrangThai as 'tt' FROM ct_dondat JOIN sanpham ON ct_dondat.MaSanPham=sanpham.MaSanPham JOIN dondat ON ct_dondat.MaDonDat = dondat.MaDonDat  WHERE dondat.TrangThai='1' AND TenDangNhap = '".$_GET["khachhang"]."'";
$query5 = mysqli_query($conn, $sql5);
?>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="padding: 35px">
            <div class="title-left">
                <h3 ">S???n Ph???m ???? Mua</h3>
            </div>
            <table class="table table-striped table-bordered table-hover" id="sample_1">
                <thead>
                <tr>

                    <th class="hidden-480">M?? ????n h??ng</th>
                    <th class="hidden-480">T??n s???n ph???m</th>
                    <th class="hidden-480">S??? l?????ng</th>
                    <th class="hidden-480">????n gi??</th>
                    <th class="hidden-480">Ng??y mua</th>

                </tr>
                </thead>
                <tbody>
                <?php

                while ( $layid5=mysqli_fetch_array($query5)){

                ?>
                <tr class="odd gradeX">

                    <td class="hidden-480" style="width: 150px"><?php echo $layid5["MaDonDat"]?></td>
                    <td class="center hidden-480" style="width: 250px"><?php echo $layid5["TenSanPham"]?></td>
                    <td class="center hidden-480" style="width: 150px"><?php echo $layid5["sl"]?></td>
                    <td class="center hidden-480" style="width: 150px"><?php echo number_format($layid5["Gia"],0,",",".");  ?></td>
                    <td class="center hidden-480" style="width: 150px"><?php echo $layid5["NgayDat"]?></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?php
include ('../layout/footer-admin.php');
?>
