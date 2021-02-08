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

    if(isset($_REQUEST['mode'])) $mode = $_REQUEST['mode'];
    else  $mode = "";

    if(isset($_REQUEST['search'])){
        $search = $_REQUEST['search'];
    }else{
        $search = "";
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

        // 페이지
        $page_sql = "
            select * from market
        ";

        $page = $_GET['page'];
        if(!isset($page)){
            $page = 1;
        }

        $page_result = mysqli_query($conn,$page_sql);
        $total_article = mysqli_num_rows($page_result);
        // $page = null;
        $view_article = 10; // 한 페이지에 작성할 개수
        if(!$page) $page=1; // 값이없으면 1로
        $start = ($page-1)*$view_article; // 현재 페이지 시점에서 시작점을 지정해준다

        $cot = 1; // 반복문에 $cot ++; 넣어준다.

        if(isset($_REQUEST['search'])){
            $search = $_REQUEST['search'];
        }else{
            $search = "";
        }

        if(isset($_REQUEST['find'])) $find = $_REQUEST['find'];
        else $find = "";

        if($mode == "search"){
            if(!$search){
                ?>
                <script>
                    alert('검색할 단어를 입력해 주세요.');
                    history.back();
                </script>
                <?php
            }
            $sql = "select * from market where $find like '%$search%' order by num desc
                    limit $start, $view_article";
        }else{
            $sql = "
            select * from market
            order by num desc
            limit $start, $view_article
        ";
        }

        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);

        $cot = 1;
        $cot = $total_article - ($view_article * ($page - 1));
    ?>
    <div class="section_bodys">
        <div class="col2">
            <div class="title">장터게시판</div>
            <div class="write_line"></div>
            <form name="board_form" method="post" action="../boardmarket/marketlist.php?mode=search&page=<?=$page?>">
                <div class="list_search">
                    <div class="list_search1">▷ 총 <?= $count ?> 개의 게시물이 있습니다.</div>
                    <div class="list_search1_1">
                        <div class="list_search2">SELECT&nbsp;</div>
                        <div class="list_search3">
                            <select name="find">
                                <option value='subject'>제목</option>
                                <option value='content'>내용</option>
                                <option value='nickname'>작성자</option>
                                <option value='name'>이름</option>
                            </select>
                        </div> <!-- end of list_search3 -->
                        <div class="list_search4"><input type="text" name="search"></div>
                        <div class="list_search5"><input type="submit" value="검색"></div>
                    </div><!--list_search1_1-->
                </div><!--list_search-->
            </form><!--board_form-->
            <div class="write_line"></div>
            <div class="list_top_title">
                <ul>
                    <li class="list_title1">번호</li>
                    <li class="list_title2">제목</li>
                    <li class="list_title3">작성자</li>
                    <li class="list_title4">등록일</li>
                    <li class="list_title5">사진</li>
                </ul>
            </div><!--list_top_title-->
            <div class="list_content">
                <?php

                    $i = $count;

                    while($row = mysqli_fetch_array($result)){
                        $item_num=$row["num"];
                        $item_id=$row["id"];
                        $item_name=$row["name"];
                        $item_nick=$row["nickname"];
                        $item_date=$row["regist_day"];
                        $item_date=substr($item_date, 0, 10);
                        $item_subject=str_replace(" ", "&nbsp;", $row["subject"]);
                        $item_file = $row['file_path'];

                        $sql = "select * from market_ripple where parent=$item_num";
                        $result1 = mysqli_query($conn, $sql);
                        $num_ripple = mysqli_num_rows($result1);
                ?>
                    <div id="list_item">
                        <ul>
                            <li id="list_item1"><?= $i ?></li>
                            <li id="list_item2"><a href="../boardmarket/marketview.php?num=<?=$item_num?>&page=<?=$page?>"><?= $item_subject ?></a>
                            <?php
                                if($num_ripple) print "[<font color=red><b>$num_ripple</b></font>]";
                            ?></li>
                            <li id="list_item3"><a href="../boardmarket/marketview.php?num=<?=$item_num?>&page=<?=$page?>"><?= $item_nick ?></a></li>
                            <li id="list_item4"><a href="../boardmarket/marketview.php?num=<?=$item_num?>&page=<?=$page?>"><?= $item_date ?></a></li>
                            <li id="list_item5"><a href="../boardmarket/marketview.php?num=<?=$item_num?>&page=<?=$page?>"><img src="<?=$item_file?>"></a></li>
                        </ul>
                    </div><!--list_item-->
                    <?php
                        $i--;
                        $cot--;
                    } // while
                    include('./marketpage.php');
                ?>
                <div class="write_button">
                    <a href="../boardmarket/marketlist.php?page=<?=$page?>">목록</a>&nbsp;
                    <?php
                        if(isset($_SESSION['id'])){
                    ?>
                    <a href="../boardmarket/marketwrite.php?page=<?=$page?>">글쓰기</a>
                    <?php
                        }
                    ?>
                </div><!-- write_button -->
            </div><!--list_top_title-->
        </div><!--col2-->
    </div><!--section_bodys-->
</body>
</html>