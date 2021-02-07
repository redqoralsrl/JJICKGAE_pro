<?php
    // 수정하는 곳

    // mysql 접속
    include '../sql_function.php';

    // 값 가져오기
    $id = mysqli_real_escape_string($conn, $_REQUEST['id']);
    $nickName = mysqli_real_escape_string($conn, $_REQUEST['nickName']); 
    $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
    $pw = mysqli_real_escape_string($conn, $_REQUEST['pw']);

    // mysql 에서 사용할 명령어
    $sql = "
        update userdata set pw='$pw', name='$name', nickname='$nickName' where id='$id'; 
    ";

    $result = mysqli_query($conn, $sql);

    header("location:../admin/admin.php");
    
?>