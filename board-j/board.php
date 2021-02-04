<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JJICK GAE</title>
    <link rel="stylesheet" href="../board/board.css" >
    <script src="https://kit.fontawesome.com/47be955b75.js" crossorigin="anonymous"></script>
    <script src="./scripts/jQueryFile/jQuery/jquery-3.5.1.js"></script>

</head>

<body>
    <header class="header-bar">
        <div class="header-bar-logo">
            <a href=""><img src="./images/logo.png"></a>
        </div>
        <ul class="search-main">
            <li><input class="search" type="text" placeholder="검색어 입력"><button class="btn-search"><strong>검색</strong></button></li>
        </ul>
        <ul class="header-bar-icons">
            <li><a href="./htmls/login.html" class="login">로그인</a></li>
            <li><a href="./htmls/register.html" class="register">회원가입</a></li>    
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
                    <li><a href="#">자유게시판</a></li>
                    <li><a href="#">익명게시판</a></li>
                    <li><a href="#">신문고게시판</a></li>
                    <li><a href="#">오늘의한마디</a></li>
                    <li><a href="#">나의정보</a></li>
                    <li><a href="#">고객센터</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <?php
                $connect = mysqli_connect('localhost', 'root', '950419', 'BBS') or die ("connect fail");
                $query ="select * from board order by number desc";
                $result = $connect->query($query);
                $total = mysqli_num_rows($result);
 
        ?>
        <h2>신문고 게시판</h2>
        <div class="box">
        <table >
            <thead >
                <tr>
                <td width = "50" align="center">번호</td>
                <td width = "500" align = "center">제목</td>
                <td width = "100" align = "center">작성자</td>
                <td width = "200" align = "center">날짜</td>
                <td width = "50" align = "center">조회수</td>



                </tr>
            </thead>
 
        <tbody>
        <?php
                while($rows = mysqli_fetch_assoc($result)){ //DB에 저장된 데이터 수 (열 기준)
                        if($total%2==0){
        ?>                      <tr class = "even">
                        <?php   }
                        else{
        ?>                      <tr>
                        <?php } ?>
                <td width = "50" align = "center"><?php echo $total?></td>
                <td width = "500" align = "center">
                <a href = "view.php?number=<?php echo $rows['number']?>">
                <?php echo $rows['title']?></td>
                <td width = "100" align = "center"><?php echo $rows['id']?></td>
                <td width = "200" align = "center"><?php echo $rows['date']?></td>
                <td width = "50" align = "center"><?php echo $rows['hit']?></td>
                </tr>
        <?php
                $total--;
                }
        ?>



        </tbody>
        </table>
        </div>        
        <div class = text>
        <button onClick="location.href='./write.php'">등록</button>
        </div>
 
 
 
 




    <footer>

    </footer>
    <!-- 돌아가기 메뉴 -->
   
    <script src="./scripts/scripts.js"></script>
</body>
</html>