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

    // mysql 접속
    include '../sql_function.php';
    $pw = $_SESSION['pw'];
    
    if($pw !== $_REQUEST['pw']){
        ?>
        <script>
            alert('password Error!')
            history.back();
        </script>
        <?php
    }else{

    // 값 가져오기
    $id = mysqli_real_escape_string($conn, $_REQUEST['id']);
    $nickname = mysqli_real_escape_string($conn, $_REQUEST['nickname']);
    $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
    

    $sql = "
        update userdata set id='$id', name='$name', nickname='$nickname' where id='$id'; 
    ";

    $sql2 = "
        update board_free set id='$id', name='$name', nickname='$nickname' where id='$id'; 
    ";

    $sql3 = "
        update board_free_ripple set id='$id', nickname='$nickname' where id='$id'; 
    ";

    $result = mysqli_query($conn, $sql);
    $result = mysqli_query($conn, $sql2);
    $result = mysqli_query($conn, $sql3);

    header("Location: ../index_result.php");
    }
?>