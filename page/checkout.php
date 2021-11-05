<?php
include ('../layout/header.php')
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
include ('connect.php');


?>
<?php


//include ('../PHPMAILER/lib/PHPMailer.php');
//include ('../PHPMAILER/lib/Exception.php');
//include ('../PHPMAILER/lib/OAuth.php');
//include ('../PHPMAILER/lib/POP3.php');
//include ('../PHPMAILER/lib/SMTP.php');

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
            <?php

            if(isset($_SESSION["tendangnhap"])) {
                $laythanhvien = "SELECT * FROM thanhvien WHERE TenDangNhap='" . $_SESSION["tendangnhap"] . "'";
                $truyvan = mysqli_query($conn, $laythanhvien);
                $cottv = mysqli_fetch_array($truyvan);




            ?>

            <!-- Start User Details Checkout Form -->
            <div class="checkout_form" data-aos="fade-up"  data-aos-delay="400">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                            <h3>Chi tiết đơn hàng</h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label>Họ và tên lót <span style="color: red">(*)</span></label>
                                        <input name="hoten" type="text" value="<?php echo $cottv["Hoten"];?>" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label> Email <span style="color: red">(*)</span></label>
                                        <input type="text" name="email" value="<?php echo $cottv["Email"];?>">

                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Số nhà, đường<span style="color: red">(*)</span></label>
                                        <input type="text" name="noigiao" value="<?php echo $cottv["Diachi"];?>" id="noigiao">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="default-form-box">
                                        <label>Số điện thoại <span style="color: red">(*)</span></label>
                                        <input type="tel" name="dienthoai" id="dienthoai" value="<?php echo $cottv["Dienthoai"];?>">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Ngày đặt<span style="color: red">(*)</span></label>
                                        <input type="text" value="<?php echo date("d/m/Y"); ?>" disabled>

                                    </div>
                                </div>
                                 <div class="col-12 ">
                                    <div class="default-form-box">
                                        <label for="country">Tỉnh/Thành Phố <span style="color: red">(*)</span></label>
                                        <select class="country_option nice-select wide" name="province" id="province" >
                                            <?php
                                            $truyvantp="SELECT * FROM pvs_tinhthanhpho";
                                            $laytp=mysqli_query($conn,$truyvantp);
                                                while ($row = mysqli_fetch_array($laytp)){
                                                   echo" <option value=".$row["matp"].">".$row["name_city"]."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="default-form-box">
                                        <label>Quận/ huyện <span style="color: red">(*)</span></label>
                                        <select class="country_option nice-select wide" name="district" id="district" >



                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Phường/Xã <span style="color: red">(*)</span></label>
                                        <select class="country_option nice-select wide " name="ward" id="ward" >

                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 mt-3">
                                    <div class="order-notes">
                                        <label for="order_note">Ghi chú</label>
                                        <textarea id="order_note" name="ghichu" placeholder="Hãy ghi chú lại điều bạn mong muốn để chúng tôi phục vụ tốt hơn!"></textarea>
                                    </div>
                                </div>
                                <div class="order_button pt-3">
                                    <button name="send" class="btn btn-md btn-black-default-hover" type="submit">Đặt hàng</button>
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

                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- Start User Details Checkout Form -->
        </div>
    </div><!-- ...:::: End Checkout Section:::... -->
<?php }
if(isset($_POST["send"])){
    if(isset($_SESSION["giohang"])){
        $tendangnhap = $_SESSION["tendangnhap"];
        $trangthai = "0";
        $noigiao = $_POST["noigiao"];
        $ngaydat = date("Y-m-d");
        $dienthoai=$_POST["dienthoai"];
        $ghichu=$_POST["ghichu"];
        $themdondat = "INSERT INTO dondat(TenDangNhap,MaNhanVien,TrangThai,NoiGiao,NgayDat,DienThoai,GhiChu) VALUES ('" . $tendangnhap . "','1','" . $trangthai . "','" . $noigiao . "','" . $ngaydat . "','".$dienthoai."','".$ghichu."')";

        if (mysqli_query($conn, $themdondat)) {
            $madondat = 0;
            $laydon = "SELECT * FROM dondat ORDER BY MaDonDat";
            $truyvanlaydondat = mysqli_query($conn, $laydon);
            while ($cotDD = mysqli_fetch_array($truyvanlaydondat)) {
                $madondat = $cotDD["MaDonDat"];
            }
            $content="<div style='background: white;padding: 15px;border: 1px solid'>";

            $content="<div>";
            $i=0;
            foreach ($_SESSION["giohang"] as $key=> $value) {
                $i++;
                $masp = $value["masp"];
                $price=number_format($value["price"],0,",",".");
                $number = $value["number"];
                $total=number_format($value["price"] * $value["number"],0,",",".");
                $date=date("d/m/Y");






                $themctdd = "INSERT INTO ct_dondat VALUES ('".$madondat."','".$masp."','".$number."')";
                mysqli_query($conn, $themctdd);
                $content.=" 
                           <div style='width: 80%;float: right'>
                              <h4 style='margin: 10px 0;font-size: 18px'>Đơn Hàng Của Bạn</h4>
                              <p style='margin: 4px 0;font-size: 14px'>Tên sản phẩm: <span>".$value["name"]."</span></p>
                            
                              <p style='margin: 4px 0;font-size: 14px'>Ngày đặt: <span>$date</span></p>
                              <p style='margin: 4px 0;font-size: 14px'>Đơn giá: <span>$price</span></p>
                              <p style='margin: 4px 0;font-size: 14px'>Số lượng: <span>$number</span></p>
                              <p style='margin: 4px 0;font-size: 14px'>Thành tiền: <span>$total</span></p>
                             
                              

                           </div>";

            }


            $content.='</div>';
            $content.='</div>';

            unset($_SESSION["giohang"]);
            echo "<script>alert('Đặt hàng thành công xin hãy kiểm tra email của bạn');location='shop-full-width.php';</script>";
        }
        else {
            echo "<script>alert('Đã xảy ra lỗi');</script>";
        }
    }

    else {
        echo "<script>alert('Giỏ hàng trống');</script>";
    }
    include ('../PHPMAILER/lib/PHPMailer.php');
    include ('../PHPMAILER/lib/SMTP.php');
    include ('../PHPMAILER/lib/Exception.php');
//        include ('../PHPMAILER/class/class.smtp.php');
//        include ('../PHPMAILER/class/class.phpmailer.php');



    $mail = new PHPMailer(true);
    try{

        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = '12cbvansennttkg2018@gmail.com';                     //SMTP username
        $mail->Password   = 'sendeptraikg123';
        $mail->SMTPSecure = 'tls';
        $mail->CharSet = 'UTF-8';
        $mail->Port       = 587;
        $sendmail= $_POST["email"];
        $fullname=$_POST["hoten"];

        $mail->setFrom('12cbvansennttkg2018@gmail.com', 'Shopping Cart');
        $mail->addAddress($sendmail, $fullname);
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Chào bạn đây là thông tin đơn hàng của bạn';
        $mail->Body    = $content;
        $mail->send();
        echo 'Đã gửi đơn hàng';

    } catch (Exception $e) {
        echo "Lỗi gửi mail: {$mail->ErrorInfo}";
    }



}
?>
<?php
include ('../layout/footer.php')
?>
<!--<script type="text/javascript">-->
<!--    $(document).ready(function () {-->
<!--        $('#province').change(function () {-->
<!--            var matp = $(this).val();-->
<!--            $.ajax({-->
<!--                url:"ajax.quanhuyenAjax.php",-->
<!--                method:"POST",-->
<!--                data:{matp:matp},-->
<!--                success:function (data) {-->
<!--                    $('#district').html(data);-->
<!---->
<!--                }-->
<!--            });-->
<!--        });-->
<!--    });-->
<!---->
<!--</script>-->
