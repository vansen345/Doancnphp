<?php
if(isset($_SESSION["tendangnhap"]))
    echo "<script>location='product-details-default.php';</script>";

?>
<?php
include ('../layout/header.php');

include ('connect.php');
$laysp="SELECT * FROM sanpham WHERE MaSanPham='".$_GET["Masp"]."'";
$truyvan=mysqli_query($conn,$laysp);
$cot=mysqli_fetch_array($truyvan);

if(!isset($_GET["Masp"]))
    echo "<script>location='shop-full-width.php';</script>";

$count="SELECT MaBinhLuan FROM binhluan WHERE MaSanPham = '".$_GET["Masp"]."' ";
$countbl=mysqli_query($conn,$count);
$row= mysqli_num_rows($countbl);

$layDG="SELECT * FROM danhgia WHERE MaSanPham='".$cot["MaSanPham"]."'";
$truyvan_layDG=mysqli_query($conn,$layDG);


$tendangnhap="0";
$sosao="0";
if(isset($_SESSION["tendangnhap"]))
{
    $tendangnhap=$_SESSION["tendangnhap"];
    $layDG_ND="SELECT * FROM danhgia WHERE MaSanPham='".$cot["MaSanPham"]."' and TenDangNhap='".$tendangnhap."'";
    $truyvanND=mysqli_query($conn,$layDG_ND);
    if(mysqli_num_rows($truyvanND)>0){
        $cotDG=mysqli_fetch_array($truyvanND);
        $sosao= $cotDG["NoiDung"];
    }

}
?>
<!-- Offcanvas Overlay -->
<div class="offcanvas-overlay"></div>

<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Product Details - Default</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="../page/index-3.php">Home</a></li>
                                <li><a href="#">Shop</a></li>
                                <li class="active" aria-current="page">Product Details Default</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

