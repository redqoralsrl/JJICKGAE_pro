<?php
    session_start();

//    if(!isset($_SESSION['id'])){
        ?>
        <!-- <script>
            alert("Use After Login!");
            location.replace('../index.html');
        </script> -->
<?php
//    }

    $conn = mysqli_connect('localhost','root','brian1313','jjick');
    $sql = "
        select * from free
        order by num desc
    ";

    $result = mysqli_query($conn, $sql);

    if(isset($_REQUEST["mode"])) $mode = $_REQUEST["mode"]; // 검색해서 호출
    else $mode = "";

    if(isset($_REQUEST["search"])) $search = $_REQUEST["search"]; // search 쿼리스트링 값 할당 체크
    else $search = "";

    if(isset($_REQUEST["find"])) $find = $_REQUEST["find"];
    else $find = "";

    if($mode == "search"){
        if(!$search){
            ?>
            <script>
                alert('검색할 단어를 입력해 주세요');
                history.back();
            </script>
            <?php
        }
        $sql = "select * from free where $find like '%search%' order by num desc";
    }else{
        $sql = "select * from free order by num desc";
    }

    $count = mysqli_num_rows($sql);
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
    <section>
        <div class="col2">
            <div class="title">검색</div>
            <form action="../boardFree/list.php?mode=search">
                <div class="list_search">
                    <div class="list_search1">총 <?=$count?>개의 게시물이 있습니다.</div>
                    <div class="list_search2">SELECT</div>
                    <div class="list_search3">
                        <select name="find">
                            <option value="subject">제목</option>
                            <option value="content">내용</option>
                            <option value="nick">닉네임</option>
                            <option value="name">이름</option>
                        </select>
                    </div><!--list_search3-->
                </div><!--list_search-->
            </form>
        </div> <!--col2-->


    </section>

</body>
</html>