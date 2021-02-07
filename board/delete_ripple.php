<?php
    $num = $_REQUEST['num'];

    include '../sql_function.php';
    $sql = "
        delete from board_free_ripple where num='$num'
    ";

    $page = $_GET['page'];

    $result = mysqli_query($conn, $sql);

    // header("Location: ../board/board_free.php?page=$page");
?>
<script>
    location.replace('../board/board_free.php?page=<?=$page?>');
</script>
