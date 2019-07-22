var registerForm=document.queryselector('.register');
var inputsForm=registerForm.elements;


var nameValue=inputsForm[0].value;
var emailValue=inputsForm[1].value;
var fileValue=inputsForm[2].value;
var fecha-nacValue=inputsForm[3].value;
var passValue=inputsForm[4].value;
var confPassValue=inputsForm[5].value;
var answerValue=inputsForm[7].value;
console.log(nameValue);

nameValue.onblur = function () {
	var alertMsg = this.parentElement.querySelector('.invalid-feedback');
	if (this === '' || this.length < 3) {
		this.classList.add('is-invalid');
		alertMsg.innerHTML = 'El <b>nombre</b> no puede estar vacío';
	} else {
		this.classList.remove('is-invalid');
		this.classList.add('is-valid');
		alertMsg.innerHTML = '';
	}
};
var regexEmail = /\S+@\S+\.\S+/;

  emailValue.onblur = function () {
	var alertMsg = this.parentElement.querySelector('.invalid-feedback');
	if (this === '') {
		this.classList.add('is-invalid');
		alertMsg.innerHTML = 'El <b>correo</b> no puede estar vacío';
	} else if (!regexEmail.test(this)) {
		this.classList.add('is-invalid');
		alertMsg.innerHTML = 'El formato de correo no es un email valido';
	} else {
		this.classList.remove('is-invalid');
		this.classList.add('is-valid');
		alertMsg.innerHTML = '';
	}
};
}
