<?php
include ('../connect.php');
if(isset($_POST["min_price"]) && isset($_POST["max_price"])){
    $min_price=$_POST["min_price"];
    $max_price=$_POST["max_price"];
    $query="SELECT * FROM sanpham WHERE TrangThai= '1' AND DonGia BETWEEN '$min_price' AND '$max_price' ";
    $r=mysqli_query($conn,$query);
    $count= mysqli_num_rows($r);
    if($count == 0){
        echo "Sorry No data found";
    }
    ?>
    <div class="row" >
        <?php
        while ($cot=mysqli_fetch_array($r)){
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
<?php
}
?>
