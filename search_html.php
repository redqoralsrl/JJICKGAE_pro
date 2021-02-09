<?php
    session_start();

    include './sql_function.php';

    if(!isset($_SESSION['id'])){
        ?>
        <script>
            alert("Use After Login!");
            location.replace('./index.php');
        </script>
<?php
    }

    $find = $_REQUEST['search'];
    
    if(!$find){
        ?>
        <script>
            alert('검색할 단어를 입력해 주세요.');
            history.back();
        </script>
        <?php
    }
    // table -> board_free, greet, picture, market
    // content
    $sql = "select * from board_free where content like '%$find%'";
    $result = mysqli_query($conn, $sql);
    $sql1 = "select * from greet where content like '%$find%'";
    $result1 = mysqli_query($conn, $sql1);
    $sql2 = "select * from picture where content like '%$find%'";
    $result2 = mysqli_query($conn, $sql2);
    $sql3 = "select * from market where content like '%$find%'";
    $result3 = mysqli_query($conn, $sql3);

    // subject - board_free는 없음
    $uql1 = "select * from greet where subject like '%$find%'";
    $uresult1 = mysqli_query($conn, $uql1);
    $uql2 = "select * from picture where subject like '%$find%'";
    $uresult2 = mysqli_query($conn, $uql2);
    $uql3 = "select * from market where subject like '%$find%'";
    $uresult3 = mysqli_query($conn, $uql3);

    // nickname
    $nql = "select * from board_free where nickname like '%$find%'";
    $nresult = mysqli_query($conn, $nql);
    $nql1 = "select * from greet where nickname like '%$find%'";
    $nresult1 = mysqli_query($conn, $nql1);
    $nql2 = "select * from picture where nickname like '%$find%'";
    $nresult2 = mysqli_query($conn, $nql2);
    $nql3 = "select * from market where nickname like '%$find%'";
    $nresult3 = mysqli_query($conn, $nql3);

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JJICK GAE</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="./images/favicon.ico" type="image/x-icon">
    <!-- css -->
    <link rel="stylesheet" href="./styles/search_html.css">
    <!-- fontawesome 링크 -->
    <script src="https://kit.fontawesome.com/47be955b75.js" crossorigin="anonymous"></script>
    <!-- jQuery 링크 -->
    <script src="./scripts/jQueryFile/jQuery/jquery-3.5.1.js"></script>
