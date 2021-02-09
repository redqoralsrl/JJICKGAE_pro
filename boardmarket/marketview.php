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
    $num = $_REQUEST['num'];
    $page = $_GET['page'];
    include '../sql_function.php';

    $sql = "select * from market where num='$num'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    // while($row = mysqli_fetch_array($result) or die(mysqli_error($conn))){
    $item_num     = $row["num"];
    $item_id      = $row["id"];
    $item_name    = $row["name"];
    $item_nick    = $row["nickname"];   
    $item_subject = str_replace(" ", "&nbsp;", $row["subject"]);
    $item_content = $row["content"];
    $item_date    = $row["regist_day"];
    $item_date    = substr($item_date, 0, 10);
    $item_file    = $row['file_path'];
    // }
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
    <div class="colbody">
        <div class="col2">
            <div class="title">장터게시판</div>
            <div class="line_s"></div>
            <div class="title_bars">
                <div class="title_names"></div>
                <div class="view_title1"><?=$item_subject?></div>
            </div>
            <div class="line_s"></div>
            <div class="view_title">
                <div class="view_title2">작성자 : <?=$item_nick?> | 아이디 : <?=$item_id?> | 날짜 : <?=$item_date?></div>
            </div><!--view_title-->
            <div class="line_s"></div>
            <div class="img_view"><img src="<?=$item_file?>"></div>
            <div class="view_content">
                <div class="content_view"></div>
                <div class="content_content"><?=$item_content?></div>
            </div>
            <div class="line_s"></div>
            <div class="ripple">
                <?php
                    $sql = "select * from market_ripple where parent='$item_num'";
                    $results = mysqli_query($conn, $sql);

                    while($row_ripple = mysqli_fetch_array($results)){
                        $ripple_num = $row_ripple['num'];
                        $ripple_id = $row_ripple['id'];
                        $ripple_nick = $row_ripple['nickname'];
                        $ripple_content = str_replace("\n", "<br>", $row_ripple["content"]);
                        $ripple_content = str_replace(" ", "&nbsp;", $ripple_content);
                        $ripple_date = $row_ripple['regist_day'];
                        ?>
                <div class="ripple_writer_title">
                    <ul>
                        <li class="writer_title1">작성자 : <?=$ripple_nick?></li>
                        <li class="writer_title2">날짜 : <?=$ripple_date?></li>
                        &nbsp;&nbsp;
                <?php
                    if(isset($_SESSION['id'])){
                        if($_SESSION['id'] == 'admin' || $_SESSION['id'] == $ripple_id){
                            print "<a href=marketdelete_ripple.php?num=$item_num&ripple_num=$ripple_num&page=$page>[삭제]</a>";
                        }
                    }
                    ?>
                    </ul>
                    <div class="writer_title3"><?=$ripple_content?></div>
                </div><!--ripple_writer_title-->
                <?php
                    }//while
                ?>
                <div class="line_s"></div>
                <form name="ripple_form" method="post" action="../boardmarket/marketinsert_ripple.php?num=<?=$item_num?>&page=<?=$page?>">
                    <div class="ripple_box">
                        <div class="ripple_box1">댓글쓰기</div>
                        <div class="ripple_box2"><textarea name="ripple_content" cols="65" rows="5" required></textarea></div>
                    </div><!-- ripple_box -->
                    <div class="ripple_box3"><input type="submit" value="댓글쓰기" required></div>
                </form>
            </div><!--ripple-->
            <div class="view_button">
                <a href="../boardmarket/marketlist.php?page=<?=$page?>">목록</a>&nbsp;
                <?php
                    if(isset($_SESSION['id'])){
                        if($_SESSION['id'] == $item_id || $_SESSION['id'] == "admin"){
                ?>
                            <a href="../boardmarket/marketdelete.php?num=<?=$num?>&page=<?=$page?>">삭제</a>&nbsp;
                <?php
                        }
                    }
                ?>
            </div><!--view_content-->
        </div><!--col2-->
    </div><!--colbody-->
</body>
</html>