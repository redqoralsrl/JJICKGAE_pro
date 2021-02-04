<?php
    // register => 회원가입 등록하는 곳

    // 값 가져오기
    $id = $_REQUEST['id'];

    // mysql 접속
    $conn = mysqli_connect('localhost','root','brian1313','jjick');
    // mysql 에서 사용할 명령어
    $sql = "
        DELETE FROM userdata WHERE id='$id'
    ";

    $result = mysqli_query($conn, $sql);

    print "데이터가 삭제되었습니다. ";
    header("location:../admin/admin.php");
    
?>