</head>
<body>
    <header class="header-bar">
        <div class="header-bar-logo">
            <a href="./index.php"><img src="./images/logo.png"></a>
        </div>
        <form name="forms" method="post" action="./search_html.php">
            <ul class="search-main">
                <li><input name="search" class="search" type="text" placeholder="검색어 입력"><button class="btn-search"><strong>검색</strong></button></li>
            </ul>
        </form>
        <ul class="header-bar-icons">
            <li><a href="./boarduser/boarduser.php" class="login">마이페이지</a></li>
            <li><a href="./login_register/login_out.php" class="register">로그아웃</a></li>    
        </ul>
        </div>
       
    </header>
    <div class="nav-main">
        <div class="nav-board">
            <div class="menu-list-board">
                <ul class="menu-links">
                    <li><a href="./boardFree/list.php?page=1">자유게시판</a></li>
                    <li><a href="./boardpicture/picturelist.php?page=1">사진게시판</a></li>
                    <li><a href="./boardmarket/marketlist.php?page=1">장터게시판</a></li>
                    <li><a href="./board/board_free.php?page=1">첫인사게시판</a></li>
                    <li><a href="./boarduser/boarduser.php">정보수정</a></li>
                    <li><a href="./htmls/faq.php">고객센터</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content_box">
        <div class="notice_board">공지 - 첫인사게시판은 페이지이동만 됩니다.</div>
        <div class="content_title">내용 검색 결과 ▼</div>
        <div class="serach_result1">
            <?php
            if($result != null){
                while($row = mysqli_fetch_array($result)){
                    $first_content = $row['content'];
                    $first_nickname = $row['nickname'];
                    $first_reg = $row['regist_day'];
            ?>
            <div class="results">
                <ul>
                    <li class="list1"><a href="./board/board_free.php?page=1"><?=$first_content?></a></li>
                    <li class="list2"><a href="./board/board_free.php?page=1"><?=$first_nickname?></a></li>
                    <li class="list3"><a href="./board/board_free.php?page=1"><?=$first_reg?></a></li>
                </ul>
            </div>
            <?php
                }
            }
            ?>
        </div><!--search_result1-->
        <div class="serach_result1">
            <?php
            if($result1 != null){
                while($row1 = mysqli_fetch_array($result1)){
                    $first_num = $row1['num'];
                    $first_subject = $row1['subject'];
                    $first_content = $row1['content'];
                    $first_nickname = $row1['nickname'];
                    $first_reg = $row1['regist_day'];
            ?>
            <div class="results">
                <ul>
                    <li class="list1"><a href="./boardFree/view.php?num=<?=$first_num?>&page=1"><?=$first_subject?></a></li>
                    <li class="list1_1"><a href="./boardFree/view.php?num=<?=$first_num?>&page=1"><?=$first_content?></a></li>
                    <li class="list2"><a href="./boardFree/view.php?num=<?=$first_num?>&page=1"><?=$first_nickname?></a></li>
                    <li class="list3"><a href="./boardFree/view.php?num=<?=$first_num?>&page=1"><?=$first_reg?></a></li>
                </ul>
            </div>
            <?php
                }
            }
            ?>
        </div><!--search_result1-->
        <div class="serach_result1">
            <?php
            if($result2 != null){
                while($row2 = mysqli_fetch_array($result2)){
                    $first_num = $row2['num'];
                    $first_subject = $row2['subject'];
                    $first_content = $row2['content'];
                    $first_nickname = $row2['nickname'];
                    $first_reg = $row2['regist_day'];
            ?>
            <div class="results">
                <ul>
                    <li class="list1"><a href="./boardpicture/pictureview.php?num=<?=$first_num?>&page=1"><?=$first_subject?></a></li>
                    <li class="list1_1"><a href="./boardpicture/pictureview.php?num=<?=$first_num?>&page=1"><?=$first_content?></a></li>
                    <li class="list2"><a href="./boardpicture/pictureview.php?num=<?=$first_num?>&page=1"><?=$first_nickname?></a></li>
                    <li class="list3"><a href="./boardpicture/pictureview.php?num=<?=$first_num?>&page=1"><?=$first_reg?></a></li>
                </ul>
            </div>
            <?php
                }
            }
            ?>
        </div><!--search_result1-->
        <div class="serach_result1">
            <?php
            if($result3 != null){
                while($row3 = mysqli_fetch_array($result3)){
                    $first_num = $row3['num'];
                    $first_subject = $row3['subject'];
                    $first_content = $row3['content'];
                    $first_nickname = $row3['nickname'];
                    $first_reg = $row3['regist_day'];
            ?>
            <div class="results">
                <ul>
                    <li class="list1"><a href="./boardmarket/marketview.php?num=<?=$first_num?>&page=1"><?=$first_subject?></a></li>
                    <li class="list1_1"><a href="./boardmarket/marketview.php?num=<?=$first_num?>&page=1"><?=$first_content?></a></li>
                    <li class="list2"><a href="./boardmarket/marketview.php?num=<?=$first_num?>&page=1"><?=$first_nickname?></a></li>
                    <li class="list3"><a href="./boardmarket/marketview.php?num=<?=$first_num?>&page=1"><?=$first_reg?></a></li>
                </ul>
            </div>
            <?php
                }
            }
            ?>
        </div><!--search_result1-->
    </div><!--content_box-->
    <div class="write_line"></div>
    <div class="content_box">
        <div class="content_title">제목 검색 결과 ▼</div>
        <div class="serach_result1">
            <?php
            if($uresult1 != null){
                while($rows = mysqli_fetch_array($uresult1)){
                    $first_num = $rows['num'];
                    $first_subject = $rows['subject'];
                    $first_content = $rows['content'];
                    $first_nickname = $rows['nickname'];
                    $first_reg = $rows['regist_day'];
            ?>
            <div class="results">
                <ul>
                    <li class="list1"><a href="./boardFree/view.php?num=<?=$first_num?>&page=1"><?=$first_subject?></a></li>
                    <li class="list1_1"><a href="./boardFree/view.php?num=<?=$first_num?>&page=1"><?=$first_content?></a></li>
                    <li class="list2"><a href="./boardFree/view.php?num=<?=$first_num?>&page=1"><?=$first_nickname?></a></li>
                    <li class="list3"><a href="./boardFree/view.php?num=<?=$first_num?>&page=1"><?=$first_reg?></a></li>
                </ul>
            </div>
            <?php
                }
            }
            ?>
        </div><!--search_result1-->
        <div class="serach_result1">
            <?php
            if($uresult2 != null){
                while($rows1 = mysqli_fetch_array($uresult2)){
                    $first_num = $rows1['num'];
                    $first_subject = $rows1['subject'];
                    $first_content = $rows1['content'];
                    $first_nickname = $rows1['nickname'];
                    $first_reg = $rows1['regist_day'];
            ?>
            <div class="results">
                <ul>
                    <li class="list1"><a href="./boardpicture/pictureview.php?num=<?=$first_num?>&page=1"><?=$first_subject?></a></li>
                    <li class="list1_1"><a href="./boardpicture/pictureview.php?num=<?=$first_num?>&page=1"><?=$first_content?></a></li>
                    <li class="list2"><a href="./boardpicture/pictureview.php?num=<?=$first_num?>&page=1"><?=$first_nickname?></a></li>
                    <li class="list3"><a href="./boardpicture/pictureview.php?num=<?=$first_num?>&page=1"><?=$first_reg?></a></li>
                </ul>
            </div>
            <?php
                }
            }
            ?>
        </div><!--search_result1-->
        <div class="serach_result1">
            <?php
            if($uresult3 != null){
                while($rows2 = mysqli_fetch_array($uresult3)){
                    $first_num = $rows2['num'];
                    $first_subject = $rows2['subject'];
                    $first_content = $rows2['content'];
                    $first_nickname = $rows2['nickname'];
                    $first_reg = $rows2['regist_day'];
            ?>
            <div class="results">
                <ul>
                    <li class="list1"><a href="./boardmarket/marketview.php?num=<?=$first_num?>&page=1"><?=$first_subject?></a></li>
                    <li class="list1_1"><a href="./boardmarket/marketview.php?num=<?=$first_num?>&page=1"><?=$first_content?></a></li>
                    <li class="list2"><a href="./boardmarket/marketview.php?num=<?=$first_num?>&page=1"><?=$first_nickname?></a></li>
                    <li class="list3"><a href="./boardmarket/marketview.php?num=<?=$first_num?>&page=1"><?=$first_reg?></a></li>
                </ul>
            </div>
            <?php
                }
            }
            ?>
        </div><!--search_result1-->
    </div><!--content_box-->
    <div class="write_line"></div>
    <div class="content_box">
        <div class="content_title">닉네임 검색 결과 ▼</div>
        <div class="serach_result1">
            <?php
            if($nresult != null){
                while($nrow = mysqli_fetch_array($nresult)){
                    $first_content = $nrow['content'];
                    $first_nickname = $nrow['nickname'];
                    $first_reg = $nrow['regist_day'];
            ?>
            <div class="results">
                <ul>
                    <li class="list1"><a href="./board/board_free.php?page=1"><?=$first_content?></a></li>
                    <li class="list2"><a href="./board/board_free.php?page=1"><?=$first_nickname?></a></li>
                    <li class="list3"><a href="./board/board_free.php?page=1"><?=$first_reg?></a></li>
                </ul>
            </div>
            <?php
                }
            }
            ?>
        </div><!--search_result1-->
        <div class="serach_result1">
            <?php
            if($nresult1 != null){
                while($nrow1 = mysqli_fetch_array($nresult1)){
                    $first_num = $nrow1['num'];
                    $first_subject = $nrow1['subject'];
                    $first_content = $nrow1['content'];
                    $first_nickname = $nrow1['nickname'];
                    $first_reg = $nrow1['regist_day'];
            ?>
            <div class="results">
                <ul>
                    <li class="list1"><a href="./boardFree/view.php?num=<?=$first_num?>&page=1"><?=$first_subject?></a></li>
                    <li class="list1_1"><a href="./boardFree/view.php?num=<?=$first_num?>&page=1"><?=$first_content?></a></li>
                    <li class="list2"><a href="./boardFree/view.php?num=<?=$first_num?>&page=1"><?=$first_nickname?></a></li>
                    <li class="list3"><a href="./boardFree/view.php?num=<?=$first_num?>&page=1"><?=$first_reg?></a></li>
                </ul>
            </div>
            <?php
                }
            }
            ?>
        </div><!--search_result1-->
        <div class="serach_result1">
            <?php
            if($nresult2 != null){
                while($nrow2 = mysqli_fetch_array($nresult2)){
                    $first_num = $nrow2['num'];
                    $first_subject = $nrow2['subject'];
                    $first_content = $nrow2['content'];
                    $first_nickname = $nrow2['nickname'];
                    $first_reg = $nrow2['regist_day'];
            ?>
            <div class="results">
                <ul>
                    <li class="list1"><a href="./boardpicture/pictureview.php?num=<?=$first_num?>&page=1"><?=$first_subject?></a></li>
                    <li class="list1_1"><a href="./boardpicture/pictureview.php?num=<?=$first_num?>&page=1"><?=$first_content?></a></li>
                    <li class="list2"><a href="./boardpicture/pictureview.php?num=<?=$first_num?>&page=1"><?=$first_nickname?></a></li>
                    <li class="list3"><a href="./boardpicture/pictureview.php?num=<?=$first_num?>&page=1"><?=$first_reg?></a></li>
                </ul>
            </div>
            <?php
                }
            }
            ?>
        </div><!--search_result1-->
        <div class="serach_result1">
            <?php
            if($nresult2 != null){
                while($nrow3 = mysqli_fetch_array($nresult3)){
                    $first_num = $nrow3['num'];
                    $first_subject = $nrow3['subject'];
                    $first_content = $nrow3['content'];
                    $first_nickname = $nrow3['nickname'];
                    $first_reg = $nrow3['regist_day'];
            ?>
            <div class="results">
                <ul>
                    <li class="list1"><a href="./boardmarket/marketview.php?num=<?=$first_num?>&page=1"><?=$first_subject?></a></li>
                    <li class="list1_1"><a href="./boardmarket/marketview.php?num=<?=$first_num?>&page=1"><?=$first_content?></a></li>
                    <li class="list2"><a href="./boardmarket/marketview.php?num=<?=$first_num?>&page=1"><?=$first_nickname?></a></li>
                    <li class="list3"><a href="./boardmarket/marketview.php?num=<?=$first_num?>&page=1"><?=$first_reg?></a></li>
                </ul>
            </div>
            <?php
                }
            }
            ?>
        </div><!--search_result1-->
    </div><!--content_box-->
    <!-- 돌아가기 메뉴 -->
    <div>
        <a  id="back-to-top" href="#">Top</a>
    </div>
    <script src="./scripts/scripts.js"></script>
</body>
</html>