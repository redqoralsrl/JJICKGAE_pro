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
    if(isset($result)){
            ?>
            <script>
                alert('Use Another ID!');
                history.back();
            </script>
            <?php
    }else{
        $sql = "select * from userdata where nickname='$nickname'";
        $result = mysqli_query($conn, $sql);
        if(isset($result)){
            ?>
            <script>
                alert('Use Another Nickname!');
                history.back();
            </script>
            <?php
        }else{
            $sql = "select * from userdata where email='$email'";
            $result = mysqli_query($conn, $sql);
            if(isset($result)){
                ?>
                <script>
                    alert('Use Another Email!');
                    history.back();
                </script>
                <?php
            }else{
                if($pw != $pw2){
                ?>
                <script>
                    alert('Wrong Password!');
                    history.back();
                </script>
                <?php
                }else{
                        $sql = "
                        INSERT INTO userdata(id, name, pw, nickname, email)
                        VALUE('$id','$name','$pw','$nickName', '$email')
                    ";
                
                    $result = mysqli_query($conn, $sql);

                    ?>
                    <script>
                        alert('Login Success!');
                        history.back();
                    </script>
                    <?php

                    header("location:../index.php");
                }
            }
        }

    }
?>