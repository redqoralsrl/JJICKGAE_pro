<?php
    session_start();
?>
<meta charset="utf-8">
<?php
    if(!isset($_SESSION['id'])){
        ?>
        <script>
            alert("Use After Login!");
            location.replace('../index.html');
        </script>
<?php
    }

    // $content = $_REQUEST['content'];
    $page = $_GET['page'];


    $conn = mysqli_connect('localhost','root','brian1313','jjick');

    $num = $_REQUEST['num'];
    $content = mysqli_real_escape_string($conn, $_REQUEST['ripple_content']);

    $id = $_SESSION['id'];
    $nickname = $_SESSION['nickname'];

    $sql = "
        insert into board_free_ripple(parent, id, nickname, content, regist_day)
        value('$num','$id','$nickname','$content',now())
    ";

    $result = mysqli_query($conn, $sql);
    
    header("Location: ../board/board_free.php?page=$page")
?>