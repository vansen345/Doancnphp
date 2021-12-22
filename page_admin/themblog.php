<?php
include ('../layout/header_admin.php');
if(!isset($_SESSION["admin"]))
    echo "<script>location='login/dangnhapadmin.php'</script>";

?>
<?php
include ('../page/connect.php');

?>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $title=$_POST["title"];
    $anh=$_FILES["anh"];
    $content=$_POST["content1"];
    $content2=$_POST["content2"];
    $content3=$_POST["content3"];

    $querynhanvien = "SELECT * FROM nhanvien WHERE TenDangNhap = '".$_SESSION["admin"]."'";
    $getnhanvien = mysqli_query($conn, $querynhanvien);
    $laynhanvien = mysqli_fetch_array($getnhanvien);


    if($anh["type"]!="image/jpeg" && $anh["type"]!="image/png")
    {
        echo "<script>alert('Hãy chọn đúng định dạng hình')</script>";
        echo "<script>location='themblog.php';</script>";
        return;
    }

    move_uploaded_file($anh["tmp_name"],"../images/product/hinhanh/".$anh["name"]);


    $them="INSERT INTO blog(Id_nhanvien,Title,Image,Content,Content2,Content3) VALUES ('".$laynhanvien["MaNhanVien"]."','".$title."','".$anh["name"]."','".$content."','".$content2."','".$content3."')";
    if(mysqli_query($conn,$them))
    {
        echo "<script>alert('Thêm thành công')</script>";
        echo "<script>location='blog.php';</script>";
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
        Thêm mới Blog
    </h3>
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.php">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="blog.php">Blog</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Thêm Blog</a></li>
    </ul>

    <div class="col-lg-12">
        <div>
            <form method="post" action="<?php echo $_SERVER["REQUEST_URI"];?>" enctype="multipart/form-data">
                <table class="table table-bordered">
                    <tr>
                        <th>Tiêu đề</th>
                        <td><input required id="title" name="title" class="form-control" style="width: 500px"></td>

                    </tr>

                    <tr>
                        <th>Ảnh</th>
                        <td><input required  type="file" id="anh" name="anh" class="form-control" style="width: 500px"></td>

                    </tr>
                    <tr>
                        <th>Nội dung 1</th>
                        <td><textarea required class="form-control col-md-8" name="content1" id="noidung1" cols="50" rows="30" style="height: 100px; color: black"></textarea></td>

                    </tr>
                    <tr>
                        <th>Nội dung 2</th>
                        <td><textarea required class="form-control col-md-8" name="content2" id="noidung1" cols="50" rows="30" style="height: 100px; color: black"></textarea></td>
                    </tr>
                    <tr>
                        <th>Nội dung 3</th>
                        <td><textarea required class="form-control col-md-8" name="content3" id="noidung1" cols="50" rows="30" style="height: 100px; color: black"></textarea></td>
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
