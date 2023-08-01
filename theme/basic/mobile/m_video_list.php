<?php
    include_once("./_common.php");
    include_once("../../../lib/thumbnail.lib.php");


    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }

    if(isset($_GET['cate_val'])){
        $cate_val = $_GET['cate_val'];
    }else{
        $cate_val = '점주 인터뷰';
    }

    $cate_sql = "WHERE ca_name = '".$cate_val."'";

    $total_sql = "SELECT * FROM g5_write_video $cate_sql";
    $total_query = sql_query($total_sql);
    $total_num = sql_num_rows($total_query);

    if(isset($_GET['limit'])){
        $list = $_GET['limit'];
    }else{
        $list = 4;
    }

    $block_ct = 4;

    $block_num = ceil($page / $block_ct);
    $block_start = (($block_num - 1) * $block_ct) + 1;
    $block_end = $block_start + $block_ct - 1;

    $total_page = ceil($total_num / $list);

    if($block_end > $total_page){
        $block_end = $total_page;
    }
    $total_block = ceil($num / $list);
    $start_num = ($page - 1) * $list;
?>
<?php
    $video_sql = "SELECT * FROM g5_write_video $cate_sql ORDER BY wr_datetime DESC LIMIT $start_num, $list";
    $video_query = sql_query($video_sql);
    while($video_row = sql_fetch_array($video_query)){
        $video_thumb = get_list_thumbnail('video', $video_row['wr_id'], 320, 180);
        $wr_subejct  = $video_row['wr_subject'];
        $link        = $video_row['wr_1'];
        $embed_code  = explode("v=", $link);
?>
    <li>
        <a href="https://www.youtube.com/embed/<?= $embed_code[1]; ?>" class="link_href">
            <img src="<?= $video_thumb['ori']; ?>" alt="<?= $wr_subejct; ?>" class="img-fluid">
            <p><?= $wr_subejct; ?></p>
        </a>
    </li>
<?php
    }
?>
<ul class="page">
    <?php
        if($page <= 1){
            echo "<li class='arr-start'></li>";
        }else{
            echo "<li class='arr-start'><a href='javascript:get_page($pre);'></a></li>";
        }
        if($page <= 1){
            echo "<li class='arr-prev'></li>";
        }else{
            $pre = $page - 1;
            echo "<li class='arr-prev'><a href='javascript:get_page($pre);'></a></li>";
        }

        for($i = $block_start; $i<=$block_end; $i++){
            if($page == $i){
                echo "<li class='num pg_current'></li>";
            }else{
                echo "<li class='num'><a href='javascript:get_page($i);'></a></li>";
            }
        }

        if($page >= $total_block){
            echo "<li class='arr-next'></li>";
        }else{
            $next = $page + 1;
            echo "<li class='arr-next'><a href='javascript:get_page($next);'></a></li>";
        }
        if($page >= $total_page){
            echo "<li class='arr-end'></li>";
        }else{
            echo "<li class='arr-end'><a href='javascript:get_page($total_page);'></a></li>";
        }
    ?>
</ul>
<script type="text/javascript">
    $(".link_href").click(function(event){
        event.preventDefault();
        var link = $(this).attr('href');
        $(".video-wrap > div > iframe").attr('src', link);
    });
</script>