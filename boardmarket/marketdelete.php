<?php
    session_start();

    $page = $_GET['page'];

    $num = $_REQUEST['num'];

    include '../sql_function.php';
    $sql = "
        delete from market where num='$num'
    ";

    $result = mysqli_query($conn, $sql);

    // header("Location: ../boardFree/list.php?page=$page");
?>
<script>
    location.replace('../boardmarket/marketlist.php?page=<?=$page?>');
</script>