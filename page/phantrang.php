<div class="page-pagination text-center" data-aos="fade-up"  data-aos-delay="0">
    <ul>

        <?php for($num =1 ; $num<= $totalpage; $num++){ ?>
        <li><a class="active" href="?per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a></li>
        <?php } ?>

    </ul>
</div> <!-- End Pagination -->