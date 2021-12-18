
<?php
include ('../layout/header.php')
?>


<!-- Offcanvas Overlay -->
<div class="offcanvas-overlay"></div>

<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Đơn hàng của bạn</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="../page/index-3.php">Home</a></li>
                                <li><a href="../page/shop-full-width.php">Shop</a></li>
                                <li class="active" aria-current="page">Đơn hàng của bạn</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

<!-- ...:::: Start Cart Section:::... -->
<div class="cart-section" id="listcart">
    <!-- Start Cart Table -->
    <div class="cart-table-wrapper"  data-aos="fade-up"  data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="table_page table-responsive">
                            <table>

                                <!-- Start Cart Table Head -->
                                <thead>
                                <tr>
                                    <th class="product_remove">Mã đơn hàng</th>
                                    <th class="product_name">Giá trị</th>
                                    <th class="product-price">Ngày mua</th>
                                    <th class="product-price">Trạng thái</th>
                                    <th style="width: 5px"></th>


                                </tr>
                                </thead> <!-- End Cart Table Head -->
                                <?php
                                include ('connect.php');
                                $sql5="SELECT * FROM dondat WHERE TenDangNhap = '".$_SESSION["tendangnhap"]."'";
                                $query5 = mysqli_query($conn, $sql5);
                                ?>
                                <?php
                                $tongtien="SELECT SUM(tongtien) FROM dondat WHERE TenDangNhap = '".$_SESSION["tendangnhap"]."' ";
                                $truyvan=mysqli_query($conn,$tongtien);
                                $laytt=mysqli_fetch_row($truyvan);
                                ?>
                                <tbody>

                                <?php
                                while ($row=mysqli_fetch_array($query5))
                                {

                                ?>
<!--                               Start Cart Single Item-->
                                <tr>

                                    <td class="product_thumb"><?php echo $row["MaDonDat"] ?></td>

                                    <td class="product-price"><?php echo number_format($row["tongtien"],0,",","."); ?></td>
                                    <td class="product_total"><?php echo $row["NgayDat"] ?></td>
                                    <?php if($row["TrangThai"]==0){ ?>
                                    <td class="product_total">Chưa giao</td>
                                    <?php }else{?>
                                    <td class="product_total">Đã giao</td>
                                    <?php } ?>
                                    <td><a href="chitietdon.php?CT=<?php echo $row["MaDonDat"]?>"><i class="icon-magnifier"></i></a></td>

                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Cart Table -->

    <!-- Start Coupon Start -->
    <div class="coupon_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="coupon_code left"  data-aos="fade-up"  data-aos-delay="200">

                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="coupon_code right"  data-aos="fade-up"  data-aos-delay="400">


                    </div>
                </div>
            </div>


        </div>
    </div> <!-- End Coupon Start -->

</div> <!-- ...:::: End Cart Section:::... -->
<!--<div class="modal fade" id="searchmadon" tabindex="-1" role="dialog" aria-hidden="true">-->
<!--    <div class="modal-dialog  modal-dialog-centered" role="document">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-body">-->
<!--                <div class="container-fluid">-->
<!--                    <div class="row">-->
<!--                        <div class="col text-right">-->
<!--                            <button type="button" class="close modal-close" data-bs-dismiss="modal" aria-label="Close">-->
<!--                                <span aria-hidden="true"> <i class="fa fa-times"></i></span>-->
<!--                            </button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="row" style="margin-top: 10px">-->
<!--                        <div class="modal-content" style="padding: 35px">-->
<!--                            <div class="title-left">-->
<!--                                <h3 ">Sản Phẩm Đã Mua</h3>-->
<!--                            </div>-->
<!--                            --><?php
//                            $sql6="SELECT MaDonDat FROM dondat WHERE TenDangNhap = '".$_SESSION["tendangnhap"]."'";
//                            $query6=mysqli_query($conn,$sql6);
//                            $db=mysqli_fetch_array($query6);
//                            ?>
<!---->
<!--                            --><?php
//                            $laychitietDD="SELECT sanpham.*,ct_dondat.*,ct_dondat.SoLuong as 'sl' FROM ct_dondat JOIN sanpham ON ct_dondat.MaSanPham=sanpham.MaSanPham  WHERE MaDonDat = '".$db["MaDonDat"]."'";
//                            $truyvanlaychitietDD=mysqli_query($conn,$laychitietDD);
//                            ?>
<!--                            <table class="table table-striped table-bordered table-hover" id="sample_1">-->
<!--                                <thead>-->
<!--                                <tr>-->
<!--                                    <th class="hidden-480">Tên sản phẩm</th>-->
<!--                                    <th class="hidden-480">Số lượng</th>-->
<!--                                    <th class="hidden-480">Đơn giá</th>-->
<!--                                </tr>-->
<!--                                </thead>-->
<!--                                <tbody>-->
<!--                                --><?php
//                                while ($laysp=mysqli_fetch_array($truyvanlaychitietDD))
//                                {
//                                ?>
<!---->
<!--                                    <tr class="odd gradeX">-->
<!--                                        <td class="hidden-480" style="width: 150px">--><?php //echo $laysp["TenSanPham"] ?><!--</td>-->
<!--                                        <td class="center hidden-480" style="width: 250px">--><?php //echo $laysp["sl"] ?><!--</td>-->
<!--                                        <td class="center hidden-480" style="width: 150px">--><?php //echo $laysp["Gia"] ?><!--</td>-->
<!--                                    </tr>-->
<!--                                --><?php //} ?>
<!---->
<!--                                </tbody>-->
<!--                            </table>-->
<!--                        </div>-->
<!--                        <div class="col-md-6">-->
<!---->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--</div>-->
<?php
include ('../layout/footer.php')
?>

