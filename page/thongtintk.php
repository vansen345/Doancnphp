<?php
include ('../layout/header.php');
if(isset($_SESSION["tendangnhap"]))
    echo "<script>location='index-3.php'</script>";
?>
<?php
include ('connect.php');
$laythontin="SELECT * FROM thanhvien WHERE TenDangNhap='".$_SESSION["tendangnhap"]."'";
$truyvanthongtin=mysqli_query($conn,$laythontin);
$cotthongtin=mysqli_fetch_array($truyvanthongtin);
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
            <div class="col-lg-6 col-md-6 div_doimatkhau">
                <div class="account_form" data-aos="fade-up"  data-aos-delay="0">
                    <h3>Đổi mật khẩu</h3>

                        <div class="default-form-box">
                            <label>Mật khẩu cũ <span style="color: red">(*)</span></label>
                            <input required=""  id="matkhaucu" type="password">
                        </div>
                        <div class="default-form-box">
                            <label>Mật khẩu mới <span style="color: red">(*)</span></label>
                            <input required=""  type="password" id="matkhaumoi">
                        </div>
                        <div class="default-form-box">
                            <label>Nhập lại mật khẩu <span style="color: red">(*)</span></label>
                            <input required=""  type="password" id="nhapmatkhaumoi">
                        </div>
                        <div>
                            <span style="color: red" id="mk_thongbao"></span>

                        </div>

                        <div class="login_submit">
                            <button id="doimatkhau" class="btn btn-md btn-black-default-hover mb-4" type="submit">Đổi mật khẩu</button>


                        </div>

                </div>
            </div>
            <!--login area start-->

            <!--register area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form register" data-aos="fade-up"  data-aos-delay="200">
                    <a href="#"><h3 >Thông tin tài khoản</h3></a>
                    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
                        <div class="default-form-box">
                            <label>Tên đăng nhập <span style="color: red">(*)</span></label>
                            <input id="tendangnhap" type="hidden" value="<?php echo $cotthongtin["TenDangNhap"]; ?>">

                            <p style="color: red"><?php echo $cotthongtin["TenDangNhap"]; ?></p>
                        </div>
                        <div class="default-form-box">
                            <label>Họ và tên <span style="color: red">(*)</span></label>

                            <p style="color: red"><?php echo $cotthongtin["Hoten"]; ?></p>
                        </div>
                        <div class="default-form-box">
                            <label>Email <span style="color: red">(*)</span></label>

                            <p style="color: red"><?php echo $cotthongtin["Email"]; ?></p>
                        </div>

                        <div class="default-form-box">
                            <label>Mật khẩu <span style="color: red">(*)</span></label>

                            <p style="color: red">*****</p>
                        </div>


                        <div class="default-form-box">
                            <label>Số điện thoại <span style="color: red">(*)</span></label>

                            <p style="color: red"><?php echo $cotthongtin["Dienthoai"]; ?></p>
                        </div>

                        <div class="default-form-box">
                            <label>Địa chỉ <span style="color: red">(*)</span></label>
                            <p style="color: red"><?php echo $cotthongtin["Diachi"]; ?></p>
                        </div>

                    </form>
                </div>
            </div>
            <!--register area end-->
        </div>
    </div>
</div> <!-- ...:::: End Customer Login Section :::... -->
<?php
include ('../layout/footer.php')
?>
<script>
    $(document).ready(function () {
        $('#doimatkhau').click(function () {
            matkhaucu=$('#matkhaucu').val();
            matkhaumoi=$('#matkhaumoi').val();
            nhapmatkhaumoi=$('#nhapmatkhaumoi').val();

            loi=0;
            if(matkhaucu=="" || matkhaumoi=="")
            {
                loi++;
                $("#mk_thongbao").text("Hãy nhập đầy đủ thông tin");
            }
            if(matkhaumoi!=nhapmatkhaumoi)
            {
                loi++;
                $("#mk_thongbao").text("Nhập lại mật khẩu không trùng ");
            }
            if(loi!=0)
            {
                return false;
            }
            else {
                tendangnhap=$('#tendangnhap').val();
                $("#mk_thongbao").text("");
                DoiMatKhau(tendangnhap,matkhaucu,matkhaumoi);
            }

        });

    });

</script>
