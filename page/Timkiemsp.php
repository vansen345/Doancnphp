<?php
include ('../layout/header.php');
?>


<?php

if(isset($_POST['timkiemtensp'])){
    $search = $_POST["timkiemtensp"];

}
else{
    $search=$_GET['timkiemtensp'];
}
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }
    else{
        $page=1;
    }
    $rowperpgae=2;
    $perrow=$page * $rowperpgae-$rowperpgae;



include ('connect.php');

$laysp="SELECT * FROM sanpham WHERE TenSanPham LIKE '%".$_POST["timkiemtensp"]."%'  ORDER BY MaSanPham DESC LIMIT $perrow,$rowperpgae ";
$query = mysqli_query($conn,$laysp);
    $totalrow=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM sanpham WHERE TenSanPham LIKE '%".$_POST["timkiemtensp"]."%'"));
    $totalpage=ceil($totalrow/$rowperpgae);
//$listpage="";
//for($i=1; $i<=$totalpage; $i++) {
//    if ($page == $i) {
//        $listpage .= '<li><a class="active" href="Timkiemsp.php?search='.$_POST["timkiemtensp"].'&page='.$i.'">'.$i.'</a></li>';
//    }
//    else{
//        $listpage .= '<li><a href="Timkiemsp.php?search='.$_POST["timkiemtensp"].'&page='.$i.'">'.$i.'</a></li>';
//
//    }
//}
?>
<!-- Offcanvas Overlay -->
<div class="offcanvas-overlay"></div>

