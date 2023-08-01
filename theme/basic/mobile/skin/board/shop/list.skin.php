<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;

if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>
<style>
    .view-768{
        display:none;
    }
    .hide-768{
        display:block;
    }
    @media(max-width: 768px){
        .view-768{
        display:block;
    }
    .hide-768{
        display:none;
    }
    }

</style>
<div class="top-tit">
    <h2>STORE</h2>
    <p>더 가까운곳에서 부산아지매국밥을 만나실 수 있도록 항상 최선을 다하겠습니다.</p>
</div>
<!-- 게시판 목록 시작 { -->
<div id="bo_list" class="inner">
    <!-- 게시판 페이지 정보 및 버튼 시작 { -->
    <div id="bo_btn_top">
        <!-- <div id="bo_list_total">
            <span>Total <?php echo number_format($total_count) ?>건</span>
            <?php echo $page ?> 페이지
        </div> -->

        <!-- <?php if ($rss_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01 btn"><i class="fa fa-rss" aria-hidden="true"></i> RSS</a></li><?php } ?>
            <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin btn"><i class="fa fa-user-circle" aria-hidden="true"></i> 관리자</a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02 btn"><i class="fa fa-pencil" aria-hidden="true"></i> 글쓰기</a></li><?php } ?>
        </ul>
        <?php } ?> -->
    </div>
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->

    <!-- 게시판 카테고리 시작 { -->
    <?php if ($is_category) { ?>
    <nav id="bo_cate">
        <h2><?php echo $board['bo_subject'] ?> 카테고리</h2>
        <ul id="bo_cate_ul">
            <?php echo $category_option ?>
        </ul>
    </nav>
    <?php } ?>
    <!-- } 게시판 카테고리 끝 --> 
    
    <fieldset id="bo_sch">
        <legend>게시물 검색</legend>
        <div class="d-flex flex-wrap justify-content-between align-items-center search-wrap">
            <form name="fsearch" method="get" class="form-select">
                <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
                <input type="hidden" name="sca" value="<?php echo $sca ?>">
                <input type="hidden" name="sop" value="and">
                <input type="hidden" name="sfl" value="wr_5">
                <!-- <input type="hidden" name="sfl" value="wr_3"> -->
                <label for="sfl" class="sound_only">검색대상</label>
                <div class="d-flex justify-content-start align-items-center search-wrap">
                    <div class="box">
                        <div class="d-flex flex-wrap justify-content-start align-items-center area-wrap">
                            <p class="area">· 지역으로 검색</p>
                            <select name="sfla" id="sido">
                                <option value="시/도">시/도</option>
                            </select>
                            <select name="sfl2a" id="sigugun">
                                <option value="시/군/구">시/군/구</option>
                            </select>
                            <input type="hidden" value="" class="stx_class" name="stx">
                            <button type="submit" value="검색" class="searh_btn" ><img src="/images/store/search.png" alt="검색"><span>검색</span></button>
                        </div>
                    </div>
                    </div>
            </form>
            
            <form name="fsearch" method="get"  class="form-select">
                <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
                <input type="hidden" name="sca" value="<?php echo $sca ?>">
                <input type="hidden" name="sop" value="and">
                <div class="box">  
                    <div class="d-flex flex-wrap justify-content-start align-items-center store-wrap">
                        <p class="store">· 매장명으로 검색</p>
                    <!-- <select name="sfl" id="sfl"> 
                        <option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
                        <option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
                        <option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
                        <option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>회원아이디</option>
                        <option value="mb_id,0"<?php echo get_selected($sfl, 'mb_id,0'); ?>>회원아이디(코)</option>
                        <option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option>
                        <option value="wr_name,0"<?php echo get_selected($sfl, 'wr_name,0'); ?>>글쓴이(코)</option>
                    </select> -->
                        <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
                        <input type="text" id="s_text" name="stx" value="<?php echo stripslashes($stx) ?>" id="stx" class="sch_input" size="25" maxlength="20" placeholder="매장명 + 주소">
                        <button type="submit" value="검색" class="searh_btn" ><img src="/images/store/search.png" alt="검색"><span>검색</span></button>
                    </div>
                </div>
        
            
            
            </form>
        </div>
    </fieldset>
    <form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">
    <!-- 게시판 검색 시작 { -->

    <ul class="d-flex justify-content-end icon-list align-items-center">
        <li>
            <div><img src=" /images/store/chair.png" alt="좌석있음" class="img-fluid"></div>
            <p>좌석</p>
        </li>
        <li>
            <div><img src="/images/store/takeout.png" alt="포장" class="img-fluid"></div>
            <p>포장</p>
        </li>
        <li>
            <div><img src="/images/store/parking.png" alt="주차" class="img-fluid"></div>
            <p>주차</p>
        </li>
        <li>
            <div><img src="/images/store/wifi.png" alt="와이파이" class="img-fluid"></div>
            <p>와이파이</p>
        </li>
        <li>
            <div><img src=" /images/store/delivery.png" alt="배달" class="img-fluid"></div>
            <p>배달</p>
        </li>
        
        <li>
            <div><img src="/images/store/map.png" alt="약도" class="img-fluid"></div>
            <p>약도</p>
        </li>
    </ul>
    <!-- } 게시판 검색 끝 -->   
    <div class="tbl_head01 tbl_wrap">
        <table id="fd_accordion">
        <caption><?php echo $board['bo_subject'] ?> 목록</caption>
        <thead>
        <tr>
            <?php if ($is_checkbox) { ?>
            <th scope="col">
                <label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
                <input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
            </th>
            <?php } ?>
            <th scope="col">매장명</th>
            <th scope="col">연락처</th>
            <th scope="col">주소</th>
            <th scope="col">매장서비스</th>
            <!-- <th scope="col"><?php echo subject_sort_link('wr_hit', $qstr2, 1) ?>조회 <i class="fa fa-sort" aria-hidden="true"></i></a></th>
            <?php if ($is_good) { ?><th scope="col"><?php echo subject_sort_link('wr_good', $qstr2, 1) ?>추천 <i class="fa fa-sort" aria-hidden="true"></i></a></th><?php } ?>
            <?php if ($is_nogood) { ?><th scope="col"><?php echo subject_sort_link('wr_nogood', $qstr2, 1) ?>비추천 <i class="fa fa-sort" aria-hidden="true"></i></a></th><?php } ?>
            <th scope="col"><?php echo subject_sort_link('wr_datetime', $qstr2, 1) ?>날짜  <i class="fa fa-sort" aria-hidden="true"></i></a></th> -->
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i=0; $i<count($list); $i++) {
         ?>
        <tr class="<?php if ($list[$i]['is_notice']) echo "bo_notice"; ?> over">
            <?php if ($is_checkbox) { ?>
            <td class="td_chk">
                <label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
                <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
            </td>
            <?php } ?>
            <td class="td_board">
                <?php if($is_admin){?>
                    <a href="<?php echo $list[$i]['href'] ?>">
                    <? } ?>         
                <!-- <a href="<?php echo $list[$i]['href'];?>"> -->
                <?php echo $list[$i]['wr_subject']; ?>
            </a>
            <!-- <?php
            if ($list[$i]['is_notice']) // 공지사항
                echo '<strong class="notice_icon"><i class="fa fa-bullhorn" aria-hidden="true"></i><span class="sound_only">공지</span></strong>';
            else if ($wr_id == $list[$i]['wr_id'])
                echo "<span class=\"bo_current\">열람중</span>";
            else
                echo $list[$i]['num'];
             ?> -->
            </td>
            <td class="td_phone"> 
                <?php echo $list[$i]['wr_2']; ?>
            </td>
            <td class="td_address"> 
                <?php echo $list[$i]['wr_3']; ?>
            </td>
            <td class="td_service"> 
                <ul>
                <?php
                    if($list[$i]['wr_6'] == 1){
                        echo '<li><img src="/images/store/chair.png"></li>';
                    }
                    
                    if($list[$i]['wr_8'] == 3){
                        echo '<li><img src="/images/store/takeout.png"></li>';
                    }
                    if($list[$i]['wr_10'] == 5){
                        echo '<li><img src="/images/store/parking.png"></li>';
                    }
                    if($list[$i]['wr_7'] == 2){
                        echo '<li><img src="/images/store/wifi.png"></li>';
                    }
                    if($list[$i]['wr_9'] == 4){
                        echo '<li><img src="/images/store/delivery.png"></li>';
                    }
                ?>
                <li><button type="button" class="map-btn"></button></li>
                </ul>
                <!-- <?php 
                    if(in_array(1,explode(',',$list[$i]['wr_1']))){
                        echo '<img src="/images/chair.png">';
                    }else if(in_array(2,explode(',',$list[$i]['wr_1']))){
                        echo '<img src="/images/wifi.png">';
                    }else if(in_array(3,explode(',',$list[$i]['wr_1']))){
                        echo '<img src="/images/takeout.png">';
                    }else if(in_array(4,explode(',',$list[$i]['wr_1']))){
                        echo '<img src= /images/delivery.png">';

                    }
                ?> -->
            </td>
            <!-- <td class="td_subject" style="padding-left:<?php echo $list[$i]['reply'] ? (strlen($list[$i]['wr_reply'])*10) : '0'; ?>px">
                <?php
                if ($is_category && $list[$i]['ca_name']) {
                 ?>
                <a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link"><?php echo $list[$i]['ca_name'] ?></a>
                <?php } ?>
                <div class="bo_tit">
                    
                    <a href="<?php echo $list[$i]['href'] ?>">
                        <?php echo $list[$i]['icon_reply'] ?>
                        <?php
                            if (isset($list[$i]['icon_secret'])) echo rtrim($list[$i]['icon_secret']);
                         ?>
                        <?php echo $list[$i]['subject'] ?>
                       
                    </a>
                    <?php
                    // if ($list[$i]['file']['count']) { echo '<'.$list[$i]['file']['count'].'>'; }
                    if (isset($list[$i]['icon_file'])) echo rtrim($list[$i]['icon_file']);
                    if (isset($list[$i]['icon_link'])) echo rtrim($list[$i]['icon_link']);
                    if (isset($list[$i]['icon_new'])) echo rtrim($list[$i]['icon_new']);
                    if (isset($list[$i]['icon_hot'])) echo rtrim($list[$i]['icon_hot']);
                    ?>
                    <?php if ($list[$i]['comment_cnt']) { ?><span class="sound_only">댓글</span><span class="cnt_cmt">+ <?php echo $list[$i]['wr_comment']; ?></span><span class="sound_only">개</span><?php } ?>
                </div>

            </td> -->
            <!-- <td class="td_name sv_use"><?php echo $list[$i]['name'] ?></td>
            <td class="td_num"><?php echo $list[$i]['wr_hit'] ?></td>
            <?php if ($is_good) { ?><td class="td_num"><?php echo $list[$i]['wr_good'] ?></td><?php } ?>
            <?php if ($is_nogood) { ?><td class="td_num"><?php echo $list[$i]['wr_nogood'] ?></td><?php } ?>
            <td class="td_datetime"><?php echo $list[$i]['datetime2'] ?></td> -->

        </tr>
        <tr class="loading">
            <td colspan="4" class="cont panel">
                <div class="map-wrap">
                    <div id="map<?php echo $list[$i]['wr_id'] ?>" class="map" style="width:100%"></div>
                </div>
                
            </td>
        </tr>
        <?php } ?>
        <?php if (count($list) == 0) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>
        </tbody>
        </table>
    </div>

    <?php if ($list_href || $is_checkbox || $write_href) { ?>
    <div class="bo_fx">
        <?php if ($list_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($is_checkbox) { ?>
            <li><button type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value" class="btn btn_admin"><i class="fa fa-trash-o" aria-hidden="true"></i> 선택삭제</button></li>
            <li><button type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value" class="btn btn_admin"><i class="fa fa-files-o" aria-hidden="true"></i> 선택복사</button></li>
            <li><button type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value" class="btn btn_admin"><i class="fa fa-arrows" aria-hidden="true"></i> 선택이동</button></li>
            <?php } ?>
            <!-- <?php if ($list_href) { ?><li><a href="<?php echo $list_href ?>" class="btn_b01 btn"><i class="fa fa-list" aria-hidden="true"></i> 목록</a></li><?php } ?> -->
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02 btn"><i class="fa fa-pencil" aria-hidden="true"></i> 글쓰기</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
    <?php } ?>

    </form>
     
   
</div>

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>



<!-- 페이지 -->
<?php echo $write_pages;  ?>
<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=f3f6438655085ecb7429f5988a87ade7&libraries=services"></script>
<script type="text/javascript">

    $('#fd_accordion .map-btn').click(function(){
        var findId = $(this).closest('.over').next('.loading').find('.map').attr('id');
        var findAdd = $(this).closest('.td_service').prev('.td_address').text();
        var btnB = $(this).hasClass('on');
        if(btnB == 0){
            $('#fd_accordion .map-btn').removeClass('on');
            $('#fd_accordion .map-wrap').removeClass('on');
            $(this).addClass('on')
            $('#fd_accordion .map-wrap').slideUp();
            $(this).closest('.over').next('.loading').find('.map-wrap').addClass('on');
            $(this).closest('.over').next('.loading').find('.map-wrap').slideDown();


            var mapContainer = document.getElementById(findId), // 지도를 표시할 div 
                mapOption = {
                    center: new kakao.maps.LatLng(33.450701, 126.570667), // 지도의 중심좌표
                    level: 3 // 지도의 확대 레벨
                };  

                // 지도를 생성합니다    
                var map = new kakao.maps.Map(mapContainer, mapOption); 

                // 주소-좌표 변환 객체를 생성합니다
                var geocoder = new kakao.maps.services.Geocoder();

                // 주소로 좌표를 검색합니다
                geocoder.addressSearch(findAdd, function(result, status) {

                    // 정상적으로 검색이 완료됐으면 
                    if (status === kakao.maps.services.Status.OK) {

                        var coords = new kakao.maps.LatLng(result[0].y, result[0].x);

                        // 결과값으로 받은 위치를 마커로 표시합니다
                        var marker = new kakao.maps.Marker({
                            map: map,
                            position: coords
                        });

                        // 인포윈도우로 장소에 대한 설명을 표시합니다
                        // var infowindow = new kakao.maps.InfoWindow({
                        //     // content: '<div style="width:150px;text-align:center;padding:6px 0;">우리회사</div>'
                        // });
                        // infowindow.open(map, marker);

                        // 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
                        map.setCenter(coords);
                    } 
                });    


            
            window.setTimeout(function() {
                map.relayout();;
            }, 0);
        }else{
            $('#fd_accordion .map-btn').removeClass('on');
            $('#fd_accordion .map-wrap').removeClass('on');
            $('#fd_accordion .map-wrap').slideUp();
        }
        
        
        


        
        
    })
</script>


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

    if (sw == "copy")
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
<script>
    $("select[name=sfl2a]").change(function(){
        $('.stx_class').val($(this).val());
    });
</script>
<script type="text/javascript" src="/js/sido.js"></script>

<?php } ?>
<!-- } 게시판 목록 끝 -->
