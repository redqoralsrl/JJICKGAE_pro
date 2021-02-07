// 아이디
let id = document.getElementById('username_or_email');
let message = document.getElementById('idErrorMessage');
// 닉네임
let nick = document.getElementById('nickName');
let message_n = document.getElementById('nickErrorMessage');
// 패스워드
let pw1 = document.getElementById('user_pw1');
let message_p = document.getElementById('pw1ErrorMessage');
// 재확인
let pw2 = document.getElementById('user_pw2');
let message_p2 = document.getElementById('pw2ErrorMessage');
// 이름확인
let name = document.getElementById('user_name');
let message_name = document.getElementById('nameErrorMessage');

let id_change = t => {
    // 사용자에게 error 메세지를 알릴 수 있는 문구 설정
    message.innerHTML = " ";

    // 문자수가 최소 5이상이여야 한다ㅏ
    if(t.value.length < 5){
        message.innerHTML = "Error, length validation: " + t.value.length;
    }
    
    // 영문 숫자로만 입력받는 조건문
    var myRe = /^[a-z0-9]+$/i;
    var myArray = myRe.exec(t.value);
    if(myArray == null){
        message.innerHTML = "Error, number and character: " + t.value.length;
    }

    // 영문 숫자로 작성이 되었다면 영문과 숫자가 한개씩 포함되어 있는가를 확인하는 조건문
    var checkNumber = t.value.search(/[0-9]/g);
    var checkEnglish = t.value.search(/[a-z]/ig);
    if(checkNumber < 0 || checkEnglish < 0){
        message.innerHTML = "숫자 영문 조합으로 입력해주세요."
    }
}

// 닉네임은 한글도 허용하게 한글 추가
// 나머지는 위와 동일
let nick_change = n => {
    message_n.innerHTML = " ";
    if(n.value.length < 5){
        if(n.value.length < 5){
            message_n.innerHTML = "Error, length validation: " + t.value.length;
        }
        // 한글, 영어(대소문자), 특수문자 가능
        var myRes = /^[ㄱ-ㅎ|가-힣|a-z|A-Z|0-9|\*]+$/;
        // 한글 영어만 사용, 특수문자 금지
        // var myRes = /[\[\]{}()?|`~!@#$%^&*-_+=,.;:\"\\\'\\]/g;
        var myArrays = myRes.exec(n.value);
        if(myArrays == null){
            message_n.innerHTML = "Error, number and charcactre" + n.value;
        }
    }
}

// 비밀번호 확인 1차
let pw1 = document.getElementById('user_pw1');
let message_p = document.getElementById('pw1ErrorMessage');

let pw1_change = p => {
    // 사용자에게 error 메세지를 알릴 수 있는 문구 설정
    message_p.innerHTML = " ";
    
    // 비밀번호 6자리가 아니면 오류 출력
    if(p.value.length < 6){
        message_p.innerHTML = "Error, length validation: " + p.value.length;
    }
    
    // 비밀번호 검토
    var myRe1 = /^[a-z0-9]+$/i;
    var myArray1 = myRe1.exec(p.value);
    if(myArray1 == null){
        message_p.innerHTML = "Error, number and character"; 
    }

    // 조건 확인
    var checkNumber = p.value.search(/[0-9]/g);
    var checkEnglish = p.value.search(/[a-z]/ig);
    if(checkNumber < 0 || checkEnglish < 0){
        message_p.innerHTML = "숫자 영문 조합으로 입력해주세요.";
    }
}

// 비밀번호 1차와 2차 확인
let pw2_change = p2 => {
    message_p2.innerHTML = " ";
    if(pw1.value != pw2.value){
        message_p2.innerHTML = "Error, 비밀번호를 재확인 해주세요.";
    }
}

// 이름확인
let name_change = name => {
    // 사용자에게 error 메세지를 알릴 수 있는 문구 설정 
    message_name.innerHTML = " ";

    // 한글과 영어로만 작성하도록 설정
    var myRE2 = /^[가-힣|a-z|A-Z|\*]+$/;
    var myArray2 = myRE2.exec(name.value);
    if(myArray2 == null){
        message_name.innerHTML = "정확히 입력해주세요.";
    }
}

