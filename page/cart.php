
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
                    <h3 class="breadcrumb-title">Cart</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="../page/index-3.php">Home</a></li>
                                <li><a href="../page/shop-full-width.php">Shop</a></li>
                                <li class="active" aria-current="page">Giỏ hàng</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

<!-- ...:::: Start Cart Section:::... -->
<div class="cart-section" id="listcart">
    <!-- Start Cart Table -->
    <div class="cart-table-wrapper"  data-aos="fade-up"  data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="table_page table-responsive">
                            <table>
                                <?php

                                if(empty($_SESSION["giohang"])){
                                    echo "<script>location='empty-cart.php';</script>";
                                ?>
                                <?php } else{
                                    ?>
                                <!-- Start Cart Table Head -->
                                <thead>
                                <tr>
                                    <th class="product_remove">Delete</th>
                                    <th class="product_thumb">Image</th>
                                    <th class="product_name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product_quantity">Quantity</th>
                                    <th class="product_total">Total</th>
                                </tr>
                                </thead> <!-- End Cart Table Head -->
                                <tbody>



<!--                             <?php
                                $number=0;
                                $total=0;
                                $tongtien=0;
                                $giohang=$_SESSION["giohang"];
                                foreach ($giohang as $key=> $value){
                                ?>
<!--                               Start Cart Single Item-->
                                <tr>
                                    <td class="product_remove"><a href="#" onclick="xoahang(<?php echo $key ?>)"><i class="fa fa-trash-o"></i></a></td>
                                    <td class="product_thumb"><a href="../page/product-details-default.php"><img src="../images/product/hinhanh/<?php echo $value["image"]?>" alt=""></a></td>
                                    <td class="product_name"><a href="../page/product-details-default.php"><?php echo $value["name"]?></a></td>
                                    <td class="product-price"><?=number_format($value["price"],0,",",".")?></td>
                                    <td class="product_quantity"><label>Quantity</label> <input  onclick="update(<?php echo $key; ?>,$(this).val())" value="<?php echo $value["number"] ?>" id="num_<?php echo $key ?>" type="number"></td>
                                    <td class="product_total"><?php
                                        $total=$value["number"]*$value["price"];
                                        $tongtien+=$total;
                                        echo number_format($total,0,",",".");
                                        ?></td>
                                </tr>
                                  <?php } } ?>

                                <!-- End Cart Single Item-->

                                </tbody>
                            </table>
                        </div>
<!--                        <div class="cart_submit">-->
<!--                            <button class="btn btn-md btn-golden" type="submit">update cart</button>-->
<!--                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Cart Table -->

    <!-- Start Coupon Start -->
    <div class="coupon_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="coupon_code left"  data-aos="fade-up"  data-aos-delay="200">
                        <h3>Coupon</h3>
                        <div class="coupon_inner">
                            <p>Enter your coupon code if you have one.</p>
                            <input class="mb-2" placeholder="Coupon code" type="text">
                            <button type="submit" class="btn btn-md btn-golden">Apply coupon</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="coupon_code right"  data-aos="fade-up"  data-aos-delay="400">
                        <h3>Cart Totals</h3>
                        <div class="coupon_inner">
                            <div class="cart_subtotal">
                                <p>Subtotal</p>
                                <p class="cart_amount"><?php  echo number_format($tongtien,0,",","."); ?></p>
                            </div>
                            <div class="cart_subtotal ">
                                <p>Shipping</p>
                                <p class="cart_amount"><span>Flat Rate:</span> $255.00</p>
                            </div>
                            <a href="#">Calculate shipping</a>

                            <div class="cart_subtotal">
                                <p>Total</p>
                                <p class="cart_amount">$215.00</p>
                            </div>
                            <div class="checkout_btn">
                                <?php if(isset($_SESSION["tendangnhap"])){ ?>
                                <a href="checkout.php" class="btn btn-md btn-golden">Proceed to Checkout</a>
                                <?php } else{ ?>
                                <span style="margin-left: 100px" class="text-danger">Bạn cần đăng nhập để đặt hàng</span>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div> <!-- End Coupon Start -->

</div> <!-- ...:::: End Cart Section:::... -->
<?php
include ('../layout/footer.php')
?>
