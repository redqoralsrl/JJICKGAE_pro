<?php
    include '../sql_function.php';

    session_start();

    if(!isset($_SESSION['id'])){
        ?>
        <script>
            alert("Use After Login!");
            location.replace('./index.html');
        </script>
<?php
    }
?>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ | 직장인 게시판</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../styles/faq.css">
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
    <div class="container">  
        <button id="btn-collapse"> 닫기  </button>
        <h2>FAQ</h2>
        <section>
        
            <div class="panel-question active">
                <div class="panel-heading"> 
                    Q : 직장인 게시판은 어떤 서비스인가요?   
                </div>
                <div class="panel-body" id="thisone">
                    <p>A : 직장인들을 위한 커뮤니티이자 SNS입니다. 관심사 기반의 토픽 채널에서
                        다양한 사람들과 자유롭게 대화하고, 소통할 수 있습니다. 
                    </p>    
                </div>
            </div>

            <div class="panel-question">
                <div class="panel-heading"> 
                    Q : 게시글을 신고하고 싶은데 어떡할까요?   
                </div> 
                <div class="panel-body">
                    <p>A : 고객센터에 직접 문의주시면 담당자가 빠른 시일내에 처리하며
                        확인 후 삭제 및 조치를 취하겠습니다.
                    </p> 
                </div>
            </div>

            <div class="panel-question">
                <div class="panel-heading"> 
                    Q : 문의를 하고 싶은데 어떡할까요?  
                </div> 
                <div class="panel-body">
                    <p>A : 메인 페이지의 하단 아래부분에 전화(010-1111-2222) 및
                        이메일 anonymous@gmail.com으로 문의주시면 됩니다.
                    </p> 
                </div>
            </div>

            <div class="panel-question">
                <div class="panel-heading"> 
                    Q : 회원 탈퇴를 하고싶은데 어떡할까요?  
                </div> 
                <div class="panel-body">
                    <p>A : 메인 페이지의 하단 아래부분에 전화(010-1111-2222) 및
                        이메일 anonymous@gmail.com으로 문의주시면 됩니다.<br>
                        고객님의 데이터를 검수 후 제거하기위한 조치이므로 양해바랍니다.
                    </p> 
                </div>
            </div>
            <div class="panel-question">
                <div class="panel-heading"> 
                    Q : 후원 및 광고문의는 어디로 해야되나요?
                </div> 
                <div class="panel-body">
                    <p>A : 메인 페이지의 하단 아래부분에 전화(010-1111-2222) 및
                        이메일 anonymous@gmail.com으로 문의주시면 됩니다.<br>
                        일주일, 한달, 일년 단위로 광고를 게시할 수 있습니다.
                    </p> 
                </div>
            </div>
        </section>    
    </div>     
<script src="../scripts/faq.js"></script>
</body>
</html>