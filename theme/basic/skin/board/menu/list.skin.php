<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>
<style>
    #bo_cate_ul > li:first-child{
        display:none;
    }
/* .menu_opac{
    height: 27px;
    margin-bottom: 10px;
}
.menu_sel{
    font-size: 18px;
    font-weight: 700;
    color: #f7891d;
    text-align:center;
    margin-bottom: 10px;
}
.menu_sel > img{
    position: relative;
    bottom: 2px;
    vertical-align: middle;
}
@media screen and (max-width: 1200px) {
        .gall_row .col-gn-4 {
            width: 50%;
        }
    }
@media screen and (max-width: 625px) {
    #bo_gall .gall_box{
        padding: 15px;
        margin-bottom: 20px;
    }
    
    .img-res{
        width: 75%;
    }
    .menu_txt1{
        font-size: 16px;
        letter-spacing: -1px;
    }
    .menu_txt2{
        font-size: 16px;
        letter-spacing: -2px;
    }
}
@media screen and (max-width: 600px){
    .menu_txt1{
        font-size: 14px;
        letter-spacing: -1.5px;
    }
    .menu_txt2{
        font-size: 14px;
        letter-spacing: -2px;
    }
    .menu_content{
        font-size: 13px;
        letter-spacing: -0.5px;
    }
} */

</style>

<div class="top-tit">
    <h2>MENU</h2>
    <p>식사부터 안주까지 다양한 메뉴에 깊은 맛과 정성을 담았습니다.</p>
