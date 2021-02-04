<?php
$conn =mysqli_connect(
    'localhot',
    'root',
    '950419',
    'BBS');

    $sql = "SELECT*FROM user";
    $result = mysqli_query($conn,$sql);




?>


<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>직장인 게시판 회원가입</title>
    <link rel="stylesheet" href="../styles/register.css">
</head>
<body>
    <div id="header">
        <div class="logo">
            <a href="/index.html"><img src="/images/logo.png" ></a>
        </div>
    </div>
    <div id="main">

        <div class="auth">
            <h3>
                <a href="/index.html"> 직장인 게시판</a>
            </h3>
        </div>    


            <form action="" id="oauth_form" target="_self" method="post">
                <fieldset class="sign-up">
                    <span><strong>회원가입</strong></span><hr>
                    <div class="last-name">
                        <input type="text" aria-required="true" placeholder="성">
                    </div>
                    <div class="first-name">
                        <input type="text" aria-required="true" placeholder="이름">
                    </div>
                    <div class="row-user">
                        <input type="text" aria-required="true" autocapitalize="off" autocorrect="off" autofocus="autofocus" id="username_or_email" placeholder="아이디 또는 이메일" value>
                    </div>
                    <div class="row-password">
                        <input type="text" aria-required="true" class="password text" id="password" placeholder="비밀번호" value >
                    </div>
                    <div class="check-password">
                        <input type="text" aria-required="true" class="password text" id="password" placeholder="비밀번호 확인" value >
                    </div>
                  
                </fieldset>
                <fieldset class="buttons">
                    
                    <input type="submit" value="가입하기"  class="submit-btn" >

                    <input type="submit" value="취소"  class="cancel">
                </fieldset>
            </form>
            <div class="permissions">
                <p>
                    <strong>커뮤니티에 허용되는 작업:</strong>
                </p>
                <ul class="permissions">
                    <li>타임라인에서 비공개 게시글을 비롯한 게시글과 리스트 및 댓글을 봅니다.</li>
                    <li>내  프로필 정보 및 계정 설정을 확인합니다.</li>
                    <li>내가 팔로우하고, 뮤트하고, 차단한 계정을 확인합니다.</li>
                    <li>게시글을 작성하거나 삭제합니다.</li>
                    <li>내 게시글 및 계정 설정을 업데이트합니다.</li>
                    <li>게시글을 작성하거나 삭제하고 다른 사람의 게시물에 마음에 들어요, 마음에 들어요 취소 또는 답글 등으로 참여합니다.</li>
                    <li>나를 위한 리스트와 컬렉션을 만들고, 관리하고, 삭제합니다.</li>
                    <li>계정을 뮤트하거나, 차단하거나, 신고합니다.</li>
                    <li>이메일 주소 확인하기</li>
                </ul>
            </div>
           
        
    </div>

    <div class="footer">
        <div id="ft">
           
         
        </div>
    </div>
</body>
</html>