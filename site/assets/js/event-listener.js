// JavaScript Document
var elUsername = document.getElementById('username');
var elPassword = document.getElementById('password');
function checkInput(minLength, inputEl, inputFB) {
	
	var elInput = document.getElementById(inputEl);
	var elMsg = document.getElementById(inputFB);
	var elFormGroup = elInput.parentElement;
	
	elFormGroup.classList.remove('has-error');
	elFormGroup.classList.remove('has-success');
	
	
	if(elInput.value.length == 0){ //default
		elMsg.innerHTML = '';
	} 
	
	else if (elInput.value.length < minLength){ //error
		elMsg.innerHTML = inputEl + ' must be '+minLength+' characters or more';
		elFormGroup.classList.add('has-error');
	}
	else{//success
		elMsg.innerHTML='';	
		elFormGroup.classList.add('has-success');
	}
}

elUsername.addEventListener('blur', function() {
	checkInput(5, 'username', 'UNfeedback');
	},false);

elPassword.addEventListener('blur', function() {
	checkInput(8, 'password', 'PWfeedback');
	},false);