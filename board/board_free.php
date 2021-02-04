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

    $conn = mysqli_connect('localhost','root','brian1313','jjick');

    $page_sql = "
        select * from board_free
    ";

    $page = $_GET['page'];

    $page_result = mysqli_query($conn,$page_sql);
    $total_article = mysqli_num_rows($page_result);
    // $page = null;
    $view_article = 10; // 한 페이지에 작성할 개수
    if(!$page) $page=1; // 값이없으면 1로
    $start = ($page-1)*$view_article; // 현재 페이지 시점에서 시작점을 지정해준다

    $cot = 1; // 반복문에 $cot ++; 넣어준다.

    $sql = "
        select * from board_free
        order by num desc
        limit $start, $view_article
    ";

    $result = mysqli_query($conn, $sql);
    $cot = 1;
    $cot = $total_article - ($view_article * ($page - 1));

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
    <section class="section-body">
    <?php
        if(isset($_SESSION['id'])){
    ?>
    <div class="main-typing">
        <form class="form-area" action="../board/insert.php?page=<?=$page?>" method="post">
            <div class="memo-title-com"><p>첫인사게시판</p></div><br>
            <div class="memo-writer"><span>닉네임 : <?=$_SESSION['nickname']?></span></div>
            <div class="memo1"><textarea name="content" rows="2" placeholder="새 글을 작성해주세요!" required></textarea></div>
            <div class="memo2">
                <input type="submit" value="작성하기">
            </div>
        </form>
    </div>
    <?php
        }
        while($row = mysqli_fetch_array($result)){
            $board_free_num = $row['num'];
            $board_free_id = $row['id'];
            $board_free_name = $row['name'];
            $board_free_nickname = $row['nickname'];
            $board_free_date = $row['regist_day'];
            $board_free_content = str_replace("\n","<br>",$row['content']);
            $board_free_content = str_replace("%nbsp", " ",$row['content']);
    ?>
    <div class="board-memo-result">
            <div class="board-memo-box">
                <ul>
                    <li class="writer_title"><?=$board_free_num?>번글&nbsp;</li>
                    <li class="writer_title2"><?=$board_free_nickname?>&nbsp;</li>
                    <li class="writer_title3"><?=$board_free_date?></li>
                    <li class="writer_titled4">
                        <?php
                            if(isset($_SESSION['id'])){
                            if($_SESSION['id'] == 'admin' || $_SESSION['id'] == $board_free_id){
                            print("<a href='../board/delete_board.php?num=$board_free_num'>[삭제]</a>");
                                }
                            }
        ?>
                    </li>
                </ul>
                <div class="memo-content"><?=$board_free_content?>
                </div>
            </div><!-- board-memo-box -->
    </div><!-- board-memo-result -->
    <div class="memo-content-box">
        <div class="ripple">
            <div class="ripple-box">
                <div class="ripple1">댓글</div>
                <?php
                    if(isset($_SESSION['id'])){
                ?>
                    <form action="../board/insert_ripple.php?page=<?=$page?>" action="post">
                    <input type="hidden" name="num" value="<?=$board_free_num?>">
                    <div class="ripple_insert">
                        <div class="ripple_textarea">
                            <textarea name="ripple_content" rows="1" placeholder="댓글을 작성해주세요!"></textarea>
                        </div>
                    </div>
                    <div class="ripple_box">
                        <div class="ripple_button">
                            <input type="submit" value="작성하기">
                        </div>
                    </div>
                </form>
                <?php
                }
                ?>
                <div class="ripple2">
                <?php
                    $conn = mysqli_connect('localhost','root','brian1313','jjick');
                    $sqls = "select * from board_free_ripple where parent='$board_free_num'";
                    $result2 = mysqli_query($conn, $sqls);
                    while($row2 = mysqli_fetch_array($result2)){
                    $ripple_num = $row2['num'];
                    $ripple_parent = $row2['parent'];
                    $ripple_id = $row2['id'];
                    $ripple_nickname = $row2['nickname'];
                    $ripple_content = str_replace("\n","<br>", $row2['content']);
                    $ripple_content = str_replace(" ","&nbsp", $ripple_content);
                    $ripple_date = $row2['regist_day'];
                ?>
                    <div class="ripple_title">
                        <ul class="uls">
                            <li>댓글&nbsp;&nbsp;<?=$ripple_nickname?>&nbsp;&nbsp;&nbsp;&nbsp;<?=$ripple_date?></li>
                            <li class="mdi_del">
                                <?php
                                    if(isset($_SESSION['id'])){
                                    if($_SESSION['id'] == 'admin' || $_SESSION['id'] == $ripple_id){
                                    print("<a href='../board/delete_ripple.php?num=$ripple_num'>[삭제]</a>");
                                        }
                                    }
                                ?>
                            </li>
                        </ul>
                    </div><!-- ripple_title -->
                    <div class="memo-ripple-content-box">
                        <div class="memo-content-ripple"><span><?=$ripple_content?></span>
                        </div>
                    </div><!-- memo-ripple-content-box -->
                <?php
                    }
                    ?>
                </div><!-- ripple2 -->
            </div><!-- ripple-box -->
        </div><!-- ripple -->
    </div><!-- memo-content-box -->

    <?php
            $cot--;
        }
        include('page.php');
    ?>
</section>
    <script src="../scripts/board_free.js"></script>
</body>
</html>