<div class="page-pagination text-center" data-aos="fade-up"  data-aos-delay="0">
    <ul>
        <?php
        $param="";
        if($tk){
            $param = "timkiemtensp=".$tk."&";
        }
        if($current_page > 3){
            $firs_page=1;
            ?>
            <li  class=""><a style="color: #d33b33" class="" href="?<?=$param?>per_page=<?=$item_per_page?>&page=<?=$firs_page?>">First</a></li>
            <?php
        }
        if($current_page > 1){
            $prev_page = $current_page - 1;
            ?>
            <li  class=""><a style="color: #ff365d" class="" href="?<?=$param?>per_page=<?=$item_per_page?>&page=<?=$prev_page?>">Prev</a></li>
        <?php }
        ?>
        <?php for($num=1;$num<=$totalpage;$num++){ ?>
            <?php if($num != $current_page){ ?>
                <?php if($num > $current_page -3 && $num < $current_page +3){ ?>
                    <li  class=""><a style="color: #ff365d" class="" href="?<?=$param?>per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a></li>
                <?php } ?>
            <?php } else{ ?>
<!--                    <li class="active"><stong style="color: #ff365d">--><?//=$num?><!--</stong></li>-->
                <li class="page-item" style="color: black"><a style="color: #ff365d;background-color: black" class="page-link"><?=$num?></a></li>
            <?php } ?>
        <?php } ?>
        <?php
        if($current_page < $totalpage -1){
            $next_page = $current_page + 1;?>
            <li class=""><a style="color: #ff365d" class="" href="?<?=$param?>per_page=<?=$item_per_page?>&page=<?=$next_page?>">Next</a></li>
        <?php }
        if($current_page < $totalpage -3){
            $end_page = $totalpage;
            ?>
            <li  class=""><a style="color: #ff365d" class="" href="?<?=$param?>per_page=<?=$item_per_page?>&page=<?=$end_page?>">Last</a></li>
        <?php } ?>
    </ul>
</div> <!-- End Pagination -->


<!--<li><a class="active" href="?per_page=--><?//=$item_per_page?><!--&page=--><?//=$num?><!--">--><?//=$num?><!--</a></li>-->