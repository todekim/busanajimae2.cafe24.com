<?php
    include_once('./_common.php');

    $name    = $_POST['name'];
    $tel     = $_POST['tel'];
    $area    = $_POST['area'];
    $regdate = date("Y-m-d H:i:s");

    $sql = "INSERT INTO inquiry_list (name, tel, area, regdate)";
    $sql .= " VALUES ('".$name."', '".$tel."', '".$area."', '".$regdate."')";
    $result = sql_query($sql);

    if($result){
        alert("문의 신청이 완료되었습니다.");
    }else{
        alert("문의 신청 오류 : 관리자에게 문의해주세요.");
    }
?>