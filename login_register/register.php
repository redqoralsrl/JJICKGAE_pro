<?php
    // 추가하는 곳

    // mysql 접속
    include '../sql_function.php';

    // 값 가져오기
    $id = mysqli_real_escape_string($conn, $_REQUEST['id']);
    $nickName = mysqli_real_escape_string($conn, $_REQUEST['nickname']); 
    $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
    $pw = mysqli_real_escape_string($conn, $_REQUEST['pw']);
    $pw2 = mysqli_real_escape_string($conn, $_REQUEST['password2']);
    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);

    $sql = "select * from userdata where id='$id'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if($count == 0){
        $sql = "select * from userdata where nickname='$nickName'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        if($count == 0){
            $sql = "select * from userdata where email='$email'";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
            if($count == 0){
                if($pw == $pw2){
                    $sql = "
                        INSERT INTO userdata(id, name, pw, nickname, email)
                        VALUE('$id','$name','$pw','$nickName', '$email')
                    ";

                    $result = mysqli_query($conn, $sql);

                    header("location:../index.php");
                }else{
                    ?>
                    <script>
                        alert('Password Not Corret for pw1, pw2');
                        history.back();
                    </script>
                    <?php
                }
            }else{
                ?>
                <script>
                    alert('Use Other Email');
                    history.back();
                </script>
                <?php
            }
        }else{
            ?>
            <script>
                alert('Use Other NickName');
                history.back();
            </script>
            <?php
        }
    }else{
        ?>
        <script>
            alert('Use Other ID');
            history.back();
        </script>
        <?php
    }

    
?>