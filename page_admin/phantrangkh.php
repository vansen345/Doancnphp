<div class="pt">
    <ul class="pagination" style="margin-left: 350px">
        <?php
        $param="";
        if($search){
            $param = "search_kh=".$search."&";
        }
        if($current_page > 3){
            $firs_page=1;
            ?>
            <li  class="page-item"><a style="color: #d33b33" class="page-link" href="?<?=$param?>per_page=<?=$item_per_page?>&page=<?=$firs_page?>"><|</a></li>
            <?php
        }
        if($current_page > 1){
            $prev_page = $current_page - 1;
            ?>
            <li  class="page-item"><a style="color: #d33b33" class="page-link" href="?<?=$param?>per_page=<?=$item_per_page?>&page=<?=$prev_page?>"> << </a></li>
        <?php }
        ?>
        <?php for($num=1;$num<=$totalpage;$num++){ ?>
            <?php if($num != $current_page){ ?>
                <?php if($num > $current_page -3 && $num < $current_page +3){ ?>
                    <li  class="page-item"><a style="color: #d33b33" class="page-link" href="?<?=$param?>per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a></li>
                <?php } ?>
            <?php } else{ ?>
                <!--                <stong class="current-page page-item" >--><?//=$num?><!--</stong>-->
                <li class="page-item"><a style="color: black" class="page-link"><?=$num?></a></li>
            <?php } ?>
        <?php } ?>
        <?php
        if($current_page < $totalpage -1){
            $next_page = $current_page + 1;?>
            <li class="page-item"><a style="color: #d33b33" class="page-link" href="?<?=$param?>per_page=<?=$item_per_page?>&page=<?=$next_page?>"> >> </a></li>
        <?php }
        if($current_page < $totalpage -3){
            $end_page = $totalpage;
            ?>
            <li  class="page-item"><a style="color: #d33b33" class="page-link" href="?<?=$param?>per_page=<?=$item_per_page?>&page=<?=$end_page?>">|></a></li>
        <?php } ?>
    </ul>
</div>