<!-- Start Product Details Section -->
<div class="product-details-section">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6">
                <div class="product-details-gallery-area" data-aos="fade-up"  data-aos-delay="0">
                    <!-- Start Large Image -->
                    <div class="product-large-image product-large-image-horaizontal swiper-container">

                        <div class="swiper-wrapper">

                            <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                <img src="../images/product/hinhanh/<?php echo $cot["Anh"]?>" alt="">
                            </div>
                            <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                <img src="../images/product/hinhanh/<?php echo $cot["Anh2"]?>" alt="">
                            </div>
                            <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                <img src="../images/product/hinhanh/<?php echo $cot["Anh3"]?>" alt="">
                            </div>
                            <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                <img src="../images/product/hinhanh/<?php echo $cot["Anh4"]?>" alt="">
                            </div>

                        </div>
                    </div>
                    <!-- End Large Image -->
                    <!-- Start Thumbnail Image -->
                    <div class="product-image-thumb product-image-thumb-horizontal swiper-container pos-relative mt-5">
                        <div class="swiper-wrapper">
                            <div class="product-image-thumb-single swiper-slide">
                                <img class="img-fluid" src="../images/product/hinhanh/<?php echo $cot["Anh"] ?>" alt="">
                            </div>
                            <div class="product-image-thumb-single swiper-slide">
                                <img class="img-fluid" src="../images/product/hinhanh/<?php echo $cot["Anh2"] ?>" alt="">
                            </div>
                            <div class="product-image-thumb-single swiper-slide">
                                <img class="img-fluid" src="../images/product/hinhanh/<?php echo $cot["Anh3"] ?>" alt="">
                            </div>
                            <div class="product-image-thumb-single swiper-slide">
                                <img class="img-fluid" src="../images/product/hinhanh/<?php echo $cot["Anh4"] ?>" alt="">
                            </div>
                        </div>
                        <!-- Add Arrows -->
                        <div class="gallery-thumb-arrow swiper-button-next"></div>
                        <div class="gallery-thumb-arrow swiper-button-prev"></div>
                    </div>
                    <!-- End Thumbnail Image -->
                </div>
            </div>
            <div class="col-xl-7 col-lg-6">
                <div class="product-details-content-area product-details--golden" data-aos="fade-up"  data-aos-delay="200">
                    <!-- Start  Product Details Text Area-->
                    <div class="product-details-text">
                        <h4 class="title"><?php echo $cot["TenSanPham"]?></h4>
                        <div class="d-flex align-items-center">
                            <ul class="review-star">
                                <li class="sao sao1" data-sao="1" onclick="DanhGiaSP(<?php echo $cot["MaSanPham"]; ?> , '<?php echo $tendangnhap ?>', 1)" ><i class="ion-android-star"></i></li>
                                <li  class="sao sao2" data-sao="2" onclick="DanhGiaSP(<?php echo $cot["MaSanPham"]; ?> , '<?php echo $tendangnhap ?>', 2)" ><i class="ion-android-star"></i></li>
                                <li  class="sao sao3" data-sao="3" onclick="DanhGiaSP(<?php echo $cot["MaSanPham"]; ?> , '<?php echo $tendangnhap ?>', 3)" ><i class="ion-android-star"></i></li>
                                <li  class="sao sao4" data-sao="4" onclick="DanhGiaSP(<?php echo $cot["MaSanPham"]; ?> , '<?php echo $tendangnhap ?>', 4)" ><i class="ion-android-star"></i></li>
                                <li  class="sao sao5" data-sao="5" onclick="DanhGiaSP(<?php echo $cot["MaSanPham"]; ?> , '<?php echo $tendangnhap ?>', 5)" ><i class="ion-android-star"></i></li>
                            </ul>
                            <a href="#" class="customer-review ml-2">(<?php echo mysqli_num_rows($truyvan_layDG)?> đánh giá)</a>
                        </div>
                        <div class="price"><?=number_format($cot["DonGia"],0,",",".")?> VND</div>
                        <p><?php echo $cot["ThongTin"]?></p>
                    </div> <!-- End  Product Details Text Area-->
                    <!-- Start Product Variable Area -->
                    <?php if($cot["SoLuong"]=='0' && $cot["TrangThai"]=='2'){
                        echo '<h3 style="margin-bottom: 50px">Hết hàng</h3>';
                        ?>
                    <?php } else{ ?>
                    <div class="product-details-variable">
                        <h4 class="title">Available Options</h4>
                        <!-- Product Variable Single Item -->
                        <div class="variable-single-item">
                            <div class="product-stock"> <span class="product-stock-in"><i class="ion-checkmark-circled"></i></span> 200 IN STOCK</div>
                        </div>
                        <!-- Product Variable Single Item -->


                        <div class="d-flex align-items-center ">

                                <div class="variable-single-item ">
                                <span>Quantity</span>
                                <div class="product-variable-quantity">
                                    <input id="quanlity" min="1" max="100" value="1" type="number">
                                </div>
                            </div>





                            <div class="product-add-to-cart-btn">
                                <a  onclick="addCart(<?php echo $cot["MaSanPham"]?>)" class="btn btn-block btn-lg btn-black-default-hover" data-bs-toggle="modal" data-bs-target="#modalAddcart">+ Add To Cart</a>
                            </div>
                        </div>
                        <!-- Start  Product Details Meta Area-->
                        <div class="product-details-meta mb-20">
                            <a href="wishlist.php" class="icon-space-right"><i class="icon-heart"></i>Add to wishlist</a>
                            <a href="compare.php" class="icon-space-right"><i class="icon-refresh"></i>Compare</a>
                        </div> <!-- End  Product Details Meta Area-->
                    </div> <!-- End Product Variable Area -->
                    <?php }?>

                    <!-- Start  Product Details Catagories Area-->
                    <div class="product-details-catagory mb-2">
                        <span class="title">CATEGORIES:</span>
                        <ul>
                            <li><a href="#">BAR STOOL</a></li>
                            <li><a href="#">KITCHEN UTENSILS</a></li>
                            <li><a href="#">TENNIS</a></li>
                        </ul>
                    </div> <!-- End  Product Details Catagories Area-->
                    <!-- Start  Product Details Social Area-->
                    <div class="product-details-social">
                        <span class="title">SHARE THIS PRODUCT:</span>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div> <!-- End  Product Details Social Area-->
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Product Details Section -->

