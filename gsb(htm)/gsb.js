var btnPop = document.getElementById('btnPop');
var overlay = document.getElementById('overlay');
var popupbtn = document.getElementById('popupbtn');
var btnclose = document.getElementById('btnclose');

btnPop.addEventListener('click', openModal);

btnclose.addEventListener('click',closePopup);


function openModal(){
    overlay.style.display = "block";
}

function closePopup(){
    overlay.style.display = 'none';
}