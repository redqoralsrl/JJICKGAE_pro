<?php
    include '../sql_function.php';

    session_start();

    if(!isset($_SESSION['id'])){
        ?>
        <script>
            alert("Use After Login!");
            location.replace('../index.php');
        </script>
<?php
    }
    $page = $_GET['page'];

    $file_name = $_FILES['upfile']['name'];
    $tmp_file = $_FILES['upfile']['tmp_name'];

    $file_path = '../data/'.$file_name;

    $r = move_uploaded_file($tmp_file, $file_path);

    $subject=$_REQUEST["subject"];
    $content=$_REQUEST["content"];
    $nickname=$_SESSION['nickname'];
    $id=$_SESSION['id'];
    $name=$_SESSION['name'];


    
    $sql = "insert into market(id, name, nickname, subject, content, regist_day, file_path)
            value('$id','$name','$nickname','$subject','$content',now(), '$file_path')";

    $result = mysqli_query($conn,$sql);
?>
<script>
    location.replace('../boardmarket/marketlist.php?page=<?=$page?>');
</script>