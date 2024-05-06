let firstNameError = document.querySelector('.fnameerror');
let lastNameError = document.querySelector('.lnameerror');
let phoneError = document.querySelector('.phoneerror');
let emailError = document.querySelector('.emailerror');
let submitError = document.querySelector('.submiterror');

function validateName(){
	 var name = document.querySelector('.name1').value;
	 
	 if(name.length == 0){
		 firstNameError.innerHTML = '<img src="images/circle-xmark.svg">&nbsp;Enter First Name';
		 return false;
	 }
	 if(!name.match(/^[A-Za-z]*$/)){
		 firstNameError.innerHTML = '<img src="images/circle-xmark.svg">&nbsp;Enter a Valid Name';
		 return false;
	 }
	 firstNameError.innerHTML = '<img src="images/check.svg" class="check">';
	 return true;
}

function validatName(){
	 var lname = document.querySelector('.name2').value;
	 
	 if(lname.length == 0){
		 lastNameError.innerHTML = '<img src="images/circle-xmark.svg">&nbsp;Enter Last Name';
		 return false;
	 }
	 if(!lname.match(/^[A-Za-z]*$/)){
		 lastNameError.innerHTML = '<img src="images/circle-xmark.svg">&nbsp;Enter a Valid Name';
		 return false;
	 }
	 lastNameError.innerHTML = '<img src="images/check.svg" class="check">';
	 return true;
}

function validatePhone(){
	 var phone = document.querySelector('.name3').value;
	 
	 if(phone.length == 0){
		 phoneError.innerHTML = '<img src="images/circle-xmark.svg">&nbsp;Enter Mobile Phone Number';
		 return false;
	 }
	 if(phone.length !== 10){
		 phoneError.innerHTML = '<img src="images/circle-xmark.svg">&nbsp;Enter a Valid Mobile Phone Number';
		 return false;
	 }
	 if(!phone.match(/^[0-9]{10}$/)){
		 lastNameError.innerHTML = 'Digits Only';
		 return false;
	 }
	 phoneError.innerHTML = '<img src="images/check.svg" class="check">';
	 return true;
}

function validateEmail(){
	 var email = document.querySelector('.name4').value;
	 
	 if(email.length == 0){
		 emailError.innerHTML = '<img src="images/circle-xmark.svg">&nbsp;Enter Email Address';
		 return false;
	 }	 
if(!email.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)){
		 emailError.innerHTML = '<img src="images/circle-xmark.svg">&nbsp;Invalid Email Address';
		 return false;
	 }
	 emailError.innerHTML = '<img src="images/check.svg" class="check">';
	 return true;
}

function validateAll(){
	 if(!validateName() || !validatName() || !validatePhone() || !validateEmail()){
		 submitError.style.display = 'block';
		 submitError.innerHTML = '<img src="images/circle-xmark.svg">&nbsp;Check Errors to Continue';
		 setTimeout(function(){
			 submitError.style.display = 'none';
			 },3000);
		 return false;
	 }
}