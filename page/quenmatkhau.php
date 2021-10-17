<?php
include ('../layout/header.php')
?>
<?php
include ('connect.php');
?>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $tendangnhap=$_POST["tendangnhap"];
    $kttk="SELECT * FROM thanhvien WHERE TenDangNhap='".$tendangnhap."'";
    $truyvantk=mysqli_query($conn,$kttk);
    if(mysqli_num_rows($truyvantk)>0)
    {
        $cot=mysqli_fetch_array($truyvantk);
        if(mail($cot["Email"],"Lấy lại mật khẩu website","Xin Chào ! \nMật khẩu của bạn là:".$cot["MatKhau"],"From:highclubrenew.vansang2000@gmail.com"))
            echo "<script>alert('Lấy lại mật khẩu thành công')</script>";
        else
            echo "<script>alert('Đã xảy ra lỗi')</script>";

    }
    else
    {
        echo "<script>alert('Tài khoản không tồn tại')</script>";

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
                    <h3 class="breadcrumb-title">Login</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="../page/index-3.php">Home</a></li>
                                <li><a href="../page/shop-full-width.php">Shop</a></li>
                                <li class="active" aria-current="page">Login</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

<!-- ...:::: Start Customer Login Section :::... -->
<div class="customer-login">
    <div class="container">
        <div class="row">
            <!--login area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form" data-aos="fade-up"  data-aos-delay="0">
                    <h3>Quên mật khẩu</h3>
                    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
                        <input type="hidden" name="tranghientai" value="<?php echo $_SERVER["PHP_SELF"];?>">
                        <div class="default-form-box">
                            <label>Tên đăng nhập <span style="color: red">(*)</span></label>
                            <input name="tendangnhap"  type="text" id="tendangnhap">
                        </div>
                        <div class="login_submit">
                            <button class="btn btn-md btn-black-default-hover mb-4" type="submit">Lấy lại mật khẩu</button>


                        </div>
                    </form>
                </div>
            </div>
            <!--login area start-->

            <!--register area start-->

            <!--register area end-->
        </div>
    </div>
</div> <!-- ...:::: End Customer Login Section :::... -->
<?php
include ('../layout/footer.php')
?>
