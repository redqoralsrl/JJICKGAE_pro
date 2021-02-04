<?php
    $num = $_REQUEST['num'];

    $conn = mysqli_connect('localhost','root','brian1313','jjick');
    $sql = "
        delete from board_free_ripple where num='$num'
    ";

    $page = $_GET['page'];

    $result = mysqli_query($conn, $sql);

    header("Location: ../board/board_free.php?page=$page");
?>
