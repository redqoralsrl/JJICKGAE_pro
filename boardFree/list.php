<?php
    session_start();

    if(!isset($_SESSION['id'])){
        ?>
        <script>
            alert("Use After Login!");
            location.replace('../index.html');
        </script>
<?php
    }

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JJICK</title>
</head>
<body>
    <?php
            $conn = mysqli_connect('localhost','root','brian1313','jjick');

            $sql = "
                select * from userdata
                where id='$id'
            ";

            $result = mysqli_connect($conn,$sql);
    ?>
    <?php
        if(isset($_REQUEST['mode'])) $mode = $_REQUEST['mode'];
        else
    ?>
</body>
</html>