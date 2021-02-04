<?php
    session_start();

    // mysql 접속
    $conn = mysqli_connect('localhost','root','brian1313','jjick');

    // 값 가져오기
    $id = mysqli_real_escape_string($conn, $_REQUEST['id']);
    $pw = mysqli_real_escape_string($conn, $_REQUEST['pw']);

    $sql = "
        SELECT * FROM userdata WHERE id='$id'
    ";

    $result = mysqli_query($conn,$sql);
    $result = mysqli_fetch_array($result);
    if($id === 'admin' && $pw === '1234'){
        ?>
        <script>
            alert('Hi Administrator!');
        </script>
        <?php
        header("Location: ../admin/admin.php?id=".$id);
    }else{
        if($result === null){
        
            ?>
            <script>
                alert('Wrong! Error!');
                history.back();
            </script>
            <?php
            }else if($result != null){
                if($result['pw'] == $pw){
                    ?>
                    <script>
                        alert('Login Success!');
                    <?php
                        $_SESSION['id'] = $result['id'];
                        $_SESSION['name'] = $result['name'];
                        $_SESSION['nickname'] = $result['nickname'];
                        header("location: ../index_result.php?id=".$id);
                    ?>
                    </script>
                    <?php
                }else{
                    ?>
                <script>
                    alert('Wrong! Error!');
                    history.back();
                </script>
                <?php
                }
            }
    }
?>