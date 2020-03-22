const popup = document.querySelector(".add-gender");
popup.addEventListener('click', function(){
	document.getElementById("gender-popup").classList.toggle('open');
	document.getElementById("cover").classList.toggle('open');
});

const popup_close = document.querySelector(".gender-popup-close");
popup_close.addEventListener('click', function(){
	document.getElementById("gender-popup").classList.toggle('open');
	document.getElementById("cover").classList.toggle('open');
});