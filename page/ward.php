<?php
include ('connect.php');
$sql="SELECT * FROM pvs_xaphuongthitran WHERE maqh = '".$_POST["idxa"]."'";
$laytp=mysqli_query($conn,$sql);
$numtp=mysqli_num_rows($laytp);
if($numtp > 0) {?>
    <select class="country_option nice-select wide xa" name="ward" id="ward" >
        <?php
        while ($row = mysqli_fetch_array($laytp)){
        ?>
            <option value="<?php echo $row["xaid"]?>"><?php echo $row["name_xaphuong"]?></option>
        <?php }?>
    </select>
<?php }?>
