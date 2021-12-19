<?php
include ('../layout/header.php')
?>
<?php
include ('connect.php');
$item_per_page=!empty($_GET['per_page'])?$_GET['per_page']:3;
$current_page=!empty($_GET['page'])?$_GET['page']:1;
$offset=($current_page-1) * $item_per_page;
$blog="SELECT * FROM blog ORDER BY Id_blog ASC LIMIT ".$item_per_page." OFFSET ".$offset;
$query=mysqli_query($conn,$blog);
$total=mysqli_query($conn,"SELECT * FROM blog");
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
                    <h3 class="breadcrumb-title">Blog</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="../page/index-3.php">Home</a></li>
                                <li><a href="../page/blog-full-width.php">Blog</a></li>
                                <li class="active" aria-current="page">Blog</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

<!-- ...:::: Start Blog List Section:::... -->
<div class="blog-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-wrapper">
                    <div class="row mb-n6">
                        <?php
                        while ($cot=mysqli_fetch_array($query)){


                        ?>
                        <div class="col-xl-4 col-md-6 col-12 mb-6">
                            <!-- Start Product Default Single Item -->
                            <div class="blog-list blog-grid-single-item blog-color--golden"  data-aos="fade-up"  data-aos-delay="0">
                                <div class="image-box">
                                    <a href="blog-single-sidebar-left.php?id_blog=<?php echo $cot["Id_blog"]?>" class="image-link">
                                        <img class="img-fluid" src="../images/product/hinhanh/<?php echo $cot["Image"]?>" alt="">
                                    </a>
                                </div>
                                <div class="content">

                                    <h6 class="title"><a href="blog-single-sidebar-left.php?id_blog=<?php echo $cot["Id_blog"]?>"><?php echo $cot["Title"]?></a></h6>

                                    <a href="blog-single-sidebar-left.php?id_blog=<?php echo $cot["Id_blog"]?>" class="read-more-btn icon-space-left">Read More <span class="icon"><i class="ion-ios-arrow-thin-right"></i></span></a>
                                </div>
                            </div>
                            <!-- End Product Default Single Item -->
                        </div>
                        <?php } ?>

                    </div>
                </div>

                <!-- Start Pagination -->
                <div class="page-pagination text-center" data-aos="fade-up"  data-aos-delay="0">
                    <ul>
                        <?php
                        include ("phantrangblog.php");
                        ?>
                    </ul>
                </div> <!-- End Pagination -->
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Blog List Section:::... -->
<?php
include ('../layout/footer.php')
?>