<!-- Start Product Content Tab Section -->
<div class="product-details-content-tab-section section-top-gap-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product-details-content-tab-wrapper" data-aos="fade-up"  data-aos-delay="0">

                    <!-- Start Product Details Tab Button -->
                    <ul class="nav tablist product-details-content-tab-btn d-flex justify-content-center">
                        <li><a class="nav-link active" data-bs-toggle="tab" href="#description">
                                Description
                            </a></li>
                        <li><a class="nav-link" data-bs-toggle="tab" href="#specification">
                                Specification
                            </a></li>
                        <li><a class="nav-link" data-bs-toggle="tab" href="#review">
                                Reviews (<?php echo $row ?>)
                            </a></li>
                    </ul> <!-- End Product Details Tab Button -->

                    <!-- Start Product Details Tab Content -->
                    <div class="product-details-content-tab">
                        <div class="tab-content">
                            <!-- Start Product Details Tab Content Singel -->
                            <div class="tab-pane active show" id="description">
                                <div class="single-tab-content-item">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. </p>
                                    <p>Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget</p>
                                </div>
                            </div> <!-- End Product Details Tab Content Singel -->
                            <!-- Start Product Details Tab Content Singel -->
                            <div class="tab-pane" id="specification">
                                <div class="single-tab-content-item">
                                    <table class="table table-bordered mb-20">
                                        <tbody>
                                        <tr>
                                            <th scope="row">Compositions</th>
                                            <td>Polyester</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Styles</th>
                                            <td>Girly</td>
                                        <tr>
                                            <th scope="row">Properties</th>
                                            <td>Short Dress</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
                                </div>
                            </div> <!-- End Product Details Tab Content Singel -->
                            <?php
                            $laybl="SELECT * FROM binhluan INNER JOIN thanhvien ON binhluan.TenDangNhap = thanhvien.TenDangNhap WHERE MaSanPham='".$cot["MaSanPham"]."' ORDER BY MaBinhLuan DESC ";
                            $cotbl=mysqli_query($conn,$laybl);
                            ?>
                            <!-- Start Product Details Tab Content Singel -->
                            <div class="tab-pane" id="review">
                                <div class="single-tab-content-item">
                                    <div class="review-form">
                                        <?php if(isset($_SESSION["tendangnhap"])){ ?>

                                            <div class="review-form-text-top">
                                            <h5>ADD A REVIEW</h5>
                                            <!--                                            <p>Your email address will not be published. Required fields are marked *</p>-->
                                        </div>

                                            <form action="<?php echo $_SERVER["PHP_SELF"]?>?Masp=<?php echo $cot["MaSanPham"]?>" method="post">
                                                <div class="row">

                                                    <div class="col-12">
                                                        <div class="default-form-box">
                                                            <label for="comment-review-text">Your review <span>*</span></label>
                                                            <textarea name="ndbinhluan" id="comment-review-text" placeholder="Write a review" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12" >
                                                        <button style="float: right" class="btn btn-md btn-black-default-hover" type="submit">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php } else {?>
<!--                                            <b style="margin-left: 350px;font-size: 20px" class="text-danger">Bạn cần đăng nhập để bình luận sản phẩm</b>-->
                                        <?php } ?>
                                    </div> <br>
                                    <!-- Start - Review Comment -->
                                    <ul class="comment">
                                        <!-- Start - Review Comment list-->
                                        <?php
                                            while ($truyvanbl=mysqli_fetch_array($cotbl)){
                                        ?>
                                        <li class="comment-list">
                                            <div class="comment-wrapper">
                                                <div class="comment-img">
                                                    <img src="../images/product/hinhanh/hinhsen2.jpg" width="78px" height="78px" alt="">
                                                </div>
                                                <div class="comment-content">
                                                    <div class="comment-content-top">
                                                        <div class="comment-content-left">
                                                            <div  style="">
                                                            </div>
                                                        </div>
                                                        <div style="margin-bottom: 20px">
                                                            <h6 class="comment-name"><?php echo $truyvanbl["Hoten"]  ?></h6>
                                                            <span style="margin-left: 550px"> Date: <?php echo $truyvanbl["NgayBinhLuan"] ?></span>
                                                            <?php if(isset($_SESSION["tendangnhap"]) && $truyvanbl["TenDangNhap"]== $_SESSION["tendangnhap"] ){ ?>
                                                                <a style="margin-left: 100px" data-bs-toggle="modal" data-bs-target="#modalQuickview2"  class="icon_chinhsua"><i class="ion-edit"></i></a>
                                                                <a style="margin-left: 10px" onclick="XoaBinhLuan(<?php echo $truyvanbl["MaBinhLuan"]; ?>,<?php echo $cot["MaSanPham"];?>)" class="ion-android-delete"></a>
                                                            <?php } ?>

                                                            <input id="bl_id" type="hidden" value="<?php echo $truyvanbl["MaBinhLuan"] ?>">
                                                            <input id="bl_noidung" type="hidden" value="<?php echo $truyvanbl["NoiDung"]  ?>">
                                                            <div   class="para-content bl_noidung" style="margin-bottom: 35px; margin-left: -3px">
                                                                <p><?php echo $truyvanbl["NoiDung"]  ?></p>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                            <!-- Start - Review Comment Reply-->

                                          <!-- End - Review Comment Reply-->
                                        </li> <!-- End - Review Comment list-->
                                        <?php } ?>
                                        <!-- Start - Review Comment list-->
                                       <!-- End - Review Comment list-->
                                    </ul> <!-- End - Review Comment -->

                                </div>
                            </div> <!-- End Product Details Tab Content Singel -->
                        </div>
                    </div> <!-- End Product Details Tab Content -->

                </div>
            </div>
        </div>
    </div>
