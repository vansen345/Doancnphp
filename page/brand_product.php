<?php
include ('../layout/header.php');
?>
<?php
include ('connect.php');
if(isset($_GET['page'])){
    $page=$_GET['page'];
}
else{
    $page=1;
}
$rowperpgae=4;
$perrow=$page * $rowperpgae-$rowperpgae;

$sql_brand="SELECT * FROM sanpham WHERE MaThuongHieu  = '".$_GET["brand"]."' ORDER BY MaSanPham DESC LIMIT $perrow,$rowperpgae ";
$query_brand=mysqli_query($conn,$sql_brand);
$totalrow=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM sanpham WHERE MaThuongHieu= '".$_GET["brand"]."'"));
$totalpage=ceil($totalrow/$rowperpgae);
$listpage="";
for($i=1; $i<=$totalpage; $i++){
    if($page==$i){
        $listpage.='<li><a class="active" href="brand_product.php?brand='.$_GET["brand"].'&page='.$i.'">'.$i.'</a></li>';
    }
    else
    {
        $listpage.='<li><a href="brand_product.php?brand='.$_GET["brand"].'&page='.$i.'">'.$i.'</a></li>';
    }
}


?>
<!-- Offcanvas Overlay -->
<div class="offcanvas-overlay"></div>
<?php
$tenbrand="SELECT * FROM thuonghieu WHERE MaThuongHieu='".$_GET["brand"]."'";
$layten=mysqli_query($conn,$tenbrand);
$hien=mysqli_fetch_array($layten);
?>

<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title"><?php echo $hien["TenThuongHieu"] ?> </h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="index-3.php">Home</a></li>
                                <li><a href="shop-full-width.php">Shop</a></li>

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
<!--                                <div class="sort-select-list d-flex align-items-center">-->
<!---->
<!--                                    <div class="price-range-block">-->
<!--                                        <div id="slider-range" class="price-filter-range" name="rangeInput"></div>-->
<!---->
<!--                                        <div style="margin:30px auto">-->
<!--                                            <input  type="number" min=0 max="3000000" oninput="validity.valid||(value='0');" id="min_price" class="price-range-field" />-->
<!--                                            <input type="number" min=0 max="3000000" oninput="validity.valid||(value='10000');" id="max_price" class="price-range-field" />-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div> <!-- End Sort Select Option -->



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
                                    <div class="tab-pane active show sort-layout-single" id="loadgia" >

                                        <div class="row" >
                                            <?php
                                            while ($cot=mysqli_fetch_array($query_brand)){
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
                <div class="page-pagination text-center" data-aos="fade-up"  data-aos-delay="0">
                    <ul>
                        <?php
                        echo $listpage;
                        ?>
                    </ul>
                </div>
            </div> <!-- End Shop Product Sorting Section  -->
        </div>
    </div>
</div> <!-- ...:::: End Shop Section:::... -->
<?php
include ('../layout/footer.php')
?>
<script type="text/javascript">
$(document).ready(function () {

    function filterProduct() {
        $("#loadgia").html("<p>Loading</p>")
        var min_price = $("#min_price").val();
        var max_price = $("#max_price").val();

        $.ajax({
            url:"ajax/SearchPrice.php",
            type:"POST",
            data:{min_price:min_price,max_price:max_price},
            success:function (data){
               $('#loadgia').html(data);

            }

        });
        //alert(min_price + max_price);
    }
    $("#min_price,#max_price").on('keyup',function () {
        filterProduct();
        
    });

    $("#slider-range").slider({
                range: true,
                orientation: "horizontal",
                min: 0,
                max: 3000000,
                values: [0, 3000000],
                step: 100,

                slide: function (event, ui) {
                    if (ui.values[0] == ui.values[1]) {
                        return false;
                    }
                    $("#min_price").val(ui.values[0]);
                    $("#max_price").val(ui.values[1]);
                    filterProduct();
                }
            });
    $("#min_price").val($("#slider-range").slider("value",0));
    $("#max_price").val($("#slider-range").slider("value",1));
    });
</script>
<style>



    .price-range-block {
        margin:2% 0%;
    }
    .ui-slider-horizontal {
        height: .6em;
    }
    .ui-slider-horizontal {

        width:100%;
    }
    .ui-widget-header {
        background: #ff365d;
    }


    .price-range-field{
        width:40%;
        margin-top: 10px;
        min-width: 16%;
        background-color:#f9f9f9;
        border: 1px solid #6e6666;
        color: black;
        font-family: myFont;
        font: normal 14px Arial, Helvetica, sans-serif;
        border-radius: 5px;
        height:26px;
        padding:5px;
    }
    .search-results-block{
        position: relative;
        display: block;
        clear: both;
    }

</style>
<!--<script>-->
<!--    $(document).ready(function () {-->
<!--        $('#timkiemgia').click(function () {-->
<!--            TimKiemGia($('#gia').val())-->
<!--            -->
<!--        });-->
<!--        -->
<!--    });-->
<!--</script>-->
