<?php
    session_start();

    if(!isset($_SESSION['id'])){
        ?>
        <script>
            alert("Use After Login!");
            location.replace('../index.html');
        </script>
<?php
    }

    // 수정 버튼을 클릭해서 호출 체크
    if(isset($_REQUEST['mode'])) $mode = $_REQUEST['mode'];
    else $mode = "";
    
    // 수정 버튼을 클릭해서 호출 체크
    if(isset($_REQUEST['num'])) $num = $_REQUEST['num'];
    else $num = "";

    $conn = mysqli_connect('localhost','root','brian1313','jjick');

    if($mode == "modify"){
        $sql = "
            select * from free
            where num = $num
        ";
        
        $result = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($result);
    }else{
        $row = mysqli_fetch_array($result);
        $item_subject = $row['subject'];
        $item_content = $row['content'];
        $item_file_0 = $row['file_name_0'];
        $item_file_1 = $row['file_name_1'];
        $copied_file_0 = $row['file_copied_0'];
        $copied_file_1 = $row['file_copied_1'];
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
    <link rel="stylesheet" href="../styles/board_free.css">
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
                    <li><a href="../board/board_free.php">자유게시판</a></li>
                    <li><a href="#">익명게시판</a></li>
                    <li><a href="#">신문고게시판</a></li>
                    <li><a href="../board/board_free.php?page=1">투데이 게시판</a></li>
                    <li><a href="../boarduser/boarduser.php">나의정보</a></li>
                    <li><a href="../htmls/faq.html">고객센터</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="content">
        <div id="col2">
            <div id="title">글쓰기</div>
        </div><!--col2-->
        <?php
            if($mdoe == 'modify'){
        ?>
        <form name="board_form" method="post" action="../boardFree/insert.php?mode=modify&num=<?=$num?>" enctype="multipart/form-data">
            <?php
                }else{
            ?>
                <form action="board_form" method="post" action="../boardFree/insert.php" enctype="multipart/form-data">
            <?php
                }
            ?>
                    <div class="write_form">
                        <div class="write_line"></div>
                        <div class="write_row1">
                            <div class="col1">별명</div>
                            <div class="col2"><?=$_SESSION['nickname']?></div>
                            <div class="col3"><input type="checkbox" name="html_ok" value="y">HTML 쓰기</div>
                        </div><!--write_row1-->
                        <div class="write_line"></div>
                        <div class="write_row3">
                            <div class="col1">내용</div>
                            <div class="col2">
                                <input type="text" name="subject" <?php if($mode=="modify"){?>value="<?=$item_subject?>"<?php}?> required>
                            </div><!--col2-->
                            <div class="write_line"></div>
                            <div class="write_row4">
                                <div class="col1">이미지 파일</div>
                            </div>
                        </div><!--write_row3-->
                    </div><!--write_form-->
                </form><!--board_form-->
        </form><!--board_form-->
    </div><!--content-->
</body>
</html>