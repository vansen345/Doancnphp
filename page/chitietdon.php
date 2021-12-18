
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
                    <h3 class="breadcrumb-title">Sản phẩm mua</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="../page/index-3.php">Home</a></li>
                                <li><a href="../page/xemdonhang.php">Đơn hàng</a></li>
                                <li class="active" aria-current="page">Sản phẩm mua</li>
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
                                    <th class="product_remove">ID</th>
                                    <th class="product_name">Tên sản phẩm</th>
                                    <th class="product_name">Số lượng mua</th>
                                    <th class="product-price">Đơn giá</th>
                                </tr>
                                </thead> <!-- End Cart Table Head -->
                                <?php
                                include ('connect.php');
                                $laychitietDD="SELECT sanpham.*,ct_dondat.*,ct_dondat.SoLuong as 'sl' FROM ct_dondat JOIN sanpham ON ct_dondat.MaSanPham=sanpham.MaSanPham  WHERE MaDonDat = '".$_GET["CT"]."'";
                                $truyvanlaychitietDD=mysqli_query($conn,$laychitietDD);
                                ?>
                                <tbody>
                                <?php
                                while ($row=mysqli_fetch_array($truyvanlaychitietDD))
                                {
                                    ?>
                                    <tr>
                                        <td class="product_thumb"><?php echo $row["MaSanPham"] ?></td>
                                        <td class="product_thumb"><?php echo $row["TenSanPham"] ?></td>
                                        <td class="product-price"><?php echo $row["sl"] ?></td>
                                        <td class="product_total"><?=number_format($row["Gia"],0,",",".")?> VND</td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!--                        <div class="cart_submit">-->
                        <!--                            <button class="btn btn-md btn-golden" type="submit">update cart</button>-->
                        <!--                        </div>-->
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
<?php
include ('../layout/footer.php')
?>


