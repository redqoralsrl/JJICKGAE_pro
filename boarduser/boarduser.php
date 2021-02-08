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

    $id = $_SESSION['id'];

    include '../sql_function.php';

    $sql = "
        select * from userdata
        where id='$id'
    ";

    $result = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($result);
    $name = $result['name'];
    $nickname = $result['nickname'];
    $pw = $result['pw'];

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
    <link rel="stylesheet" href="../styles/boarduser.css">
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
    <div class="user-form">
        <div class="user-task">
            <form action="../boarduser/updateUser.php" method="post">
                <div class="user-list">
                    <div class="user-info">회원정보 수정</div>
                    <div class="user-info-comment">- 정보를 수정해도 데이터는 보존됩니다.</div>
                    <ul>
                        <li>
                            <label for="id">아이디</label><br>
                            <input type="text" name="id" value="<?=$id?>" required><br>
                        </li>
                        <li>
                            <label for="pw">패스워드</label><br>
                            <input type="password" name="pw" required><br>
                        </li>
                        <li>
                            <label for="nickname">닉네임</label><br>
                            <input type="text" name="nickname" value="<?=$nickname?>" required><br>
                        </li>
                        <li>
                            <label for="name">이름</label><br>
                            <input type="text" name="name" value="<?=$name?>" required><br>
                        </li>
                    </ul>
                </div>
                <div class="submit-form">
                    <input type="submit" value="수정하기">
                    <input type="reset" vlaue="다시적기">
                </div>
            </form>
        </div>
    </div>

</body>
</html>