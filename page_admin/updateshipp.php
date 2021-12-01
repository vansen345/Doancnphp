<?php
include ('../layout/header_admin.php');
if(!isset($_SESSION["admin"]))
    echo "<script>location='login/dangnhapadmin.php'</script>";

?>
<?php
include ('../page/connect.php');
if(!isset($_GET["id_ship"]))
    echo "<script>location='shipping.php'</script>";
$laydulieu="SELECT * FROM pvs_tinhthanhpho  WHERE matp ='".$_GET["id_ship"]."'";
$truyvanlaydulieu=mysqli_query($conn,$laydulieu);
if(mysqli_num_rows($truyvanlaydulieu)>0)
{
    $cot=mysqli_fetch_array($truyvanlaydulieu);
}
else
{
    echo "<script>location='shipping.php'</script>";

}
?>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $tp=$_POST["tp"];
    $type=$_POST["type"];
    $dongia=$_POST["price"];
    $sua="UPDATE pvs_tinhthanhpho SET  name_city = '".$tp."', type = '".$type."', phiship = '".$dongia."' WHERE matp = '".$_GET["id_ship"]."'";
    if(mysqli_query($conn,$sua))
    {
        echo "<script>alert('Thêm thành công')</script>";
        echo "<script>location='shipping.php';</script>";
    }
    else{
        echo "<script>alert('Xảy ra lỗi')</script>";
    }
}
?>
<div class="page-content">
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button"></button>
            <h3>portlet Settings</h3>
        </div>
        <div class="modal-body">
            <p>Here will be a configuration form</p>
        </div>
    </div>
    <h3 class="page-title">
        Editable Tables <small>editable table samples</small>
    </h3>
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.php">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="table_editable.php">Phí vận chuyển</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Cập nhật</a></li>
    </ul>

    <div class="col-lg-12">
        <div>
            <form method="post" action="<?php echo $_SERVER["REQUEST_URI"];?>" enctype="multipart/form-data">
                <table class="table table-bordered">
                    <tr>
                        <th>Tên thành phố</th>
                        <td><input required id="tp" name="tp" class="form-control" style="width: 500px" value="<?php echo empty($_POST["tp"])? $cot["name_city"]:$_POST["tp"]; ?>"></td>

                    </tr>
                    <tr>
                        <th>Thuộc</th>
                        <td><input required id="type" name="type" class="form-control" style="width: 500px"  value="<?php echo empty($_POST["type"])? $cot["type"]:$_POST["type"]; ?>"></td>

                    </tr>
                    <tr>
                        <th>Phí vận chuyển</th>
                        <td>
                            <input required id="price" name="price" class="form-control" style="width: 500px"  value="<?=number_format($cot["phiship"],0,",",".")?>">
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <th><input id="luu" type="submit" value="Lưu" class=" btn-success"></th>

                    </tr>
                </table>
            </form>
        </div>

    </div>

</div>



<?php
include ('../layout/footer-admin.php');
?>


