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
    <link rel="stylesheet" href="../styles/picturelist.css">
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
                    <li><a href="#">익명게시판</a></li>
                    <li><a href="#">신문고게시판</a></li>
                    <li><a href="../board/board_free.php?page=1">투데이 게시판</a></li>
                    <li><a href="../boarduser/boarduser.php">나의정보</a></li>
                    <li><a href="../htmls/faq.php">고객센터</a></li>
                </ul>
            </div>
        </div>
    </div>
    <?php
        include '../sql_function.php';

        $page_sql = "
        select * from picture
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
            select * from picture
            order by num desc
            limit $start, $view_article
        ";

        $result = mysqli_query($conn, $sql);
        $cot = 1;
        $cot = $total_article - ($view_article * ($page - 1));

        // $sql = 'select * from picture desc
        //         order by num desc';
        
        // $result = mysqli_query($conn,$sql);
        ?>
    <div class="title_list_look">
        <div class="container_body">
            <ul>
                <li class="list1">글번호</li>
                <li class="list2">아이디</li>
                <li class="list3">닉네임</li>
                <li class="list4">제목</li>
                <li class="list5">내용</li>
                <li class="list6">이미지</li>
                <li class="list7">날짜</li>
            </ul>
        
        <?php
        while($row = mysqli_fetch_array($result)){
            $img_num = $row['num'];
            $img_id = $row['id'];
            $img_name = $row['name'];
            $img_nickname = $row['nickname'];
            $img_subject = str_replace(" ", "&nbsp;", $row["subject"]);
            $img_content = $row['content'];
            $img_date = $row['regist_day'];
            $img_file = $row['file_path'];
            ?>
            <div class="bodys">
                <div class="bodys_bod">
                    <div class="insta">
                        <div class="num_insta"><a href="../boardpicture/pictureview.php?num=<?=$img_num?>&page=<?=$page?>"><?=$img_num?></a></div>
                        <div class="id_insta"><a href="../boardpicture/pictureview.php?num=<?=$img_num?>&page=<?=$page?>"><?=$img_id?></a></div>
                        <div class="nickname_insta"><a href="../boardpicture/pictureview.php?num=<?=$img_num?>&page=<?=$page?>"><?=$img_nickname?></a></div>
                        <div class="subject_insta"><a href="../boardpicture/pictureview.php?num=<?=$img_num?>&page=<?=$page?>"><?=$img_subject?></a></div>
                        <div class="content_insta"><a href="../boardpicture/pictureview.php?num=<?=$img_num?>&page=<?=$page?>"><?=$img_content?></a></div>
                        <div class="img_ins"><a href="../boardpicture/pictureview.php?num=<?=$img_num?>&page=<?=$page?>"><img src="<?=$img_file?>"></a></div>
                        <div class="day_insta"><?=$img_date?></div>
                    </div><!--insta-->
                </div><!--bodys_bod-->
            </div><!--bodys-->
        <?php

            $cot--;
        }
    ?>
        </div><!--container_body-->
    </div><!--title_list_look-->
        <?php
        include('../boardpicture/picturepage.php');
    ?> 
</body>
</html>