<?php
    session_start();
?>
<!DOCTYPE html>
<?php
    $conn = mysqli_connect('localhost','root','brian1313','jjick');
?>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>직장인게시판 로그인</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../styles/login.css">
</head>
<body>
    <div class="main-container">
        <div class="main-wrap">
           <header>
               <div class="logo-jj">
                <a href="../index.html"> <img class="logo" src="../images/logo.jpg"> </a></div>
           </header>
            <section class="login-input-section">
                <form action="../login_register/login_check.php" method="POST">
                    <div class="login-email">
                            <input type="text" name="id" class="e-mail" placeholder="아이디"></input>
                    </div>
                    <div class="login-password">
                            <input type="password" name="pw" class="psw" placeholder="비밀번호"></input>
                    </div>
                    <div class="btn-login">
                        <button class="sign"><strong>로그인</strong></button>
                    </div>
                </form>
                <div class="other-log">
        
                        
                        <div class="find-info">
                            <a href="">아이디 찾기 </a>
                            <span class="bar" id=idinquiry>|</span>

                            <a href="" id = "pwinquiry">비밀번호 찾기</a>

                            <span class="bar" id=join>|</span>

                            <a href="../login_register/register.html">회원가입</a>
                        </div>
                     


                </div>
           </section>
            <footer>
                <div class="copyright">
                    <span>Copyright © JJIK-GAE Corp. ALL Rights Reserved.</span>
                </div>
            </footer>    
               
           
        </div> 

    </div>

    
</body>
</html>