</div> <!-- End Product Content Tab Section -->

<!-- Start Product Default Slider Section -->
<div class="product-default-slider-section section-top-gap-100 section-fluid">
    <!-- Start Section Content Text Area -->
    <div class="section-title-wrapper" data-aos="fade-up"  data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content-gap">
                        <div class="secton-content">
                            <h3  class="section-title">RELATED PRODUCTS</h3>
                            <p>Browse the collection of our related products.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $sql2="SELECT * FROM sanpham ORDER BY MaSanPham DESC LIMIT 6";
    $query2=mysqli_query($conn,$sql2);
    ?>
    <!-- Start Section Content Text Area -->
    <div class="product-wrapper" data-aos="fade-up"  data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-slider-default-1row default-slider-nav-arrow">
                        <!-- Slider main container -->
                        <div class="swiper-container product-default-slider-4grid-1row">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <?php
                                while ($cot1 = mysqli_fetch_array($query2))
                                {


                                ?>

                                <!-- End Product Default Single Item -->
                                <!-- Start Product Default Single Item -->
                                <div class="product-default-single-item product-color--golden swiper-slide">
                                    <div class="image-box">
                                        <a href="product-details-default.php?Masp=<?php echo $cot1["MaSanPham"];?>" class="image-link">
                                            <img src="../images/product/hinhanh/<?php echo $cot1["Anh"]?>" alt="">
                                            <img src="../images/product/hinhanh/<?php echo $cot1["Anh"]?>" alt="">
                                        </a>

                                    </div>
                                    <div class="content">
                                        <div class="content-left">
                                            <h6 class="title"><a href="product-details-default.php?Masp=<?php echo $cot1["MaSanPham"];?>"</a><?php echo $cot1["TenSanPham"]?></h6>
                                            <ul class="review-star">
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="empty"><i class="ion-android-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="content-right">
                                            <span class="price"><?=number_format($cot1["DonGia"],0,",",".")?> VND</span>
                                        </div>

                                    </div>
                                </div>
                                <?php } ?>

                                <!-- End Product Default Single Item -->
                                <!-- Start Product Default Single Item -->
                              <!-- End Product Default Single Item -->
                            </div>
                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalQuickview2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
