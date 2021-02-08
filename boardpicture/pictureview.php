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

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JJICK</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <!-- css -->
    <link rel="stylesheet" href="../styles/list.css">
    <!-- jQuery 링크 -->
    <script src="../scripts/jQueryFile/jQuery/jquery-3.5.1.js"></script>
</head>
<body>
    <header class="header-bar">
        <div class="header-bar-logo">
            <a href="../index_result.php"><img src="../images/logo.png"></a>
        </div>
        <form name="forms" method="post" action="../search_html.php">
        <ul class="search-main">
            <li><input name="search" class="search" type="text" placeholder="검색어 입력"><button class="btn-search"><strong>검색</strong></button></li>
        </ul>
        </form>
        <ul class="header-bar-icons">
            <li><a href="../boarduser/boarduser.php" class="login">마이페이지</a></li>
            <li><a href="../login_register/login_out.php" class="register">로그아웃</a></li>    
        </ul>
        </div>
        <a href="#" class="header-toogleBtn">
            <i class="fas fa-bars"></i>
        </a>
    </header>
    <div class="nav-main">
        <div class="nav-board">
            <div class="menu-list-board">
                <ul class="menu-links">
                    <li><a href="../boardFree/list.php?page=1">자유게시판</a></li>
                    <li><a href="../boardpicture/picturelist.php?page=1">사진게시판</a></li>
                    <li><a href="../boardmarket/marketlist.php?page=1">장터게시판</a></li>
                    <li><a href="../board/board_free.php?page=1">첫인사게시판</a></li>
                    <li><a href="../boarduser/boarduser.php">정보수정</a></li>
                    <li><a href="../htmls/faq.php">고객센터</a></li>
                </ul>
            </div>
        </div>
    </div>
    <?php
        include '../sql_function.php';

        $num = $_GET['num'];
        $page = $_GET['page'];

        $sql = "select * from picture where num='$num'";

        $result = mysqli_query($conn,$sql);

        $row = mysqli_fetch_array($result);

    ?>

    <div class="bodys">
        <div class="bodys_inside">
            <div class="title_bar">
                <div class="titles"><?=$row['num']?></div>
                <div class="regists"><?=$row['regist_day']?></div>
            </div><!--title_bar-->
            <div class="bodys_main">
                <div class="body_sub"><?=$row['subject']?></div>
                <div class="body_con"><?=$row['content']?></div>
            </div><!--bodys_main-->
            <div class="comment_bar">
                <div class="img_content"><?=$row['nickname']?></div>
                <div class="img_srcs"><img src="<?=$row['file_path']?>"></div>
            </div><!--comment_bar-->
        </div><!--bodys_inside-->
        <div class="button_lists">
            <ul>
                <li class="button_list_list"><a href="../boardpicture/picturelist.php?page=<?=$page?>">목록</a></li>
                <?php
                    if(isset($_SESSION['id'])){
                        if($_SESSION['id'] == 'admin' || $_SESSION['id'] == $row['id']){
                            print "<a href=../boardpicture/picturedelete.php?num=$num&page=<?=$page?>>[삭제]</a>";
                        }
                    }
                    ?>
            </ul>
        </div>
    </div><!--bodys-->
</body>
</html>