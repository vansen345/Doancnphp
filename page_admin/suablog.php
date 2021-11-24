<?php
include ('../layout/header_admin.php');
if(!isset($_SESSION["admin"]))
    echo "<script>location='login/dangnhapadmin.php'</script>";

?>
<?php
if(!isset($_GET["MaBlog"]))
    echo "<script>location='blog.php'</script>";
$getBlog = "SELECT * FROM blog WHERE Id_blog = '".$_GET["MaBlog"]."'";
$query = mysqli_query($conn,$getBlog);
if (mysqli_num_rows($query) > 0) {
    $dbdata = mysqli_fetch_array($query);
} else {
    echo "<script>location='blog.php'</script>";
}

$querynhanvien = "SELECT * FROM nhanvien WHERE TenDangNhap = '".$_SESSION["admin"]."'";
$getnhanvien = mysqli_query($conn, $querynhanvien);
$laynhanvien = mysqli_fetch_array($getnhanvien);

if($_SERVER["REQUEST_METHOD"]=="POST") {
    $tieudeblog = $_POST["title"];
    $noidung1 = $_POST["noidung1"];
    $noidung2 = $_POST["noidung2"];
    $noidung3 = $_POST["noidung3"];
    $img = $dbdata["Image"];

    if(($_FILES["imageblog"]["name"]!="")) {
        unlink("../images/product/hinhanh/".$img);
        $img = $_FILES["imageblog"]['name'];
        move_uploaded_file($_FILES["imageblog"]['tmp_name'],'../images/product/hinhanh/'.$img);
    }

    $sql = "UPDATE blog SET Id_nhanvien = '".$laynhanvien["MaNhanVien"]."',Title = '".$tieudeblog."',Image='".$img."', Content = '".$noidung1."', Content2 = '".$noidung2."', Content3 = '".$noidung3."' WHERE Id_blog = '".$_GET["MaBlog"]."'";
    $queryupdate = mysqli_query($conn,$sql);
    if($queryupdate > 0) {
        echo "<script>alert('Cập nhật thành công')</script>";
        echo "<script>location='blog.php'</script>";
    } else {
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
            <a href="table_editable.php">Blog</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Update Blog</a></li>
    </ul>

    <div class="col-lg-12">
        <div>
            <form method="post" action="<?php echo $_SERVER["REQUEST_URI"];?>" enctype="multipart/form-data">
                <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <td><input required id="title" name="title" class="form-control" style="width: 500px" value="<?php echo empty($_POST["title"])? $dbdata["Title"]:$_POST["title"]; ?>"></td>

                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <img width="100px" src="../images/product/hinhanh/<?php echo $dbdata["Image"];?>">

                        </td>
                    </tr>
                    <tr>
                        <th>Ảnh</th>
                        <td><input  type="file" id="anh" name="imageblog" class="form-control" style="width: 500px"></td>

                    </tr>
                    <tr>
                        <th>Nội dung 1</th>
                        <td>  <textarea class="form-control col-md-8" name="noidung1" id="noidung1" cols="50" rows="30" style="height: 100px; color: black"><?php echo empty($_POST["noidung1"])? $dbdata["Content"] : $_POST["noidung1"]?></textarea></td>
                    </tr>
                    <tr>
                        <th>Nội dung 2</th>
                        <td>  <textarea class="form-control col-md-8" name="noidung2" id="noidung1" cols="50" rows="30" style="height: 100px; color: black"><?php echo empty($_POST["noidung2"])? $dbdata["Content2"] : $_POST["noidung2"]?></textarea></td>
                    </tr>
                    <tr>
                        <th>Nội dung 3</th>
                        <td>  <textarea class="form-control col-md-8" name="noidung3" id="noidung1" cols="50" rows="30" style="height: 100px; color: black"><?php echo empty($_POST["noidung3"])? $dbdata["Content3"] : $_POST["noidung3"]?></textarea></td>
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

