<?php
    session_start();
    
    if(!isset($_SESSION['id'])){
        ?>
        <script>
            alert("Use After Login!");
            location.replace('../index.php');
        </script>
<?php
    }
    include '../sql_function.php';

    $page = $_GET['page'];

    $num = $_REQUEST['num'];
    $content = mysqli_real_escape_string($conn, $_REQUEST['ripple_content']);

    $id = $_SESSION['id'];
    $nickname = $_SESSION['nickname'];

    $sql = "
        insert into board_free_ripple(parent, id, nickname, content, regist_day)
        value('$num','$id','$nickname','$content',now())
    ";

    $result = mysqli_query($conn, $sql);
    
?>
<script>
    location.replace('../board/board_free.php?page=<?=$page?>');
</script>