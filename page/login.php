<?php
include ('../layout/header.php')
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
                        <form action="#" method="POST">
                            <div class="default-form-box">
                                <label>Email <span style="color: red">(*)</span></label>
                                <input type="text">
                            </div>
                            <div class="default-form-box">
                                <label>Mật khẩu <span style="color: red">(*)</span></label>
                                <input type="password">
                            </div>
                            <div class="login_submit">
                                <button class="btn btn-md btn-black-default-hover mb-4" type="submit">Đăng nhập</button>
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
                        <form action="#">
                            <div class="default-form-box">
                                <label>Họ và tên <span style="color: red">(*)</span></label>
                                <input type="text">
                            </div>
                            <div class="default-form-box">
                                <label>Email <span style="color: red">(*)</span></label>
                                <input type="email">
                            </div>
                            <div class="default-form-box">
                                <label>Mật khẩu <span style="color: red">(*)</span></label>
                                <input type="password">
                            </div>
                            <div class="default-form-box">
                                <label>Nhập lại mật khẩu <span style="color: red">(*)</span></label>
                                <input type="password">
                            </div>
                            <div class="default-form-box">
                                <label>Số điện thoại <span style="color: red">(*)</span></label>
                                <input type="tel">
                            </div>
                            <div class="default-form-box">
                                <label>Địa chỉ <span style="color: red">(*)</span></label>
                                <input type="text">
                            </div>
                            <div class="login_submit">
                                <button class="btn btn-md btn-black-default-hover" type="submit" >Đăng ký</button>
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
