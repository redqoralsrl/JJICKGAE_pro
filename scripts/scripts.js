// 햄버거 메뉴
const toggleBtn = document.querySelector('.header-toogleBtn');
const logReg = document.querySelector('.header-bar-icons')
toggleBtn.addEventListener('click',() => {
    logReg.classList.toggle('active');
});

// top 스크롤 코드
var btt = document.getElementById('back-to-top'),
    docElem = document.documentElement,// 문서 전체 높이
    offset, // 스크롤했을때 푸터까지 남은 여백
    scrollPos, // 스크롤 한 위치
    docHeight; // 문서 높이

// 문서 높이 계산 -> scrollHeigh와 offsetHeight 중 높이가 높은걸 사용
docHeight = Math.max(docElem.scrollTop, docElem.offsetHeight);
if(docHeight != 'undefined'){
    offset = docHeight / 1000;
}
// 이벤트
window.addEventListener('scroll',function(){
    scrollPos = docElem.scrollTop;
    // console.log(scrollPos);

    // btt.className = (scrollPos > offset) ? 'visible' : '';
    if(scrollPos > offset){
        btt.className = 'visible';
    }else{
        btt.className = '';
    }
});
btt.addEventListener('click',function(ev){
    ev.preventDefault(); // 링크의 본연의 기능을 막는다.
    // docElem.scrollTop = 0;
    scrollToTop();

});
function scrollToTop(){
    // 일정 시간마다 할일
    // setInterval 할일, 시간
    // 0.0015 = 15
    // 할일 = function(){ 실제로 할일 }
    // 윈도우 스크롤이 0이 아닐때
    // 실제로 할일 window.scrollBy(0,-55);
    var scrollInterval = setInterval(function(){
        if(scrollPos != 0){
            window.scrollBy(0,-55);
        }else{
            clearInterval(scrollInterval);
        }
    },15);
}

