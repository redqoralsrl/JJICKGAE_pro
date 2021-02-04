function login() {
    const form = document.login_form;
    const chkUsername = checkValidUsername(form);
    const chkUserID = checkValidUserID(form);
    const chkUserNickname = checkValidNickname(form);
    const chkEmail = checkValidEmail(form);
    const chkPw = checkValidPassword(form);
    const chkPw2 = checkValidPassword2(form);

    if (chkUsername) {
        document.getElementById('alert_username').innerText = "";
        form.name.style.border = '2px solid';
        form.name.style.borderColor = '#00D000';
    } else {
        form.name.style.border = '2px solid';
        form.name.style.borderColor = '#FF0000';
        document.getElementById('alert_username').style.color = '#FF0000';
    }

    if (chkUserID) {
        document.getElementById('alert_userid').innerText = "";
        form.id.style.border = '2px solid';
        form.id.style.borderColor = '#00D000';
    } else {
        form.id.style.border = '2px solid';
        form.id.style.borderColor = '#FF0000';
        document.getElementById('alert_userid').style.color = '#FF0000';
    }

    if (chkUserNickname) {
        document.getElementById('alert_usernickname').innerText = "";
        form.nickname.style.border = '2px solid';
        form.nickname.style.borderColor = '#00D000';
    } else {
        form.nickname.style.border = '2px solid';
        form.nickname.style.borderColor = '#FF0000';
        document.getElementById('alert_usernickname').style.color = '#FF0000';
    }

    if (chkEmail) {
        document.getElementById('alert_email').innerText = "";
        form.email.style.border = '2px solid';
        form.email.style.borderColor = '#00D000';
    } else {
        form.email.style.border = '2px solid';
        form.email.style.borderColor = '#FF0000';
        document.getElementById('alert_email').style.color = '#FF0000';
    }

    if (chkPw) {
        document.getElementById('alert_password').innerText = "";
        form.pw.style.border = '2px solid';
        form.pw.style.borderColor = '#00D000';
    } else {
        form.pw.style.border = '2px solid';
        form.pw.style.borderColor = '#FF0000';
        document.getElementById('alert_password').style.color = '#FF0000';
    }
    if (chkPw2) {
        document.getElementById('alert_password2').innerText = "";
        form.password2.style.border = '2px solid';
        form.password2.style.borderColor = '#00D000';
    } else {
        form.password2.style.border = '2px solid';
        form.password2.style.borderColor = '#FF0000';
        document.getElementById('alert_password2').style.color = '#FF0000';
    }

    if (chkUsername && chkUserID && chkUserNickname && chkEmail && chkPw && chkPw2) {
        console.log('complete. form.submit();');
        //form.submit();
    }
}

function checkValidUsername(form) {
    if (form.name.value == "") {
        document.getElementById('alert_username').innerText = "Please enter username.";
        //form.username.focus();
        return false;
    }

    return true;
}
function checkValidUserID(form) {
    if (form.id.value == "") {
        document.getElementById('alert_userid').innerText = "Please enter userID.";
        //form.username.focus();
        return false;
    }

    return true;
}
function checkValidNickname(form) {
    if (form.nickname.value == "") {
        document.getElementById('alert_usernickname').innerText = "Please enter usernickname.";
        //form.username.focus();
        return false;
    }

    return true;
}
function checkValidEmail(form) {
    if (form.email.value == "") {
        document.getElementById('alert_email').innerText = "Please enter email.";
        //form.email.focus();
        return false;
    }

    const exptext = /^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/;

    // "ㅁ@ㅁ.ㅁ" 이메일 형식 검사.
    if (exptext.test(form.email.value) === false) {
        document.getElementById('alert_email').innerText = "Email is not valid.";
        //form.email.select();
        return false;
    }

    return true;
}

function checkValidPassword(form) {
    if (form.pw.value == "") {
        document.getElementById('alert_password').innerText = "Please enter password.";
        //form.password.focus();
        return false;
    }

    const pw = form.pw.value;
    // String.prototype.search() :: 검색된 문자열 중에 첫 번째로 매치되는 것의 인덱스를 반환한다. 찾지 못하면 -1 을 반환한다.
    // number
    const num = pw.search(/[0-9]/g);
    // alphabet
    const eng = pw.search(/[a-z]/ig);
    // special characters
    const spe = pw.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);

    if (pw.length < 6) {
        // 최소 6문자.
        document.getElementById('alert_password').innerText = "Password must be at least 6 characters.";
        return false;
    } else if (pw.search(/\s/) != -1) {
        // 공백 제거.
        document.getElementById('alert_password').innerText = "Please enter your password without spaces.";
        return false;
    } else if (num < 0 && eng < 0 && spe < 0) {
        // 한글과 같은 문자열 입력 방지.
        document.getElementById('alert_password').innerText = "Password is not valid.";
        return false;
    }

    return true;
}

function checkValidPassword2(form) {
    if (form.password2.value == "") {
        document.getElementById('alert_password2').innerText = "Password2 is required.";
        //form.password.focus();
        return false;
    }

    if (form.pw.value !== form.password2.value) {
        document.getElementById('alert_password2').innerText = "Password and password2 is not match.";
        form.pw.style.border = '2px solid';
        form.pw.style.borderColor = '#FF0000';
        document.getElementById('alert_password').style.color = '#FF0000';
        return false;
    }

    return true;
}