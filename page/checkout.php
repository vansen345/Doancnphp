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
                        <h3 class="breadcrumb-title">Thanh Toán</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="../page/index-3.php">Home</a></li>
                                    <li><a href="../page/shop-full-width.php">Shop</a></li>
                                    <li class="active" aria-current="page">Thanh toán</li>
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
                                        <label>Họ và tên <span style="color: red">(*)</span></label>
                                        <input name="hoten" type="text" value="<?php echo $cottv["Hoten"];?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label> Email <span style="color: red">(*)</span></label>
                                        <input type="text" name="email" value="<?php echo $cottv["Email"];?>" >

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
                                        <select required class="country_option nice-select wide city" name="province" id="province" >
                                            <?php
                                            $truyvantp="SELECT * FROM pvs_tinhthanhpho";
                                            $laytp=mysqli_query($conn,$truyvantp);
                                            $numtp=mysqli_num_rows($laytp);
                                            if($numtp > 0){
                                            while ($row = mysqli_fetch_array($laytp)){
                                            ?>
                                             <option value="<?php echo $row["matp"]?>"><?php echo $row["name_city"]?></option>;
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="default-form-box">
                                        <label>Quận/ huyện <span style="color: red">(*)</span></label>
                                        <select required style="position: relative" class="wide tinh" name="district" id="district">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Phường/Xã <span style="color: red">(*)</span></label>
                                        <select class="country_option nice-select wide xa" name="ward" id="ward" >
<!--                                            <option value="">--Chưa chọn phường xã--</option>-->
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
<!--                                <div id="paypal-button-container">-->
<!--                                </div>-->

                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                            <h3>Đơn hàng của bạn</h3>
                            <div class="order_table table-responsive">
                                <?php
                                if(isset($_SESSION["giohang"])){
                                $subtotal =0;
                                $ordertotal =0;
                                ?>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Tổng cộng</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                    <?php
                                    foreach ($_SESSION["giohang"] as $key=>$value){
                                    $subtotal =$value["price"]*$value["number"];
                                    $ordertotal+=$subtotal;
                                    ?>
                                        <tr>


                                            <td><?php echo $value["name"] ?> <strong> × <?php echo $value["number"] ?></strong></td>
                                            <td><?php  echo number_format($subtotal,0,",","."); ?> VNĐ</td>
                                    <?php }?>

                                        </tr>

                                    </tbody>

                                    <tfoot>

                                        <tr class="order_total">
                                            <th>Order Total</th>
                                            <td><strong><?php  echo number_format($ordertotal,0,",","."); ?> VNĐ</strong></td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td><strong class="ship"></strong></td>
                                        </tr>
                                        <tr class="order_total">
                                            <th>Sub Total</th>
                                            <td ><span class="tongtien"></span></td>
                                        </tr>
                                    </tfoot>

                                </table>
                                <?php } ?>
                            </div>
                            <div class="payment_method">
                                <div class="panel-default">
                                    <label class="checkbox-default" for="currencyCod" data-bs-toggle="collapse" data-bs-target="#methodCod">
                                        <input type="checkbox" id="currencyCod">
                                        <span>Thanh toán online</span>
                                    </label>
<!--                                    --><?php
//                                    $query="SELECT * FROM pvs_tinhthanhpho ";
//                                    $layship=mysqli_query($conn,$query);
//                                    $rowship = mysqli_fetch_array($layship);
//                                    ?>


                                    <div id="methodCod" class="collapse" data-parent="#methodCod">
                                        <div class="card-body1">
                                            <div class="order_button pt-3" style="">
                                                <?php
                                                $vnd_to_usd =  $_SESSION["tongbill"]/ 23000
                                                ?>
                                                <div style="margin-left: 30px" id="paypal-button"></div>
                                                <input type="hidden" id="vnd_to_usd" value="<?php echo ceil($vnd_to_usd) ?>">
                                            </div>

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
        $tenhkh=$_POST["hoten"];
        $tongship=$_SESSION["tongbill"];
        $thanhpho=$_POST["province"];
        $quanhuyen=$_POST["district"];
        $themdondat = "INSERT INTO dondat(TenDangNhap,MaNhanVien,TrangThai,NoiGiao,NgayDat,DienThoai,GhiChu,TenKH,tongtiengoc,tongtien,thanhpho,quanhuyen) VALUES ('" . $tendangnhap . "','1','" . $trangthai . "','" . $noigiao . "','" . $ngaydat . "','".$dienthoai."','".$ghichu."','".$tenhkh."','".$ordertotal."','".$tongship."','".$thanhpho."','".$quanhuyen."')";
        if (mysqli_query($conn, $themdondat)) {
            $madondat = 0;
            $date=date("d/m/Y");
            $laydon = "SELECT * FROM dondat ORDER BY MaDonDat";
            $truyvanlaydondat = mysqli_query($conn, $laydon);
            while ($cotDD = mysqli_fetch_array($truyvanlaydondat)) {
                $madondat = $cotDD["MaDonDat"];
            }
            $content="<div style='background: white;padding: 15px;border: 1px solid'>";
            $content="<div>";
//            $content="<div>";
//            $content="<h2>Thanks</h2>";
//            $content.="</div>";
            $content="<div style='width: 80%;float: right'>";
            $content="<hr>";

            $content="<h2 style='font-weight: normal;font-size: 24px;color: black'>Cám ơn bạn đã mua hàng!</h2>
            <p style='font-size: 16px;color: #777;line-height: 150%'>Xin chào $tenhkh.Chúng tôi đã nhận được đặt hàng của bạn và đã sẵn sàng để vận chuyển. Chúng tôi sẽ thông báo cho bạn khi đơn hàng được gửi đi.</p><hr>
            <h3 style='margin: 10px 0;font-size: 18px;color: black;font-weight: normal'>Đơn Hàng Của Bạn <p style='font-size: 14px;color: #555;line-height: 150%' >Đã đặt vào ngày: $date</p></h3>";
            $i=0;
            foreach ($_SESSION["giohang"] as $key=> $value) {
//                $total=0;
//                $tongtien=0;
                $i++;
                $masp = $value["masp"];
                $price=number_format($value["price"],0,",",".");
                $number = $value["number"];
                $total=number_format($value["price"] * $value["number"],0,",",".");
                $date=date("d/m/Y");
                $themctdd = "INSERT INTO ct_dondat VALUES ('".$madondat."','".$masp."','".$number."')";
                $tongtien= number_format($ordertotal,0,",",".");
                $hoten= $cottv["Hoten"];
                $diachi=$cottv["Diachi"];
                $sdt=$cottv["Dienthoai"];
                mysqli_query($conn, $themctdd);

                $getcount = "SELECT * FROM ct_dondat WHERE MaSanPham = '".$masp."' AND MaDonDat = '".$madondat."'";
                $get_db = mysqli_fetch_array(mysqli_query($conn, $getcount));

                $product = "SELECT * FROM sanpham WHERE MaSanPham = '".$masp."'";
                $getsl = mysqli_fetch_array(mysqli_query($conn, $product));

                $soluongton = $getsl["SoLuong"] - $get_db["SoLuong"];
                if($soluongton==0) {
                    $soldout = "UPDATE sanpham SET TrangThai = '2',SoLuong = '".$soluongton."' WHERE MaSanPham = '".$masp."'";
                    $query_soldout=mysqli_query($conn,$soldout);
                } else {
                    $query = "UPDATE sanpham SET SoLuong = '".$soluongton."' WHERE MaSanPham = '".$masp."'";
                    $queryupdate=mysqli_query($conn,$query);
                }
                $content.="     
                        <p style='margin: 4px 0;font-size: 14px;color: black'>Tên sản phẩm: <span>".$value["name"]."</span></p>
                          <p style='margin: 4px 0;font-size: 14px;color: black'>Đơn giá: <span>$price</span></p>
                          <p style='margin: 4px 0;font-size: 14px;color: black'>Số lượng: <span>$number</span></p>
                          <p style='margin: 4px 0;font-size: 14px;color: black'>Thành tiền: <span>$total</span></p>
                           <br>
                             ";
            }
            $content.='<b style="color: black">Tổng tiền: '.$tongtien.'</b>';
            $content.='</div><hr>';
            $content.='<h3 style="font-weight: normal;font-size: 20px;color: black">Thông tin khách hàng</h3>';
            $content.='<table>';
            $content.='<tbody>';
            $content.='<tr>';
            $content.='<td>';
            $content.='<h4 style="font-size: 16px;font-weight: 500;color: #555">Địa chỉ giao hàng</h4>';
            $content.='<p style="font-size: 16px;color: #777;line-height: 150%">Tên khách hàng: '.$hoten.'</p>';
            $content.='<p style="font-size: 16px;color: #777;line-height: 150%">Địa chỉ: '.$noigiao.'</p>';
            $content.='<p style="font-size: 16px;color: #777;line-height: 150%">Điện thoại: '.$dienthoai.'</p>';
            $content.='</td>';
//            $content.='<td>';
//            $content.='<h4 style="font-size: 16px;font-weight: 500;color: #555">Địa chỉ thanh toán</h4>';
//            $content.='<p style="font-size: 16px;color: #777;line-height: 150%">Tên khách hàng: '.$tenhkh.'</p>';
//            $content.='<p style="font-size: 16px;color: #777;line-height: 150%">Địa chỉ: '.$diachi.'</p>';
//            $content.='<p style="font-size: 16px;color: #777;line-height: 150%">Điện thoại: '.$sdt.'</p>';
//            $content.='</td>';
            $content.='</tr>';
            $content.='</tbody>';
            $content.='</table><hr>';
            $content.='<table>';
            $content.='<tbody>';
            $content.='<tr>';
            $content.='<td>';
            $content.='<p style="color: #999;line-height: 150%;font-size: 14px">Nếu bạn có bất cứ câu hỏi nào,đừng ngần ngại liên lạc  <a href="2sshop69888@gmail.com" style="font-size: 14px;text-decoration: none;color: #1666a2 ">2sshop69888@gmail.com</a></p>';
            $content.='</td>';
            $content.='</tr>';
            $content.='</tbody>';
            $content.='</table>';


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
        $mail->Username   = '2sshop69888@gmail.com';                     //SMTP username
        $mail->Password   = 'Sen@123456789';
        $mail->SMTPSecure = 'tls';
        $mail->CharSet = 'UTF-8';
        $mail->Port       = 587;
        $sendmail= $_POST["email"];
        $fullname=$_POST["hoten"];

        $mail->setFrom('2sshop69888@gmail.com', '2SShop GangSter');
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

<!--<script>-->
<!--    $(document).ready(function () {-->
<!--        $('#province').change(function () {-->
<!--            provinceId = $("#province").val();-->
<!--            $.post('district.php',{"provinceId":provinceId},function (data) {-->
<!--                $("#district").html(data);-->
<!--                -->
<!--            });-->
<!--        });-->
<!--    });-->
<!--</script>-->
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
