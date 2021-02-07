<?php
    include '../sql_function.php';

    session_start();

    if(!isset($_SESSION['id'])){
        ?>
        <script>
            alert("Use After Login!");
            location.replace('../index.php');
        </script>
<?php
    }

    $page = $_GET['page'];
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
    <link rel="stylesheet" href="../styles/write_form.css">
    <!-- jQuery 링크 -->
    <script src="../scripts/jQueryFile/jQuery/jquery-3.5.1.js"></script>
</head>
<body>
    <header class="header-bar">
        <div class="header-bar-logo">
            <a href="../index_result.php"><img src="../images/logo.png"></a>
        </div>
        <ul class="search-main">
            <li><input class="search" type="text" placeholder="검색어 입력"><button class="btn-search"><strong>검색</strong></button></li>
        </ul>
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
                    <li><a href="../boardpicture/picturelist.php?page=1">익명게시판</a></li>
                    <li><a href="#">신문고게시판</a></li>
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
                <div class="title">글쓰기</div>
                <div class="write_line"></div>
                <form name="board_form" action="../boardFree/insert.php?page=<?=$page?>" method="post">
                    <div class="write_form">
                        <div class="write_row1">
                            <div id="col1">닉네임</div>
                            <div id="col2"><?=$_SESSION['nickname']?></div>
                            <div id="col3"><input type="checkbox" name="html_ok" value="y">HTML 쓰기</div>
                        </div><!--wirte_row1-->
                    </div><!--write_form-->
                    <div class="write_line"></div>
                    <div class="write_row2">
                        <div class="col1s">제목</div>
                        <div class="col2s">
                            <textarea name="subject" rows="15" placeholder="내용을 입력하세요."></textarea>
                        </div>
                    </div><!--write_row2-->
                    <div class="write_line"></div>
                    <div class="write_row3">
                        <div class="col3s">내용</div>
                        <div class="col4s">
                            <textarea name="content" rows="15" placeholder="내용을 입력하세요."></textarea>
                        </div>
                    </div><!--write_row2-->
                    <div class="write_line"></div>
                    <div class="write_button">
                        <input type="submit" value="완료">&nbsp;
                        <a href="../boardFree/list.php?page=<?=$page?>">목록</a>
                    </div>
                </form>
            </div><!--col2-->
        </div><!--content-->
    </div>
</body>
</html>