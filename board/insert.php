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

    $content = $_REQUEST['content'];
    $id = $_SESSION['id'];
    $name = $_SESSION['name'];
    $nickname = $_SESSION['nickname'];

    $sql = "
        insert into board_free(id, name, nickname, content, regist_day)
        value('$id','$name','$nickname','$content',now())
    ";

    $result = mysqli_query($conn, $sql);
    
    header("Location: ../board/board_free.php?page=$page")
?>