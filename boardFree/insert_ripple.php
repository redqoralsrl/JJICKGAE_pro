<?php
    session_start();
?>
<!-- <meta charset="utf-8"> -->
<?php
    if(!isset($_SESSION['id'])){
        ?>
        <script>
            alert("Use After Login!");
            location.replace('../index.php');
        </script>
<?php
    }

    // $content = $_REQUEST['content'];
    $page = $_GET['page'];


    include '../sql_function.php';

    $num = $_REQUEST['num'];
    $content = mysqli_real_escape_string($conn, $_REQUEST['ripple_content']);

    $id = $_SESSION['id'];
    $nickname = $_SESSION['nickname'];

    $sql = "
        insert into greet_ripple(parent, id, nickname, content, regist_day)
        value('$num','$id','$nickname','$content',now())
    ";

    $result = mysqli_query($conn, $sql);
    
    // header("Location: ../boardFree/view.php?page=$page&num=$num")
?>
<script>
    location.replace('../boardFree/list.php?num=<?=$num?>&page=<?=$page?>');
</script>