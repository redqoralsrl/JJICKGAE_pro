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
    <link rel="stylesheet" href="../styles/view.css">
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
                <form name="board_form" action="../boardmarket/marketinsert.php?page=<?=$page?>" method="post" enctype="multipart/form-data">
                    <div class="write_form">
                        <div class="write_row1">
                            <div id="col1">장터게시판</div>
                            <div id="col2"><?=$_SESSION['nickname']?></div>
                        </div><!--wirte_row1-->
                    </div><!--write_form-->
                    <div class="write_line"></div>
                    <div class="write_row2">
                        <div class="col1s">제목</div>
                        <div class="col2s">
                            <textarea name="subject" rows="15" placeholder="내용을 입력하세요." required></textarea>
                        </div>
                    </div><!--write_row2-->
                    <div class="write_line"></div>
                    <div class="write_row3">
                        <div class="col3s">내용</div>
                        <div class="col4s">
                        <textarea name="content" rows="15" placeholder="사기 또는 아이디 도용 의심 , 사기 이외 범죄 행위(성범죄,마약거래등)

- 무기한 활동 정지 및 법적 처벌- 
- 직거래가 아닐 시 확인 신중히하여 거래하여주세요-
- 다른 회원의 거래를 악의적으로 방해,비하,욕설 등을 금지합니다-


                            " required></textarea></div>
                    </div><!--write_row2-->
                    <div id="write_row4">
                        <div class="col1"></div>
    	                <div class="col2"><input type="file" name="upfile" required></div>
    	                </div>
                    <div class="write_line"></div>
                    <div class="write_button">
                        <input type="submit" value="완료">&nbsp;
                        <a href="../boardmarket/marketlist.php?page=<?=$page?>">목록</a>
                    </div>
                </form>
            </div><!--col2-->
        </div><!--content-->
    </div>
</body>
</html>