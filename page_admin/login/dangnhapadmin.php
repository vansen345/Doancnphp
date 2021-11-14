
<!doctype html>
<html lang="en">
<head>
    <title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../login/css/style.css">

    <link rel="stylesheet" href="../login/icon_admin/fontawesome-free-5.15.3-web/css/all.min.css">
    <?php
    session_start();
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="doanphp";
    $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    if($conn)
    {
        mysqli_query($conn,"SET NAMES 'utf8'");
    }
    else{
        echo "Bạn đã kết nối thất bại".mysqli_connect_error();
    }
    ?>

</head>
<body class="img js-fullheight" style="background-image: url(../login/images/bg.jpg);">
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Login #10</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    <h3 class="mb-4 text-center">Have an account?</h3>
                    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>" class="signin-form">
                        <div class="form-group">
                            <input name="tendangnhap" id="tendangnhap" type="text" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <input name="matkhau" id="matkhau" type="password" class="form-control" placeholder="Password" required>
                            <span id="eye" toggle="#password-field"  <i class="fa fa-fw fa-eye field-icon toggle-password"</i> </span>
                        </div>
                        <div class="form-group">
                            <button id="dangnhap" type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
                        </div>
                        <div class="form-group d-md-flex">
                            <div class="w-50">
                                <label class="checkbox-wrap checkbox-primary">Remember Me
                                    <input type="checkbox" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="w-50 text-md-right">
                                <a href="#" style="color: #fff">Forgot Password</a>
                            </div>
                        </div>
                    </form>
                    <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
                    <div class="social d-flex text-center">
                        <a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
                        <a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $tendangnhap=$_POST["tendangnhap"];
    $matkhau=$_POST["matkhau"];
    $kt="SELECT * FROM nhanvien WHERE TenDangNhap='".$tendangnhap."' and MatKhau='".$matkhau."'";
    $truyvan=mysqli_query($conn,$kt);
    if(mysqli_num_rows($truyvan)>0){
        echo "<script>alert('Đăng nhập thành công')</script>";
        $_SESSION["admin"]=$tendangnhap;
        echo "<script>location='../index.php';</script>";
    }
    else{
        echo "<script>alert('Tài khoản hoặc mật khẩu không đúng')</script>";

    }
}
?>

<script src="../login/js/jquery.min.js"></script>
<script src="../login/js/popper.js"></script>
<script src="../login/js/bootstrap.min.js"></script>
<script src="../login/js/main.js"></script>

</body>
</html>
<script>
    $(document).ready(function () {
        $('#eye').click(function () {
            $(this).toggleClass('open');
            if($(this).hasClass('open')){
                //alert('ok');
                $(this).prev().attr('type','text');
            } else {
                $(this).prev().attr('type','password');
            }
        });

    });
</script>


