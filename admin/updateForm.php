<!-- 회원 목록 업데이트 -->
<!DOCTYPE html>
<?php
    $id = $_REQUEST['id'];

    // mysql 접속
    include '../sql_function.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원정보 수정</title>
</head>
<body>
    <?php
        $sql = "SELECT * FROM userdata WHERE id='$id'";

        $result = mysqli_query($conn, $sql);
        
        $list = '';
        if ($result == null){
            $list = '수정자가 없습니다.';
        }else{
            $row = mysqli_fetch_array($result);
    ?>
    <form action="../admin/updatePro.php" target="_self" method="post">
                <fieldset class="sign-up">
                    <span><strong>업데이트</strong></span><hr>
                    <table>
                        <tr>
                            <td>아이디</td>
                            <td><?=$row['id']?></td>
                        </tr>
                        <tr>
                            <td>비밀번호</td>
                            <td><input type="password" name="pw" value="<?=$row['pw']?>" required></td>
                        </tr>
                        <tr>
                            <td>이름</td>
                            <td><input type="text" name="name" value="<?=$row['name']?>" required></td>
                        </tr>
                        <tr>
                            <td>닉네임</td>
                            <td><input type="text" name="nickName" value="<?=$row['nickname']?>" required></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><input type="submit" value="수정하기"></td>
                        </tr>
                    </table>
                </fieldset>
                <input type="hidden" name="id" value="<?=$id?>">
            </form>
    <?php
            }
    ?>
</body>
</html>