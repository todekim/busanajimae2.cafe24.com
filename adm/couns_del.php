<?php
    include_once('./_common.php');

    $del_idx = $_GET['idx'];
    
    $couns_del = "DELETE FROM couns_list WHERE idx = ".$del_idx;
    $couns_result = sql_query($couns_del);

    if($couns_result){
        alert("상담 신청 리스트가 삭제 되었습니다.");
    }else{
        alert("상담 신청 삭제 오류 : 관리자에게 문의해주세요.");
    }
?>