<?php
include ('../layout/header.php');
if(isset($_SESSION["tendangnhap"]))
    echo "<script>location='index-3.php'</script>";
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
                        <h3>Đăng nhập</h3>
                        <form method="post" action="dangnhap.php" >
                            <input type="hidden" name="tranghientai" value="<?php echo $_SERVER["PHP_SELF"];?>">
                            <div class="default-form-box">
                                <label>Tên đăng nhập <span style="color: red">(*)</span></label>
                                <input required="" name="tendangnhap" id="dn_dangnhap" type="text">
                            </div>
                            <div class="default-form-box">
                                <label>Mật khẩu <span style="color: red">(*)</span></label>
                                <input required="" name="matkhau" type="password" id="dn_matkhau">
                            </div>
                            <div>
                                <span class="text-danger" id="dn_thongbao"></span>

                            </div>

                            <div class="login_submit">
                                <button id="dangnhap" class="btn btn-md btn-black-default-hover mb-4" type="submit">Đăng nhập</button>
                                <label class="checkbox-default mb-4" for="offer">
                                    <input type="checkbox" id="offer">
                                    <span>Nhớ tôi</span>
                                </label>
                                <a href="#">Quên mật khẩu?</a>

                            </div>
                        </form>
                    </div>
                </div>
                <!--login area start-->

                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register" data-aos="fade-up"  data-aos-delay="200">
                        <h3>Đăng ký</h3>
                        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
                            <div class="default-form-box">
                                <label>Tên đăng nhập <span style="color: red">(*)</span></label>
                                <input name="tendangnhap"  id="tendangnhap" type="text">
                            </div>
                            <div class="default-form-box">
                                <label>Họ và tên <span style="color: red">(*)</span></label>
                                <input type="text" name="hoten" id="hoten">
                            </div>
                            <div class="default-form-box">
                                <label>Email <span style="color: red">(*)</span></label>
                                <input type="text" name="email" id="email">
                            </div>
                            <div class="form-group">
                                <span style="color: red"  id="thongbaoemail"></span>
                            </div>
                            <div class="default-form-box">
                                <label>Mật khẩu <span style="color: red">(*)</span></label>
                                <input type="password" name="matkhau" id="matkhau">
                            </div>
                            <div class="default-form-box">
                                <label>Nhập lại mật khẩu <span style="color: red">(*)</span></label>
                                <input type="password" name="nhaplaimatkhau" id="nhaplaimatkhau" >
                            </div>
                            <div class="form-group">
                                <span style="color: red"  id="thongbaomk"></span>
                            </div>
                            <div class="default-form-box">
                                <label>Số điện thoại <span style="color: red">(*)</span></label>
                                <input type="text" name="dienthoai" id="dienthoai">
                            </div>
                            <div class="form-group">
                                <span style="color: red"  id="thongbaodt"></span>
                            </div>
                            <div class="default-form-box">
                                <label>Địa chỉ <span style="color: red">(*)</span></label>
                                <input type="text" name="diachi" id="diachi">
                            </div>
                            <div class="form-group">
                                <span style="color: red"  id="thongbao"></span>
                            </div>
                            <div class="login_submit">
                                <button id="dangky" class="btn btn-md btn-black-default-hover" type="submit" >Đăng ký</button>
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
<?php
include ('connect.php');

if($_SERVER["REQUEST_METHOD"]=="POST") {
    $tendangnhap = $_POST["tendangnhap"];
    $matkhau = $_POST["matkhau"];
    $hoten = $_POST["hoten"];
    $diachi = $_POST["diachi"];
    $dienthoai = $_POST["dienthoai"];
    $email = $_POST["email"];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        echo "<script>$('#thongbaoemail').text('Email không hợp lệ');</script>";
    else{
        $kt="SELECT * FROM thanhvien WHERE TenDangNhap = '".$tendangnhap."'";
        $truyvantontai=mysqli_query($conn,$kt);
        if(mysqli_num_rows($truyvantontai)>0)
            echo "<script>$('#thongbao').text('Tài khoản đã tồn tại');</script>";
        else{
            $themnguoidung="INSERT INTO thanhvien VALUES ('".$tendangnhap."','".$matkhau."','".$hoten."','".$diachi."','".$dienthoai."','".$email."')";
            $truyvanthemnguoidung=mysqli_query($conn,$themnguoidung);
            if($truyvanthemnguoidung)
                echo "<script>$('#thongbao').text('Đăng ký thành công');</script>";

        }
    }
}
?>
<script>
    $(document).ready(function () {
        $("#dangky").click(function () {
            tendangnhap=$('#tendangnhap').val();
            matkhau=$('#matkhau').val();
            nhaplaimatkhau=$('#nhaplaimatkhau').val();
            hoten=$('#hoten').val();
            diachi=$('#diachi').val();
            dienthoai=$('#dienthoai').val();
            email=$('#email').val();

            loi=0;
            if(tendangnhap=="" || matkhau=="" || hoten=="" ||  diachi=="" || dienthoai=="" || email=="")
            {
                loi++;

                $("#thongbao").text("Hãy nhập đầy đủ thông tin");

            }
            if(matkhau!=nhaplaimatkhau)
            {
                loi++;
                $("#thongbaomk").text("Mật khẩu không trùng khớp");
            }
            if(isNaN(dienthoai))
            {
                loi++;
                $("#thongbaodt").text("Điện thoại phải là số!");

            }


            if (loi!=0)
            {
                return false;
            }
        });


    });
</script>