<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Tất Cả Sản Phẩm</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="index-3.php">Home</a></li>
                                <li><a href="shop-full-width.php">Shop</a></li>
                                <li class="active" aria-current="page">Tất cả sản phẩm</li>
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
                                <div>

                                </div>
                                <!-- Start Sort Select Option -->
                                <div class="sort-select-list d-flex align-items-center">


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
                                    <div class="tab-pane active show sort-layout-single" id="layout-4-grid">
                                        <div class="row">
                                            <?php
                                            while ($cot=mysqli_fetch_array($query)){



                                                ?>
                                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                                    <!-- Start Product Default Single Item -->
                                                    <div class="product-default-single-item product-color--golden" data-aos="fade-up"  data-aos-delay="0">
                                                        <div class="image-box">
                                                            <a href="product-details-default.php?Masp=<?php echo $cot["MaSanPham"];?>" class="image-link">
                                                                <img src="../images/product/hinhanh/<?php echo $cot["Anh"]?>" alt="">
                                                                <img src="../images/product/hinhanh/<?php echo $cot["Anh"]?>" alt="">
                                                            </a>
<!--                                                            <div class="action-link">-->
<!--                                                                <div class="action-link-left">-->
<!--                                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart">Add to Cart</a>-->
<!--                                                                </div>-->
<!--                                                                <div class="action-link-right">-->
<!--                                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview"><i class="icon-magnifier"></i></a>-->
<!--                                                                    <a href="wishlist.php"><i class="icon-heart"></i></a>-->
<!--                                                                    <a href="compare.php"><i class="icon-shuffle"></i></a>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
                                                        </div>
                                                        <div class="content">
                                                            <div class="content-left">
                                                                <h6 class="title"><a href="product-details-default.php?Masp=<?php echo $cot["MaSanPham"];?>"><?php echo $cot["TenSanPham"] ?></a></h6>

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
                                    <div class="tab-pane sort-layout-single" id="layout-list">
                                        <div class="row">
                                            <div class="col-12">
                                                <!-- Start Product Defautlt Single -->
                                                <div class="product-list-single product-color--golden">
                                                    <a href="product-details-default.php" class="product-list-img-link">
                                                        <img class="img-fluid" src="../images/product/default/home-1/default-1.jpg" alt="">
                                                        <img class="img-fluid" src="../images/product/default/home-1/default-2.jpg" alt="">
                                                    </a>
                                                    <div class="product-list-content">
                                                        <h5 class="product-list-link"><a href="product-details-default.php">KAOREET LOBORTIS SAGIT</a></h5>
                                                        <ul class="review-star">
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                        </ul>
                                                        <span class="product-list-price"><del>$30.12</del> $25.12</span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed, ducimus quisquam, ad asperiores</p>
                                                        <div class="product-action-icon-link-list">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart" class="btn btn-lg btn-black-default-hover">Add to cart</a>
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview" class="btn btn-lg btn-black-default-hover"><i class="icon-magnifier"></i></a>
                                                            <a href="wishlist.php" class="btn btn-lg btn-black-default-hover"><i class="icon-heart"></i></a>
                                                            <a href="compare.php" class="btn btn-lg btn-black-default-hover"><i class="icon-shuffle"></i></a>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Product Defautlt Single -->
                                            </div>
                                            <div class="col-12">
                                                <!-- Start Product Defautlt Single -->
                                                <div class="product-list-single product-color--golden">
                                                    <a href="product-details-default.php" class="product-list-img-link">
                                                        <img class="img-fluid" src="../images/product/default/home-1/default-3.jpg" alt="" >
                                                        <img class="img-fluid" src="../images/product/default/home-1/default-4.jpg" alt="" >
                                                    </a>
                                                    <div class="product-list-content">
                                                        <h5 class="product-list-link"><a href="product-details-default.php">CONDIMENTUM POSUERE</a></h5>
                                                        <ul class="review-star">
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                        </ul>
                                                        <span class="product-list-price">$95.00</span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed, ducimus quisquam, ad asperiores</p>
                                                        <div class="product-action-icon-link-list">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart" class="btn btn-lg btn-black-default-hover">Add to cart</a>
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview" class="btn btn-lg btn-black-default-hover"><i class="icon-magnifier"></i></a>
                                                            <a href="wishlist.php" class="btn btn-lg btn-black-default-hover"><i class="icon-heart"></i></a>
                                                            <a href="compare.php" class="btn btn-lg btn-black-default-hover"><i class="icon-shuffle"></i></a>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Product Defautlt Single -->
                                            </div>
                                            <div class="col-12">
                                                <!-- Start Product Defautlt Single -->
                                                <div class="product-list-single product-color--golden">
                                                    <a href="product-details-default.php" class="product-list-img-link">
                                                        <img class="img-fluid" src="../images/product/default/home-1/default-5.jpg" alt="" >
                                                        <img class="img-fluid" src="../images/product/default/home-1/default-6.jpg" alt="" >
                                                    </a>
                                                    <div class="product-list-content">
                                                        <h5 class="product-list-link"><a href="product-details-default.php">ALIQUAM LOBORTIS</a></h5>
                                                        <ul class="review-star">
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                        </ul>
                                                        <span class="product-list-price"> $25.12</span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed, ducimus quisquam, ad asperiores</p>
                                                        <div class="product-action-icon-link-list">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart" class="btn btn-lg btn-black-default-hover">Add to cart</a>
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview" class="btn btn-lg btn-black-default-hover"><i class="icon-magnifier"></i></a>
                                                            <a href="wishlist.php" class="btn btn-lg btn-black-default-hover"><i class="icon-heart"></i></a>
                                                            <a href="compare.php" class="btn btn-lg btn-black-default-hover"><i class="icon-shuffle"></i></a>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Product Defautlt Single -->
                                            </div>
                                            <div class="col-12">
                                                <!-- Start Product Defautlt Single -->
                                                <div class="product-list-single product-color--golden">
                                                    <a href="product-details-default.php" class="product-list-img-link">
                                                        <img class="img-fluid" src="../images/product/default/home-1/default-7.jpg" alt="" >
                                                        <img class="img-fluid" src="../images/product/default/home-1/default-8.jpg" alt="" >
                                                    </a>
                                                    <div class="product-list-content">
                                                        <h5 class="product-list-link"><a href="product-details-default.php">CONVALLIS QUAM SIT</a></h5>
                                                        <ul class="review-star">
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                        </ul>
                                                        <span class="product-list-price">$75.00 - $85.00</span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed, ducimus quisquam, ad asperiores</p>
                                                        <div class="product-action-icon-link-list">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart" class="btn btn-lg btn-black-default-hover">Add to cart</a>
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview" class="btn btn-lg btn-black-default-hover"><i class="icon-magnifier"></i></a>
                                                            <a href="wishlist.php" class="btn btn-lg btn-black-default-hover"><i class="icon-heart"></i></a>
                                                            <a href="compare.php" class="btn btn-lg btn-black-default-hover"><i class="icon-shuffle"></i></a>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Product Defautlt Single -->
                                            </div>
                                            <div class="col-12">
                                                <!-- Start Product Defautlt Single -->
                                                <div class="product-list-single product-color--golden">
                                                    <a href="product-details-default.php" class="product-list-img-link">
                                                        <img class="img-fluid" src="../images/product/default/home-1/default-9.jpg" alt="">
                                                        <img class="img-fluid" src="../images/product/default/home-1/default-10.jpg" alt="">
                                                    </a>
                                                    <div class="product-list-content">
                                                        <h5 class="product-list-link"><a href="product-details-default.php">DONEC EU LIBERO AC</a></h5>
                                                        <ul class="review-star">
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                        </ul>
                                                        <span class="product-list-price"><del>$25.12</del> $20.00</span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed, ducimus quisquam, ad asperiores</p>
                                                        <div class="product-action-icon-link-list">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart" class="btn btn-lg btn-black-default-hover">Add to cart</a>
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview" class="btn btn-lg btn-black-default-hover"><i class="icon-magnifier"></i></a>
                                                            <a href="wishlist.php" class="btn btn-lg btn-black-default-hover"><i class="icon-heart"></i></a>
                                                            <a href="compare.php" class="btn btn-lg btn-black-default-hover"><i class="icon-shuffle"></i></a>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Product Defautlt Single -->
                                            </div>
                                        </div>
                                    </div> <!-- End List View Product -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Tab Wrapper -->

                <!-- Start Pagination -->
                <div class="page-pagination text-center" data-aos="fade-up"  data-aos-delay="0">
                    <ul>

                    </ul>
                </div> <!-- End Pagination -->

            </div> <!-- End Shop Product Sorting Section  -->
        </div>
    </div>
</div>
<!-- ...:::: End Shop Section:::... -->
<?php

include ('../layout/footer.php')

?>

