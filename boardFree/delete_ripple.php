<?php
    $num = $_REQUEST['num'];
    $ripple_num = $_REQUEST['ripple_num'];

    include '../sql_function.php';
    $sql = "
        delete from board_free_ripple where num='$num'
    ";

    $page = $_GET['page'];

    $result = mysqli_query($conn, $sql);

    // header("Location: ../boardFree/view.php?page=$page");
?>
<script>
    location.replace('../boardFree/view.php?page=<?=$page?>');
</script>