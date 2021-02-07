<?php
    include '../sql_function.php';

    ini_set('display_errors','1');
    session_start();

    $result = session_destroy();
    
    if($result){
?>
    <script>
        alert("Logout Success!");
        location.replace('../index.php');
    </script>
<?php
    }else{
        ?>
        <script>
            alert('Fail!');
            header("Location : ../index_result.php");
        </script>
        <?php
    }
?>