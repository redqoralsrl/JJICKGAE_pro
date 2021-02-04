var btnCollapse =document.getElementById('btn-collapse');
var heading = document.getElementsByClassName('panel-heading');
var question = document.getElementsByClassName('panel-question');
var answer = document.getElementsByClassName('panel-body');

for(var i=0; i < heading.length; i++){
    heading[i].addEventListener('click',function(ev){
        for(var j=0; j < question.length; j++){
            question[j].classList.remove('active');
            ev.target.parentNode.classList.add('active');
            activateBody();
        }
    });

}
function activateBody(){
    for(var x=0; x < answer.length; x++ ){
        answer[x].style.display = 'none';
    }
    var activePanel = document.querySelector('.panel-question.active .panel-body');
    activePanel.style.display="block" ;
}
activateBody();

btnCollapse.addEventListener('click',function(){
    for(var i=0; i<answer.length; i++){
        answer[i].style.display = 'none';
    }
});