<?php
    session_start();

    $page = $_GET['page'];

    $num = $_REQUEST['num'];

    include '../sql_function.php';
    $sql = "
        delete from greet where num='$num'
    ";

    $result = mysqli_query($conn, $sql);

    // header("Location: ../boardFree/list.php?page=$page");
?>
<script>
    location.replace('../boardFree/list.php?page=<?=$page?>');
</script>