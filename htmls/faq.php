<?php
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
    <div class="container">  
        <button id="btn-collapse"> Collapse All  </button>
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
                    Q : 직장인 게시판은 어떤 서비스인가요?   
                </div> 
                <div class="panel-body">
                    <p>A : 직장인들을 위한 커뮤니티이자 SNS입니다. 관심사 기반의 토픽 채널에서
                        다양한 사람들과 자유롭게 대화하고, 소통할 수 있습니다. 
                    </p> 
                </div>
            </div>

            <div class="panel-question">
                <div class="panel-heading"> 
                    Q : 직장인 게시판은 어떤 서비스인가요?   
                </div> 
                <div class="panel-body">
                    <p>A : 직장인들을 위한 커뮤니티이자 SNS입니다. 관심사 기반의 토픽 채널에서
                        다양한 사람들과 자유롭게 대화하고, 소통할 수 있습니다. 
                    </p> 
                </div>
            </div>

            <div class="panel-question">
                <div class="panel-heading"> 
                    Q : 직장인 게시판은 어떤 서비스인가요?   
                </div> 
                <div class="panel-body">
                    <p>A : 직장인들을 위한 커뮤니티이자 SNS입니다. 관심사 기반의 토픽 채널에서
                        다양한 사람들과 자유롭게 대화하고, 소통할 수 있습니다. 
                    </p> 
                </div>
            </div>
        </section>    
    </div>     
<script src="../scripts/faq.js"></script>
</body>
</html>