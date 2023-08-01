<?php
    include_once('./_common.php');

    $name         = $_POST['name'];
    $tel          = $_POST['tel1']."-".$_POST['tel2']."-".$_POST['tel3'];
    $email        = $_POST['email'];
    $store_ck     = $_POST['store_ck'];
    $invers_price = $_POST['invers_price'];
    $area         = $_POST['area'];
    $visit_ck     = $_POST['visit_ck'];
    $content      = $_POST['content'];
    $regdate      = date("Y-m-d H:i:s");

    $sql = "INSERT INTO couns_list (name, tel, email, store_ck, invers_price, area, visit_ck, content, regdate)";
    $sql .= " VALUES ('".$name."', '".$tel."', '".$email."', '".$store_ck."', '".$invers_price."', '".$area."', '".$visit_ck."', '".$content."', '".$regdate."')";
    
    $result = sql_query($sql);

    if($result){
        alert("상담 신청이 완료 되었습니다.");
    }else{
        alert("상담 신청 오류 : 관리자에게 문의해주세요.");
    }

?> 