<!--                        <div class="col text-right">-->
<!--                            <button type="button" class="close modal-close" data-bs-dismiss="modal" aria-label="Close">-->
<!--                                <span aria-hidden="true"> <i class="fa fa-times"></i></span>-->
<!--                            </button>-->
<!--                        </div>-->
                        <div class="col-lg-6 col-md-6 div_doimatkhau">
                            <div class="account_form" data-aos="fade-up"  data-aos-delay="0">
                                <h3>Edit Comment</h3>
                                <div class="default-form-box">
                                    <label>Content <span style="color: red" >(*)</span></label> <input type="hidden" id="bl_edit">
                                    <input id="comment_idprd" value="<?php echo $_GET["Masp"]?>" type="hidden">
<!--                                    <input required=""  id="matkhaucu" type="password">-->
                                    <textarea  id="contentcm" placeholder="Write a review"  style="width: 800px"></textarea>
                                </div>
                                <div class="login_submit">
                                    <span style="color:red;" id="bl_thongbao"></span>
                                    <button id="edit_commnent" class="btn btn-md btn-black-default-hover mb-4" type="submit">Lưu</button>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="row">
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->



<!-- End Product Default Slider Section -->
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $masp= $_GET["Masp"];
    $ngaybinhluan= date("Y-m-d");
    $ndbinhluan=$_POST["ndbinhluan"];
    $tendangnhap=$_SESSION["tendangnhap"];
    $thembl="INSERT INTO binhluan(MaSanPham,NgayBinhLuan,NoiDung,TenDangNhap) VALUES ('".$masp."','".$ngaybinhluan."','".$ndbinhluan."','".$tendangnhap."') ";
    if(mysqli_query($conn,$thembl)){
        echo "<script>alert('Bình luận của bạn đã được ghi nhận');window.location='product-details-default.php?Masp=".$masp."'</script>";
    } else{
        echo "<script>alert('Đã xảy ra lỗi');</script>";

    }
}
?>
<?php
include ('../layout/footer.php')
?>

<script>
    $(document).ready(function () {
        for (i=1;i<=<?php echo $sosao ?>;i++){
            $('.sao'+i).css('color','#ff365d');
        }
        $('.sao').mouseenter(function () {
            for(i=1;i<=$(this).attr('data-sao');i++){
                $('.sao'+i).addClass('saohover');

            }
        })
        $('.sao').mouseleave(function () {
            $('.sao').removeClass('saohover');

        })
        $('.icon_chinhsua').click(function () {
            $('#bl_edit').val($(this).parent().find("#bl_id").val());
            $('#contentcm').val($(this).parent().find("#bl_noidung").val());
        })
        
    })

</script>
<style>
    .saohover{
        color: #ff365d;

    }
</style>
<script>
    $(document).ready(function () {
        $('#edit_commnent').click(function () {
            contentcm=$('#contentcm').val();
            loi=0;
            if(contentcm=="")
            {
                loi++;
                $('#contentcm').text("Hãy nhập nội dung bình luận");
            }
            if(loi!=0){
                return false;
            }
            else {
                EditCommnent($('#bl_edit').val(),$('#comment_idprd').val(),$('#contentcm').val());
            }
        });

    });
</script>


