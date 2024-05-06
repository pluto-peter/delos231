let toggleBtn = document.querySelector('.menubtn');
let over = document.querySelector('.side-bar');


toggleBtn.addEventListener('click', navToggle);
function navToggle() {
    over.classList.toggle('show');
}




/* 
let btn = document.querySelector('.ham');
let over = document.querySelector('.overlay');
let menu = document.querySelector('.menu-mobile');

btn.addEventListener('click', navToggle);
function navToggle(){
	btn.classList.toggle('cross');
	over.classList.toggle('show');
	document.body.classList.toggle('stop-scroll');
	menu.classList.toggle('bringup')
} */