</div>
<!-- 게시판 목록 시작 { --> 
<div id="bo_gall" class="inner">

    <!-- <ul class="d-flex justify-content-end flow" >
        <li><a href="/"><img src="/images/board_1.png" alt="홈"></a></li>
        <li>Menu</li>
        <li class="navi_txt">ALL</li>
    </ul> -->

    <h3 class="bd-tit">
            Menu
        </h3>

    <?php if ($is_category) { ?>
    <nav id="bo_cate">
        <h2><?php echo $board['bo_subject'] ?> 카테고리</h2>
        <ul id="bo_cate_ul">
            <?php echo str_replace('전체', 'ALL',$category_option); ?>
        </ul>
    </nav>
    <?php } ?>


   

    <form name="fboardlist"  id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">

    <!-- <?php if ($is_checkbox) { ?>
    <div id="gall_allchk">
        <label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
        <input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
    </div>
    <?php } ?> -->
    <ul id="gall_ul" class="gall_row">
        <?php for ($i=0; $i<count($list); $i++) {

            $classes = array();
            
            $classes[] = 'gall_li';
            $classes[] = 'col-gn-'.$bo_gallery_cols;

            // if( $i && ($i % $bo_gallery_cols == 0) ){
            //     $classes[] = 'box_clear';
            // }

            if( $wr_id && $wr_id == $list[$i]['wr_id'] ){
                $classes[] = 'gall_now';
            }
         ?>
         

        <li class="<?php echo implode(' ', $classes); ?>">
            <div class="gall_box">
                <div class="gall_chk">
                <?php if ($is_checkbox) { ?>
                <label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
                <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
                <?php } ?>
                <span class="sound_only">
                    <?php
                    if ($wr_id == $list[$i]['wr_id'])
                        echo "<span class=\"bo_current\">열람중</span>";
                    else
                        echo $list[$i]['num'];
                     ?>
                </span>
                </div>
                <div class="gall_con">
                   
                    <div class="gall_img">
                        <?php if($is_admin){?>
                        <a href="<?php echo $list[$i]['href'] ?>">
                        <? } ?>
                        <?php
                        if ($list[$i]['is_notice']) { // 공지사항  ?>
                            <span class="is_notice">공지</span>
                        <?php } else {
                            $thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height'], false, true);

                            if($thumb['src']) {
                                $img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" class="img-res">';
                            } else {
                                $img_content = '<span class="no_image">no image</span>';
                            }

                            echo $img_content;
                        }
                         ?>
                        </a>
                    </div>
                    <div class="d-flex align-items-center justify-content-center menu_txt1">
                        <?php
                            if($list[$i]['wr_2'] == '1'){
                                echo '<span class="mr-2 new"><img src="/images/menu/ico_new.png" alt="new" class="img-fluid"></span>';
                            }else if($list[$i]['wr_2'] == '2'){
                                echo '<span class="mr-2 best"><img src="/images/menu/ico_best.png" alt="best" class="img-fluid"></span>';
                            }else{
                                echo '';
                            }
                        ?>
                        
                        
                        <p><?php echo $list[$i]['wr_subject'];?></p>
                        <?php
                            if($list[$i]['wr_3'] != ''){
                                $spicy_img = "/images/menu/ico_spicy".$list[$i]['wr_3'].".png";
                        ?>
                        <!-- <span class="ml-2 spicy"><img src="/images/menu/ico_spicy1.png" alt="spicy1" class="img-fluid"></span> -->
                        <span class="ml-2 spicy"><img src="<?= $spicy_img; ?>" alt="spicy1" class="img-fluid"></span> 
                        <?php
                            }
                        ?>
                    </div>
                    
                    <?php
                        if($list[$i]['wr_content'] != ''){
                    ?>
                    <p class="menu_content"><?php echo htmlspecialchars_decode($list[$i]['wr_content']);?></p>
                    <?
                        }
                    ?>
                    <p class="menu_txt2"><?php echo $list[$i]['wr_1'];?></p>
                </div>
            </div>
        </li>
        <?php } ?>

        <!-- <?php if (count($list) == 0) { echo "<li class=\"empty_list\">게시물이 없습니다.</li>"; } ?> -->
    </ul>





  

     <?php if ($list_href || $is_checkbox || $write_href) { ?>
    <div class="bo_fx">
        <?php if ($list_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($is_checkbox) { ?>
            <li><input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value" class="btn btn_b01"></li>
            <li><input type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value" class="btn btn_b01"></li>
            <li><input type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value" class="btn btn_b01"></li>
            <?php } ?>
            <!-- <?php if ($list_href) { ?><li><a href="http://saladeat.kr/bbs/board.php?bo_table=menu" class="btn_b01 btn">목록</a></li><?php } ?> -->
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02 btn">글쓰기</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
    <?php } ?>
    </form>
     
       <!-- 게시판 검색 시작 { -->
    <!-- <fieldset id="bo_sch">
        <legend>게시물 검색</legend>

        <form name="fsearch" method="get">
        <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
        <input type="hidden" name="sca" value="<?php echo $sca ?>">
        <input type="hidden" name="sop" value="and">
        <label for="sfl" class="sound_only">검색대상</label>
        <select name="sfl" id="sfl">
            <option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
            <option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
            <option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
            <option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>회원아이디</option>
            <option value="mb_id,0"<?php echo get_selected($sfl, 'mb_id,0'); ?>>회원아이디(코)</option>
            <option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option>
            <option value="wr_name,0"<?php echo get_selected($sfl, 'wr_name,0'); ?>>글쓴이(코)</option>
        </select>
        <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
        <input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="sch_input" size="25" maxlength="20" placeholder="검색어를 입력해주세요">
        <input type="submit" value="검색" class="sch_btn">
        </form>
    </fieldset> -->
    <!-- } 게시판 검색 끝 -->   
</div>

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>



<!-- 페이지 -->
<?php echo $write_pages;  ?>
<?php if ($is_checkbox) { ?>
<script>
function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function fboardlist_submit(f) {
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택복사") {
        select_copy("copy");
        return;
    }

    if(document.pressed == "선택이동") {
        select_copy("move");
        return;
    }

    if(document.pressed == "선택삭제") {
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
            return false;

        f.removeAttribute("target");
        f.action = "./board_list_update.php";
    }

    return true;
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == 'copy')
        str = "복사";
    else
        str = "이동";

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<?php } ?>
<!-- } 게시판 목록 끝 -->
