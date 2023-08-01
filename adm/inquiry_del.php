<?php
    include_once('./_common.php');

    $del_idx = $_GET['idx'];
    
    $inquiry_del = "DELETE FROM inquiry_list WHERE idx = ".$del_idx;
    $inquiry_result = sql_query($inquiry_del);

    if($inquiry_result){
        alert("문의 신청 리스트가 삭제 되었습니다.");
    }else{
        alert("문의 신청 삭제 오류 : 관리자에게 문의해주세요.");
    }
?>