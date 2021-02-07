<?php
    // 추가하는 곳

    // mysql 접속
    include '../sql_function.php';

    // 값 가져오기
    $id = mysqli_real_escape_string($conn, $_REQUEST['id']);
    $nickName = mysqli_real_escape_string($conn, $_REQUEST['nickname']); 
    $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
    $pw = mysqli_real_escape_string($conn, $_REQUEST['pw']);
    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);

    // mysql 에서 사용할 명령어
    $sql = "
        INSERT INTO userdata(id, name, pw, nickname, email)
        VALUE('$id','$name','$pw','$nickName', '$email')
    ";

    $result = mysqli_query($conn, $sql);

    header("location:../index.php");
    // date("Y-m-d H:i:s");
?>