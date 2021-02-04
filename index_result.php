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
    <link rel="stylesheet" href="./styles/style.css">
    <!-- fontawesome 링크 -->
    <script src="https://kit.fontawesome.com/47be955b75.js" crossorigin="anonymous"></script>
    <!-- jQuery 링크 -->
    <script src="./scripts/jQueryFile/jQuery/jquery-3.5.1.js"></script>
</head>
<body>
    <header class="header-bar">
        <div class="header-bar-logo">
            <a href="./index_result.php"><img src="./images/logo.png"></a>
        </div>
        <ul class="search-main">
            <li><input class="search" type="text" placeholder="검색어 입력"><button class="btn-search"><strong>검색</strong></button></li>
        </ul>
        <ul class="header-bar-icons">
            <li><a href="./boarduser/boarduser.php" class="login">마이페이지</a></li>
            <li><a href="./login_register/login_out.php" class="register">로그아웃</a></li>    
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
                    <li><a href="./boardFree/free.php">자유게시판</a></li>
                    <li><a href="#">익명게시판</a></li>
                    <li><a href="#">신문고 게시판</a></li>
                    <li><a href="./board/board_free.php?page=1">투데이 게시판</a></li>
                    <li><a href="./boarduser/boarduser.php">내 정보수정</a></li>
                    <li><a href="./htmls/faq.html">고객센터</a></li>
                </ul>
            </div>
        </div>
    </div>
    <nav>
        <div class="board">
            <div class="board-upside">
                <ul class="image-list">
                    <li>
                        <a href="#">
                            <div class="image-area">
                                <img src="./images/bool.png">
                            </div>
                            <div class="comment-area">
                                <p>자유게시판</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="image-area">
                                <img src="./images/zipper2.jpg">
                            </div>
                            <div class="comment-area">
                                <p>익명게시판</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="image-area">
                                <img src="./images/news.png">
                            </div>
                            <div class="comment-area">
                                <p>오늘의 토픽</p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="board-downside">
                <ul class="image-list">
                    <li>
                        <a href="#">
                            <div class="image-area">
                                <img src="./images/writing.jpg">
                            </div>
                            <div class="comment-area">
                                <p>한마디 게시판</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="image-area">
                                <img src="./images/siren.jpg">
                            </div>
                            <div class="comment-area">
                                <p>고발게시판</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="image-area">
                                <img src="./images/calling.jpg">
                            </div>
                            <div class="comment-area">
                                <p>고객센터</p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section>
        <div class="slide">
            <div class="slide-menubar">
                <div class="slide-title">오늘의 뉴스</div>
                <div class="slide-click"><a href="#">게시글 가기<i class="fas fa-chevron-circle-right"></i></a></div>
            </div>
            <div class="slide-images">
                <div class="slide-left">
                    <div class="slide-upside">
                        <div class="one">
                            <a href="https://www.ajunews.com/view/20201223101821468"><img src="./images/pic1.jpg"></a>
                            <span class="texts">
                                <br><p>내년 연봉 오를까?<br>기업 절반.. 24%만 인상</p>        
                            </span>
                        </div>
                        <div class="two">
                            <a href="https://fcysm.tistory.com/8?category=816642"><img src="./images/pic2.jpg"></a>
                            <span class="texts">
                                <p>한국&미국주식 <br>무슨 차이가 있을까?
                                <br></p>
                            </span>
                        </div>
                    </div>
                    <div class="slide-downside">
                        <a href="https://blog.naver.com/peppersavingsbank_1/222147750408"><img src="./images/pic3.png"></a>
                        <span class="texts">
                            <p>직장인 연말정산</p>
                            어떻게 해야할까?<br>
                        </span>
                    </div>
                </div>
                <div class="slide-right">
                    <div class="one-right">
                        <a href="https://www.fnnews.com/news/202102031136064328"><img src="./images/pic4.jpg"></a>
                        <span class="texts">
                            <p>고용부</p>
                            1분기 예산 투입<br>
                            고용정책....
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer-bar">
            <div class="footer-left">
                <ul>
                    <li>
                        <img src="./images/gps.png">
                        <p>서울특별시 강동구 천호동</p>
                    </li>
                    <li>
                        <img src="./images/phone.png">
                        <p>010-1111-2222</p>
                    </li>
                    <li>
                        <img src="./images/email.png">
                        <p>anonymous@gmail.com</p>
                    </li>
                </ul>
            </div>
            <div class="footer-right">
                <p id="main"><strong>JJIK GAE</strong> </p>
                <p> 점점 증가하는 직장인 인원 대비 부족한 커뮤니티 사이트에 대한 needs를
                    충족시키고자 생긴 사이트로<br> 단순 직장인들의 정보 공유 뿐만이 아닌 편안한
                    소통 공간 제공 및 교류를 위한 사이트이다. </p>
            </div>

        </div>
    </footer>
    <!-- 돌아가기 메뉴 -->
    <div>
        <a  id="back-to-top" href="#">Top</a>
    </div>
    <script src="./scripts/scripts.js"></script>
</body>
</html>