<div class="row">
    <ul class="pagination" style="margin-left: 350px">
        <?php for($num =1 ; $num<= $totalpage; $num++){ ?>


            <li  class="page-item"><a style="color: #d33b33" class="page-link" href="?per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a></li>
        <?php } ?>
    </ul>

</div>

