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
                        <h3 class="breadcrumb-title">Checkout</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="../page/index-3.php">Home</a></li>
                                    <li><a href="../page/shop-full-width.php">Shop</a></li>
                                    <li class="active" aria-current="page">Checkout</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Checkout Section:::... -->
    <div class="checkout-section">
        <div class="container">
            <div class="row">
                <!-- User Quick Action Form -->
                <div class="col-12">
                    <div class="user-actions accordion" data-aos="fade-up"  data-aos-delay="0">


                    </div>
                    <div class="user-actions accordion" data-aos="fade-up"  data-aos-delay="200">
                        <h3>
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                            Bạn có mã khuyến mãi?
                            <a class="Returning" href="#" data-bs-toggle="collapse" data-bs-target="#checkout_coupon" aria-expanded="true">Nhập mã khuyến mãi!</a>

                        </h3>
                        <div id="checkout_coupon" class="collapse checkout_coupon" data-parent="#checkout_coupon">
                            <div class="checkout_info">
                                <form action="#">
                                    <input placeholder="Mã khuyến mãi" type="text">
                                    <button class="btn btn-md btn-black-default-hover" type="submit">Nhập</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- User Quick Action Form -->
            </div>
            <!-- Start User Details Checkout Form -->
            <div class="checkout_form" data-aos="fade-up"  data-aos-delay="400">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <form action="#">
                            <h3>Chi tiết đơn hàng</h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label>Họ và tên lót <span style="color: red">(*)</span></label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label> Email <span style="color: red">(*)</span></label>
                                        <input type="text">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Số nhà, đường<span style="color: red">(*)</span></label>
                                        <input type="text" name="noigiao" id="noigiao">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label>Số điện thoại <span style="color: red">(*)</span></label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Ngày đặt<span style="color: red">(*)</span></label>
                                        <input type="text">
                                    </div>
                                </div>
                                <!--  <div class="col-12">
                                    <div class="default-form-box">
                                        <label for="country">Phường/ xã <span style="color: red">(*)</span></label>
                                        <select class="country_option nice-select wide" name="country" id="country">
                                            <option value="2">Bangladesh</option>
                                            <option value="3">Algeria</option>
                                            <option value="4">Afghanistan</option>
                                            <option value="5">Ghana</option>
                                            <option value="6">Albania</option>
                                            <option value="7">Bahrain</option>
                                            <option value="8">Colombia</option>
                                            <option value="9">Dominican Republic</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Quận/ huyện <span style="color: red">(*)</span></label>
                                        <select class="country_option nice-select wide" name="country" id="country">
                                            <option value="2">Bangladesh</option>
                                            <option value="3">Algeria</option>
                                            <option value="4">Afghanistan</option>
                                            <option value="5">Ghana</option>
                                            <option value="6">Albania</option>
                                            <option value="7">Bahrain</option>
                                            <option value="8">Colombia</option>
                                            <option value="9">Dominican Republic</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Tỉnh/ Thành phố <span style="color: red">(*)</span></label>
                                        <select class="country_option nice-select wide" name="country" id="country">
                                            <option value="2">Bangladesh</option>
                                            <option value="3">Algeria</option>
                                            <option value="4">Afghanistan</option>
                                            <option value="5">Ghana</option>
                                            <option value="6">Albania</option>
                                            <option value="7">Bahrain</option>
                                            <option value="8">Colombia</option>
                                            <option value="9">Dominican Republic</option>
                                        </select>
                                    </div>
                                </div>-->

                                <div class="col-12 mt-3">
                                    <div class="order-notes">
                                        <label for="order_note">Ghi chú</label>
                                        <textarea id="order_note" placeholder="Hãy ghi chú lại điều bạn mong muốn để chúng tôi phục vụ tốt hơn!"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <form action="#">
                            <h3>Đơn hàng của bạn</h3>
                            <div class="order_table table-responsive">
                                <?php
                                if(isset($_SESSION["giohang"])){
                                $subtotal =0;
                                $ordertotal =0;
                                foreach ($_SESSION["giohang"] as $key=>$value){
                                    $subtotal +=$value["price"]*$value["number"];
                                    $ordertotal+=$subtotal;

                                }

                                ?>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Tổng cộng</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    foreach ($_SESSION["giohang"] as $key=>$value){
                                    ?>

                                    <tbody>
                                        <tr>

                                            <td><?php echo $value["name"] ?> <strong> × <?php echo $value["number"] ?></strong></td>
                                            <td><?php  echo number_format($subtotal,0,",","."); ?></td>

                                        </tr>

                                    </tbody>
                                    <?php }?>
                                    <tfoot>
                                        <tr>
                                            <th>Shipping</th>
                                            <td><strong>$5.00</strong></td>
                                        </tr>
                                        <tr class="order_total">
                                            <th>Order Total</th>
                                            <td><strong><?php  echo number_format($ordertotal,0,",","."); ?></strong></td>
                                        </tr>
                                    </tfoot>

                                </table>
                                <?php } ?>
                            </div>
                            <div class="payment_method">
                                <div class="panel-default">
                                    <label class="checkbox-default" for="currencyCod" data-bs-toggle="collapse" data-bs-target="#methodCod">
                                        <input type="checkbox" id="currencyCod">
                                        <span>Thanh toán khi nhận hàng (COD)</span>
                                    </label>

                                    <div id="methodCod" class="collapse" data-parent="#methodCod">
                                        <div class="card-body1">
                                            <p>Vui lòng kiểm tra lại thông tin giao hàng gồm: Số nhà, đường, Phường/ xã, Quận/ huyện, Tỉnh/ thành phó</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-default">
                                    <label class="checkbox-default" for="currencyPaypal" data-bs-toggle="collapse" data-bs-target="#methodPaypal">
                                        <input type="checkbox" id="currencyPaypal">
                                        <span>Thanh toán Momo</span>
                                    </label>
                                    <div id="methodPaypal" class="collapse " data-parent="#methodPaypal">
                                        <div class="card-body1">
                                            <p>Sau khi thanh toán vui lòng chụp lại tin nhắn thanh toán thành công và gửi cho CSKH!</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="order_button pt-3">
                                    <button class="btn btn-md btn-black-default-hover" type="submit">Đặt hàng</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- Start User Details Checkout Form -->
        </div>
    </div><!-- ...:::: End Checkout Section:::... -->
<?php
include ('../layout/footer.php')
?>
