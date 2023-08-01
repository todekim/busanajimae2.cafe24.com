<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>

<div class="wrap">
<header>
    <div class="inner d-flex justify-content-between align-items-center">
        <h1 class="logo"><a href="/"><img src="/images/logo.png" alt="logo" class="img-fluid"></a></h1>
        <button class="btn-menu"></button>
        <nav>
            <div class="inner">
                <a href="/#sec1">브랜드 경쟁력</a>
                <a href="/#sec2">매출 전략</a>
                <a href="/#sec3">성공 키워드</a>
                <a href="/#sec4">리얼 후기</a>
                <a href="/#sec5">창업 비용</a>
                <a href="/#sec6">창업 컨설팅</a>
                <a href="/#sec-inquiry">가맹 문의</a>
                <a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=menu&sca=3대명물">메뉴</a>
                <a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=store">매장찾기 </a>
            </div>
            
        </nav>
    </div>
    
</header>


<? if(!defined("_INDEX_")){ ?>
    <div id="sub">

 <? } ?>