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
    $num = $_GET['num'];
    $page = $_GET['page'];
    include '../sql_function.php';

    $sql = "select * from greet where num='$num'";
    $result = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($result);

    $num = $_REQUEST['num'];

    if($count < 1){
        print "검색결과가 없습니다.<br>";
    }else{
        while($row = mysqli_fetch_array($result)){
            $item_subject = $row["subject"];
            $item_content = $row["content"];
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
    <link rel="stylesheet" href="../styles/modify_form.css">
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
            <li><input class="search" type="text" placeholder="검색어 입력"><button class="btn-search"><strong>검색</strong></button></li>
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
                    <li><a href="../board/board_free.php?page=1">첫인사게시판</a></li>
                    <li><a href="../board/board_free.php?page=1">투데이 게시판</a></li>
                    <li><a href="../boarduser/boarduser.php">나의정보</a></li>
                    <li><a href="../htmls/faq.php">고객센터</a></li>
                </ul>
            </div>
        </div>
    </div>
    

    <div class="section_bodys">
        <div id="content">
            <div class="col2">
                <div class="title">자유게시판</div>
                <div   div class="write_form_title">수정하기</div>
                <form name="board_form" method="post" action="../boardFree/insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>">
                    <div class="write_form">
                <!-- <div class="write_line"></div> -->
                        <div class="write_row1">
                            <div class="col1"></div>
                            <div class="col2"><?=$_SESSION['nickname']?></div>
                            <div class="col3">
                            <input type="checkbox" name="html_ok" value="y">HTML쓰기
                        </div>
                    </div>    
                        <div class="write_line"></div>
                        <div class="write_row2">
                            <div class="col4"></div>
                            <div class="col5">
                                <textarea name="content" cols="80" rows="15" required><?=$item_content?></textarea>
                            </div>
                        </div><!--write_row3-->
                        <div class="write_line"></div>
                    </div><!--write_row1-->
                    <div class="write_button">
                        <input type="submit" value="수정">&nbsp;
                        <a href="../boardFree/list.php?page=<?=$page?>">목록</a>
                    </div>
            </div>
        </div>    
    </div>
        </form>
</body>
</html>
<?php
        }
    }
?>