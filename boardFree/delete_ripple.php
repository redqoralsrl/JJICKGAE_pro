<?php
    $num = $_REQUEST['num'];
    $ripple_num = $_REQUEST['ripple_num'];

    include '../sql_function.php';
    $sql = "
        delete from greet_ripple where num='$ripple_num'
    ";

    $page = $_GET['page'];

    $result = mysqli_query($conn, $sql);

    // header("Location: ../boardFree/view.php?page=$page");
?>
<script>
    location.replace('../boardFree/list.php?page=<?=$page?>');
</script>