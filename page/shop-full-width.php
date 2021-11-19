<?php
include ('../layout/header.php');
?>
<?php
include ('connect.php');
$item_per_page=!empty($_GET['per_page'])?$_GET['per_page']:4;
$current_page=!empty($_GET['page'])?$_GET['page']:1;
$offset=($current_page-1) * $item_per_page;
$laysp="SELECT * FROM sanpham  ORDER BY MaSanPham ASC LIMIT ".$item_per_page." OFFSET ".$offset;
$truyvan=mysqli_query($conn,$laysp);
$total=mysqli_query($conn,"SELECT * FROM sanpham");
$total= $total->num_rows;
$totalpage= ceil($total / $item_per_page);

?>
<!-- Offcanvas Overlay -->
<div class="offcanvas-overlay"></div>

<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Shop - Full Width</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="index-3.php">Home</a></li>
                                <li><a href="shop-full-width.php">Shop</a></li>
                                <li class="active" aria-current="page">Shop Full Width</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

<!-- ...:::: Start Shop Section:::... -->
<div class="shop-section">
    <div class="container">
        <div class="row flex-column-reverse flex-lg-row">
            <div class="col-lg-12">
                <!-- Start Shop Product Sorting Section -->
                <div class="shop-sort-section">
                    <div class="container">
                        <div class="row">
                            <!-- Start Sort Wrapper Box -->
                            <div class="sort-box d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column" data-aos="fade-up"  data-aos-delay="0">
                                <!-- Start Sort tab Button -->
                                <div class="sort-box d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column">
                                    Nhập giá từ <input type="tel" id="gia" width="200px" class="form-control">
                                    <button id="timkiemgia" style="margin-left: 20px;display: flex" type="submit">Tìm Kiếm</button>

                                </div>
                                <div>

                                </div>
                                <!-- Start Sort Select Option -->
                                <div class="sort-select-list d-flex align-items-center">
                                    <label class="mr-2">Sort By:</label>
                                    <form action="#">
                                        <fieldset>
                                            <select name="speed" id="speed">
                                                <option>100.000 trở xuống</option>
                                                <option>200.000 trở xuống</option>
                                                <option>500.000 trở xuống</option>
                                                <option>Sort by price: high to low</option>
                                                <option>Product Name: Z</option>
                                            </select>

                                        </fieldset>
                                    </form>
                                </div> <!-- End Sort Select Option -->



                            </div> <!-- Start Sort Wrapper Box -->
                        </div>
                    </div>
                </div> <!-- End Section Content -->

                <!-- Start Tab Wrapper -->
                <div class="sort-product-tab-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content">
                                    <!-- Start Grid View Product -->
                                    <div class="tab-pane active show sort-layout-single" >
                                        <div class="row" id="loadgia">
                                            <?php
                                            while ($cot=mysqli_fetch_array($truyvan)){
                                            ?>
                                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                                <!-- Start Product Default Single Item -->
                                                <div class="product-default-single-item product-color--golden" data-aos="fade-up"  data-aos-delay="0">
                                                    <div class="image-box">
                                                        <a href="product-details-default.php?Masp=<?php echo $cot["MaSanPham"];?>" class="image-link">
                                                            <img src="../images/product/hinhanh/<?php echo $cot["Anh"]?>" alt="">
                                                            <img src="../images/product/hinhanh/<?php echo $cot["Anh"]?>" alt="">
                                                        </a>
<!--                                                        <div class="action-link">-->
<!--                                                            <div class="action-link-left">-->
<!--<!--                                                                <a >Add To Cart</a>-->
<!---->
<!--                                                            </div>-->
<!--                                                            <div class="action-link-right">-->
<!--                                                                <a href="" data-bs-toggle="modal" data-bs-target="#modalQuickview"><i class="icon-magnifier"></i></a>-->
<!--                                                                <a href="wishlist.php"><i class="icon-heart"></i></a>-->
<!--                                                                <a href="compare.php"><i class="icon-shuffle"></i></a>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
                                                    </div>
                                                    <div class="content">
                                                        <div class="content-left">
                                                            <h6 class="title"><a href="product-details-default.php?Masp=<?php echo $cot["MaSanPham"];?>"><?php echo $cot["TenSanPham"] ?></a></h6>

<!--                                                            <ul class="review-star">-->
<!--                                                                <li class="fill"><i class="ion-android-star"></i></li>-->
<!--                                                                <li class="fill"><i class="ion-android-star"></i></li>-->
<!--                                                                <li class="fill"><i class="ion-android-star"></i></li>-->
<!--                                                                <li class="fill"><i class="ion-android-star"></i></li>-->
<!--                                                                <li class="empty"><i class="ion-android-star"></i></li>-->
<!--                                                            </ul>-->
                                                        </div>

                                                        <div class="content-right">
                                                            <span class="price"><?=number_format($cot["DonGia"],0,",",".")?> VND</span>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- End Product Default Single Item -->
                                            </div>
                                            <?php } ?>

                                        </div>
                                    </div> <!-- End Grid View Product -->
                                    <!-- Start List View Product -->
                                    <?php
                                    $sql3="SELECT * FROM sanpham ORDER BY MaSanPham DESC LIMIT 6";
                                    $query3=mysqli_query($conn,$sql3);
                                    ?>
                                    <div class="tab-pane sort-layout-single" id="layout-list">
                                        <div class="row">
                                            <?php
                                            while ($cot2=mysqli_fetch_array($query3)){


                                            ?>
                                            <div class="col-12">
                                                <!-- Start Product Defautlt Single -->
                                                <div class="product-list-single product-color--golden">
                                                    <a href="product-details-default.php" class="product-list-img-link">
                                                        <img class="img-fluid" src="../images/product/hinhanh/<?php echo $cot2["Anh"]?>" alt="">
                                                        <img class="img-fluid" src="../images/product/hinhanh/<?php echo $cot2["Anh2"]?>" alt="">
                                                    </a>
                                                    <div class="product-list-content">
                                                        <h5 class="product-list-link"><a href="product-details-default.php"><?php echo $cot2["TenSanPham"]?></a></h5>
                                                        <ul class="review-star">
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                        </ul>
                                                        <span class="product-list-price"> <?=number_format($cot2["DonGia"],0,",",".")?> VND</span>
                                                        <p><?php echo $cot2["ThongTin"]?></p>
                                                        <div class="product-action-icon-link-list">

                                                            <a href="#"   data-bs-toggle="modal" data-bs-target="#modalQuickview" class="btn btn-lg btn-black-default-hover">Add to cart</a>
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview" class="btn btn-lg btn-black-default-hover"><i class="icon-magnifier"></i></a>
                                                            <a href="wishlist.php" class="btn btn-lg btn-black-default-hover"><i class="icon-heart"></i></a>
                                                            <a href="compare.php" class="btn btn-lg btn-black-default-hover"><i class="icon-shuffle"></i></a>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Product Defautlt Single -->
                                            </div>
                                            <?php } ?>

                                        </div>
                                    </div> <!-- End List View Product -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Tab Wrapper -->

                <!-- Start Pagination -->
                <?php
                include ("phantrang.php");
                ?>
            </div> <!-- End Shop Product Sorting Section  -->
        </div>
    </div>
</div> <!-- ...:::: End Shop Section:::... -->
<?php
include ('../layout/footer.php')
?>
<script>
    $(document).ready(function () {
        $('#timkiemgia').click(function () {
            TimKiemGia($('#gia').val())
            
        });
        
    });
</script>
