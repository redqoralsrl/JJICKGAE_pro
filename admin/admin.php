<!-- 회원 목록 보기 페이지 -->
<!DOCTYPE html>
<?php
    session_start();

    if(!isset($_SESSION['id']) && 'admin' != $_SESSION['id']){
        ?>
        <script>
            alert("Get Away!");
            location.replace('../index.php');
        </script>
<?php
    }

    // mysql 접속
    include '../sql_function.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원관리</title>
</head>
<body>
    <?php
        $sql = "SELECT * FROM userdata";

        $result = mysqli_query($conn, $sql);
        
        $list = '';
        if ($result == null){
            $list = '가입자가 없습니다.';
            echo $list;
        }else{
    ?>

    <table border="1" width="600">
        <tr align="center">
            <th>ID</th><th>Name</th><th>PW</th><th>NickName</th><th>수정</th><th>삭제</th>
        </tr>
    
    <?php
            while($row = mysqli_fetch_array($result)){
    ?>
        <tr align="center">
            <td><?=$row['id']?></td><td><?=$row['name']?></td><td><?=$row['pw']?></td><td><?=$row['nickname']?></td>
            <td><a href="./updateForm.php?id=<?=$row['id']?>">수정</a></td><td><a href="./delete.php?id=<?=$row['id']?>">삭제</a></td>
        </tr>
    <?php
            }
        }
    ?>
    </table>
    <a href="../index_result.php">홈페이지가기</a>
</body>
</html>