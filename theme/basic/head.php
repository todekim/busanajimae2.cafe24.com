<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>
<?php
if(defined('_INDEX_')) { // index에서만 실행
    include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
}
?>

<div class="wrap">
<header>
    <div class="inner d-flex justify-content-between align-items-center">
        <nav>
            <a href="/#sec1">브랜드 경쟁력</a>
            <a href="/#sec2">매출 전략</a>
            <a href="/#sec3">성공 키워드</a>
            <a href="/#sec4">리얼 후기</a>
            <a href="/#sec5">창업 비용</a>
            <a href="/#sec6">창업 컨설팅</a>
            <a href="/#sec-inquiry">가맹 문의</a>
            <a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=menu&sca=3대명물">메뉴</a>
            <a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=store">매장찾기 </a>
        </nav>
        <div class="d-flex sns">
            <a href="" target="_blank"><img src="/images/sns_facebook.png" alt="facebook" class="img-fluid"></a>
            <a href="" target="_blank"><img src="/images/sns_insta.png" alt="instagram" class="img-fluid"></a>
            <a href="" target="_blank"><img src="/images/sns_blog.png" alt="blog" class="img-fluid"></a>
        </div>
    </div>
    
</header>


<? if(!defined("_INDEX_")){ ?>
    <div id="sub">

 <? } ?>