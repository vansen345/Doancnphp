<?php
include ('../layout/header.php')
?>
<?php
if(!isset($_GET["id_blog"]))
    echo "<script>location='blog-full-width.php';</script>";
$laysp="SELECT * FROM blog WHERE Id_blog='".$_GET["id_blog"]."'";
$truyvan=mysqli_query($conn,$laysp);
$cot=mysqli_fetch_array($truyvan);
?>
<?php
$count="SELECT MaBinhLuanBlog FROM binhluanblog WHERE MaBlog = '".$_GET["id_blog"]."' ";
$countbl=mysqli_query($conn,$count);
$row= mysqli_num_rows($countbl);
?>
<!-- Offcanvas Overlay -->
<div class="offcanvas-overlay"></div>

<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Chi Tiết</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="index-3.php">Home</a></li>
                                <li><a href="../page/blog-full-width.php">Blog</a></li>
                                <li class="active" aria-current="page">Chi Tiết</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

<!-- ...:::: Start Blog Single Section:::... -->
<div class="blog-section">
    <div class="container">
        <div class="row flex-column-reverse flex-lg-row">
            <div class="col-lg-3">
                <!-- Start Sidebar Area -->
                <div class="siderbar-section" data-aos="fade-up"  data-aos-delay="0">

                    <!-- Start Single Sidebar Widget -->
                   <!-- End Single Sidebar Widget -->

                    <!-- Start Single Sidebar Widget -->
                    <!-- End Single Sidebar Widget -->

                    <!-- Start Single Sidebar Widget -->
                  <!-- End Single Sidebar Widget -->

                    <!-- Start Single Sidebar Widget -->
                   <!-- End Single Sidebar Widget -->

                    <!-- Start Single Sidebar Widget -->
                    <div class="sidebar-single-widget" >
                        <h6 class="sidebar-title">PRODUCT CATEGORIES</h6>
                        <div class="sidebar-content">
                            <ul class="sidebar-menu">
                                <li>
                                    <ul class="sidebar-menu-collapse">
                                        <!-- Start Single Menu Collapse List -->
                                        <li class="sidebar-menu-collapse-list">
                                            <div class="accordion">
                                                <div id="men-fashion" class="collapse">

                                                    <ul class="accordion-category-list">
                                                        <li><a href=""></a></li>

                                                    </ul>


                                                </div>
                                            </div>
                                        </li> <!-- End Single Menu Collapse List -->
                                    </ul>
                                </li>
                                <?php

                                $layloaisp="SELECT * FROM loaisp";
                                $truyvan=mysqli_query($conn,$layloaisp);
                                while ($row=mysqli_fetch_array($truyvan))
                                {?>
                                <li ><a href="../page/danhmucsp.php?loaisp=<?php echo $row["MaLoaiSP"]?>"><?php echo $row["TenLoai"]?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div> <!-- End Single Sidebar Widget -->

                </div> <!-- End Sidebar Area -->
            </div>
            <div class="col-lg-9">
                <!-- Start Blog Single Content Area -->
                <div class="blog-single-wrapper">
                    <div class="blog-single-img" data-aos="fade-up"  data-aos-delay="0">
                        <img class="img-fluid" src="../images/product/hinhanh/<?php echo $cot["Image"]?>" alt="">
                    </div>
                    <ul class="post-meta" data-aos="fade-up"  data-aos-delay="200">
                        <li>POSTED BY : <a href="#" class="author">Admin</a></li>

                    </ul>
                    <h4 class="post-title" data-aos="fade-up"  data-aos-delay="400"><?php echo $cot["Title"]?></h4>
                    <div class="para-content" data-aos="fade-up"  data-aos-delay="600">
                        <p><?php echo $cot["Content"] ?>.</p>
                        <p><?php echo $cot["Content2"]?>.</p>
                        <p><?php echo $cot["Content3"]?>.</p>

                    </div>
                    <div class="para-tags" data-aos="fade-up"  data-aos-delay="0">

                    </div>
                </div> <!-- End Blog Single Content Area -->
                <div class="comment-area">
                    <div class="comment-box" data-aos="fade-up"  data-aos-delay="0">
                        <h4 class="title mb-4"><?php echo $row ?> Comments</h4>
                        <?php
                        $layblog="SELECT * FROM binhluanblog INNER JOIN thanhvien ON binhluanblog.TenDangNhap = thanhvien.TenDangNhap WHERE MaBlog='".$cot["Id_blog"]."' ORDER BY MaBinhLuanBlog DESC ";
                        $cotblog=mysqli_query($conn,$layblog);
                        ?>
                        <!-- Start - Review Comment -->
                        <ul class="comment">
                            <?php
                            while ($truyvanblog=mysqli_fetch_array($cotblog)){
                            ?>
                            <!-- Start - Review Comment list-->
                            <li class="comment-list">
                                <div class="comment-wrapper userComment" >
                                    <div class="comment-img">
                                        <img src="../images/user/image-1.png" alt="">
                                    </div>
                                    <div class="comment-content">
                                        <div class="comment-content-top">
                                            <div class="comment-content-left">
                                                <h6 class="comment-name"><?php echo $truyvanblog["Hoten"]  ?></h6>
                                            </div>
                                            <?php if(isset($_SESSION["tendangnhap"]) && $truyvanblog["TenDangNhap"]== $_SESSION["tendangnhap"] ){ ?>

                                            <a style="margin-left: 10px;margin-bottom: 3px" onclick="XoaBinhLuanBlog(<?php echo $truyvanblog["MaBinhLuanBlog"]; ?>,<?php echo $cot["Id_blog"];?>)" class="ion-android-delete"></a>
                                            <?php } ?>

                                        </div>


                                        <div class="para-content">
                                            <p><?php echo $truyvanblog["NoiDung"]  ?> </p>
                                        </div>
                                        <div class="comment-content-right" >
                                            <a href="javascript:void(0)" onclick="reply(this)"><i class="fa fa-reply"></i>Reply</a>
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
                        <ul class="comment-reply " >
                            <li class="comment-reply-list " >
                                <div class="comment-wrapper replyrow" style="display: none;margin-top: 20px">
                                    <div class="comment-img">
                                        <img src="../images/user/image-1.png" alt="">
                                    </div>

                                    <div class="comment-content">
                                        <div class="comment-content-top">
                                            <div class="comment-content-left">
                                                <h6 class="comment-name">Oaklee Odom</h6>
                                            </div>
                                        </div>
                                        <div class="para-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora inventore dolorem a unde modi iste odio amet, fugit fuga aliquam, voluptatem maiores animi dolor nulla magnam ea! Dignissimos aspernatur cumque nam quod sint provident modi alias culpa, inventore deserunt accusantium amet earum soluta consequatur quasi eum eius laboriosam, maiores praesentium explicabo enim dolores quaerat! Voluptas ad ullam quia odio sint sunt. Ipsam officia, saepe repellat. </p>
                                        </div>
                                        <form method="post">
                                        <div class="col-md-12">
                                            <textarea class="form-control" cols="90" rows="2" name="reply_blog" id="comment-review-text2" placeholder="Write a review" required></textarea>
                                        </div>
                                        <div class="col-12" style="margin-top: 10px;margin-left: 550px">
                                            <button class="btn-black-default-hover" onclick="$('.replyrow').hide();">Close</button>
                                            <button name="rl_comment" class="btn-black-default-hover" type="submit" id="addReply">Reply</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Start comment Form -->
                    <div class="comment-form" data-aos="fade-up"  data-aos-delay="0">
                        <div class="coment-form-text-top mt-30">
                            <h4 class="title mb-3 mt-3">Comment</h4>

                        </div>
                        <?php if(isset($_SESSION["tendangnhap"])){ ?>

                        <form action="<?php echo $_SERVER["PHP_SELF"]?>?id_blog=<?php echo $cot["Id_blog"]?>" method="post">
                            <div class="row">


                                <div class="col-12">
                                    <div class="default-form-box mb-20">
                                        <label for="comment-review-text">Your review <span>*</span></label>
                                        <textarea name="bl_blog" id="comment-review-text" placeholder="Write a review" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-md btn-golden"  type="submit">Post Comment</button>
                                </div>
                            </div>
                        </form>
                        <?php } else {?>
                            <b style="margin-left: 190px;font-size: 20px" class="text-danger">Bạn cần đăng nhập để bình luận bài viết</b>
                        <?php } ?>
                    </div> <!-- End comment Form -->
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Blog Single Section:::... -->

<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $mablog= $_GET["id_blog"];
    $ngaybinhluan= date("Y-m-d");
    $ndbinhluan=$_POST["bl_blog"];
    $tendangnhap= $_SESSION["tendangnhap"];
    $thembl="INSERT INTO binhluanblog(MaBlog,NgayBinhLuan,NoiDung,TenDangNhap) VALUES ('".$mablog."','".$ngaybinhluan."','".$ndbinhluan."','".$tendangnhap."') ";
    if(mysqli_query($conn,$thembl)){
        echo "<script>alert('Bình luận của bạn đã được ghi nhận');window.location='blog-single-sidebar-left.php?id_blog=".$mablog."'</script>";
    } else{
        echo "<script>alert('Đã xảy ra lỗi');</script>";

    }
}
?>
<?php
//if(isset($_POST["rl_comment"])){
//    $date= date("Y-m-d");
//    $ndrl=$_POST["reply_blog"];
//    $id=  $_GET["id_blog"];
//    $user=$_SESSION["tendangnhap"];
//    $themrpl="INSERT INTO replylog (MaBinhLuanBlog,NgayBinhLuan,NoiDung,TenDangNhap) VALUES ('".$id."','".$date."','".$ndrl."','".$user."') ";
//    if(mysqli_query($conn,$themrpl)){
//        echo "<script>alert('Bình luận của bạn đã được ghi nhận');window.location='blog-single-sidebar-left.php?id_blog=".$id."'</script>";
//    } else{
//        echo "<script>alert('Đã xảy ra lỗi');</script>";
//
//    }
//}
?>
<?php
include ('../layout/footer.php')
?>
<script>

    function reply(caller) {
        $(".replyrow").insertAfter($(caller));
        $('.replyrow').show();
        
    }
</script>

