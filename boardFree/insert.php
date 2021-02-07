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
    if(isset($_REQUEST['mode'])) $mode = $_REQUEST['mode'];
    else $mode = "";

    if(isset($_REQUEST['num'])) $num = $_REQUEST['num'];
    else $num = "";

    if(isset($_REQUEST['html_ok'])) $html_ok = $_REQUEST['html_ok'];
    else $html_ok = "";

    $subject = $_REQUEST['subject'];
    $content = $_REQUEST['content'];

    include '../sql_function.php';

    $id = $_SESSION['id'];
    $name = $_SESSION['name'];
    $nickname = $_SESSION['nickname'];

    if($mode == 'modify'){

        $sql = "update greet set subject='$subject', content='$content', is_html='$is_html' where num='$num'";
        $result = mysqli_query($conn,$sql);

        // header("Location : ../boardFree/list.php?page=$page");
        ?>
        <script>
        location.replace('../boardFree/list.php?page=<?=$page?>');
        </script>
        <?php
    }else{
        if($html_ok == "y"){
            $is_html = "y";
        }else{
            $is_html = "";
            $content = htmlspecialchars($content);
        }
    }

    $sql = "insert into greet(id, name, nickname, subject, content, regist_day, hit, is_html)
            value('$id','$name','$nickname','$subject','$content',now(),0,'$is_html')";

    $result = mysqli_query($conn, $sql);

    $page = $_GET['page'];

    // header("Location : ../boardFree/list.php?page=$page");   
?>
<script>
    location.replace('../boardFree/list.php?page=<?=$page?>');
</script>