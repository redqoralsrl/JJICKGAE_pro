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

    $num = $_GET['num'];
    $page = $_GET['page'];

    include '../sql_function.php';

    $upload_dir = '..\data\\';

    $sql = "select * from picture where num='$num'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

    // 파일
    $file_name = $row['file_path'];
    unlink($upload_dir.$file_name);
    // 데이터베이스
    $sqls = "delete from picture where num='$num'";
    $results = mysqli_query($conn,$sqls);

?>
<script>
    location.replace('../boardpicture/picturelist.php?page=<?=$page?>');
</script>