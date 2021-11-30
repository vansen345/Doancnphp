<?php
include ('../layout/header_admin.php');
if(!isset($_SESSION["admin"]))
    echo "<script>location='login/dangnhapadmin.php'</script>";
?>
<?php
$search = isset($_GET['search_city']) ? $_GET['search_city'] : "";
if($search){
    $where="WHERE name_city LIKE '%".$search."%' ";
}
include ('../page/connect.php');
$item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 5;
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * $item_per_page;
if($search){
    $dbdata = "SELECT * FROM pvs_tinhthanhpho WHERE name_city LIKE '%".$search."%'  ORDER BY matp ASC  LIMIT " . $item_per_page . " OFFSET " . $offset;
    $query = mysqli_query($conn, $dbdata);
    $total = mysqli_query($conn, "SELECT * FROM pvs_tinhthanhpho WHERE name_city LIKE '%".$search."%' ");
}else{
    $dbdata = "SELECT * FROM pvs_tinhthanhpho ORDER BY matp ASC  LIMIT " . $item_per_page . " OFFSET " . $offset;
    $query = mysqli_query($conn, $dbdata);
    $total = mysqli_query($conn, "SELECT * FROM pvs_tinhthanhpho");
}
$total = $total->num_rows;
$totalpage = ceil($total / $item_per_page);
?>
<?php
$role= "SELECT * FROM nhanvien WHERE TenDangNhap = '".$_SESSION["admin"]."'";
$queryrole=mysqli_query($conn,$role);
$layquyen= mysqli_fetch_array($queryrole);
?>
<!-- END SIDEBAR -->
<!-- BEGIN PAGE -->
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
    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->
        <div class="row-fluid">
            <div class="span12">
                <!-- BEGIN STYLE CUSTOMIZER -->
                <div class="color-panel hidden-phone">
                    <div class="color-mode-icons icon-color"></div>
                    <div class="color-mode-icons icon-color-close"></div>
                    <div class="color-mode">
                        <p>THEME COLOR</p>
                        <ul class="inline">
                            <li class="color-black current color-default" data-style="default"></li>
                            <li class="color-blue" data-style="blue"></li>
                            <li class="color-brown" data-style="brown"></li>
                            <li class="color-purple" data-style="purple"></li>
                            <li class="color-grey" data-style="grey"></li>
                            <li class="color-white color-light" data-style="light"></li>
                        </ul>
                        <label>
                            <span>Layout</span>
                            <select class="layout-option m-wrap small">
                                <option value="fluid" selected>Fluid</option>
                                <option value="boxed">Boxed</option>
                            </select>
                        </label>
                        <label>
                            <span>Header</span>
                            <select class="header-option m-wrap small">
                                <option value="fixed" selected>Fixed</option>
                                <option value="default">Default</option>
                            </select>
                        </label>
                        <label>
                            <span>Sidebar</span>
                            <select class="sidebar-option m-wrap small">
                                <option value="fixed">Fixed</option>
                                <option value="default" selected>Default</option>
                            </select>
                        </label>
                        <label>
                            <span>Footer</span>
                            <select class="footer-option m-wrap small">
                                <option value="fixed">Fixed</option>
                                <option value="default" selected>Default</option>
                            </select>
                        </label>
                    </div>
                </div>
                <!-- END BEGIN STYLE CUSTOMIZER -->
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
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
                        <a href="#">Phí vận chuyển</a>
                        <i class="icon-angle-right"></i>
                    </li>

                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
            <div class="span12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-edit"></i>Editable Table</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"></a>
                            <a href="#portlet-config" data-toggle="modal" class="config"></a>
                            <a href="javascript:;" class="reload"></a>
                            <a href="javascript:;" class="remove"></a>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="btn-group">
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="form-outline">
                                <form action="" method="get">
                                    <input type="text" value="<?=isset($_GET['search_city']) ? $_GET['search_city'] : ""?>" id="form1" name="search_city" class="form-control" />
                                    <button style="margin-bottom: 10px" type="submit" class="btn btn-primary">
                                        <i class="icon-search"></i>
                                    </button>
                                </form>

                            </div>

                        </div>

                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                            <thead>
                            <tr>

                                <th>Id</th>
                                <th>Tên thành phố</th>
                                <th>Type</th>
                                <th>Phí vận chuyển</th>
                                <?php
                                if($layquyen["id_role"]==1){
                                ?>
                                <th>Cập nhật/sửa</th>
                               <?php } ?>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            while ($cot=mysqli_fetch_array($query)){
                            ?>
                                <tr >
                                    <td><?php echo $cot["matp"]?></td>
                                    <td><?php echo $cot["name_city"]?></td>
                                    <td class="center"><?php echo $cot["type"]?></td>
                                    <td><?php echo $cot["phiship"]?></td>
                                    <?php
                                    if($layquyen["id_role"]==1){
                                    ?>
                                    <td>

                                        <a ><i style="margin-left: 30px" class="icon-edit"></i></a>

                                    </td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                            </tbody>

                        </table>


                    </div>

                </div>
             <?php
                        include ('phantrangadmin.php')
             ?>

                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT -->
    </div>
    <!-- END PAGE CONTAINER-->
</div>
<!-- END PAGE -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php
include ('../layout/footer-admin.php')
?>

<style>
    .pt
    {
        width:100%;
        justify-content:center;
        display:flex;
    }
    .pt li {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color .3s;
    }

    .pt li.active {


    }
    .pt ul{
        list-style-type: none !important;
        margin-right: 453px;
    }

    .pt li:hover:not(.active) {
        background-color: #ddd;
    }
</style>

