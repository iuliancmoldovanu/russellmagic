
// <![CDATA[
var ck_name = /[\w ]{3,30}/;
var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i 
var ck_phone =  /^[0-9+]{11,20}$/;
var ck_text = /[\w ]{3,100}/;

function validate(form){

	var name = form.name.value;
	var email = form.email.value;
	var phone = form.phone.value;
	var enquiries = form.enquiries.value;


	var errors = [];
	if (!ck_name.test(name)) {
		form.name.style.background = '#FFE8E8';
		errors[errors.length] = ' Please enter your name.';
	}else{
		form.name.style.background = '#FFF';
	}
	if (!ck_phone.test(phone)) {
		form.phone.style.background = '#FFE8E8';
		errors[errors.length] = ' Please enter a valid mobile number.';
	}else{
		form.phone.style.background = '#FFF';
	}
	if (!ck_email.test(email)) {
		form.email.style.background = '#FFE8E8';
		errors[errors.length] = ' Please enter a valid email address.';
	}else{
		form.email.style.background = '#FFF';
	}
	if (!ck_text.test(enquiries)) {
		form.enquiries.style.background = '#FFE8E8';
		errors[errors.length] = ' Please enter your enquiries.';
	}else{
		form.enquiries.style.background = '#FFF';
	}	
	
	if (errors.length > 0) {
		reportErrors(errors);
		return false;
	}
}
function reportErrors(errors){
	if(errors.length == 1){
		var msg = "Sorry, we've got an error.";
	}else if(errors.length <= 7){
		var msg = "Sorry, we've got " + errors.length + " errors";
	}else{
		var msg = "<br />Sorry, we've got too many errors.<br />Please check all red fields.";
		document.getElementById('error_div').innerHTML = msg;
		return false;
	}
	for (var i = 0; i<errors.length; i++) {
		var numError = i + 1;
		msg += '\n' + numError + '. ' + errors[i];
	}
	alert(msg);
}
// ]]>

// CONTACT FLAGS // 
var uk = document.getElementById('info_uk');
uk.onmouseover = function(){
document.getElementById('display_info').innerHTML = '<div id="div_info"><h4>Mrs Coufal</h4><h5>Phone: 0044 (0) 771.265.0770</h5></div>';
document.getElementById('email_h').style.display = 'none';
}
uk.onmouseout = function (){
document.getElementById('display_info').innerHTML = '';
document.getElementById('email_h').style.display = '';
}
var ro = document.getElementById('info_ro');
ro.onmouseover = function(){
document.getElementById('display_info').innerHTML = '<div id="div_info"><h4>Mr Stefan</h4><h5>Phone: 0040 (0) 740.194.195</h5></div>';
document.getElementById('email_h').style.display = 'none';
}
ro.onmouseout = function (){
document.getElementById('display_info').innerHTML = '';
document.getElementById('email_h').style.display = '';
}
var es = document.getElementById('info_es');
es.onmouseover = function(){
document.getElementById('display_info').innerHTML = '<div id="div_info"><h4>Mr Vick</h4><h5>Phone: 0034 (0) 665.706.963</h5></div>';
document.getElementById('email_h').style.display = 'none';
}
es.onmouseout = function (){
document.getElementById('display_info').innerHTML = '';
document.getElementById('email_h').style.display = '';
}
var ar = document.getElementById('info_ar');
ar.onmouseover = function(){
document.getElementById('display_info').innerHTML = '<div id="div_info"><h4>Mrs Speranta</h4><h5>Phone: 0097 (0) 155.497.5254</h5></div>';
document.getElementById('email_h').style.display = 'none';
}
ar.onmouseout = function (){
document.getElementById('display_info').innerHTML = '';
document.getElementById('email_h').style.display = '';
}
var ml = document.getElementById('info_ml');
ml.onmouseover = function(){
document.getElementById('display_info').innerHTML = '<div id="div_info"><h4>Mr Lilian</h4><h5>Phone: 0037 (0) 379.440.308</h5></div>';
document.getElementById('email_h').style.display = 'none';
}
ml.onmouseout = function (){
document.getElementById('display_info').innerHTML = '';
document.getElementById('email_h').style.display = '';
}
var it = document.getElementById('info_it');
it.onmouseover = function(){
document.getElementById('display_info').innerHTML = '<div id="div_info"><h4>Mr Mariano</h4><h5>Phone: 0039 (0) 342.508.3513</h5></div>';
document.getElementById('email_h').style.display = 'none';
}
it.onmouseout = function (){
document.getElementById('display_info').innerHTML = '';
document.getElementById('email_h').style.display = '';
}
var cp = document.getElementById('info_cp');
cp.onmouseover = function(){
document.getElementById('display_info').innerHTML = '<div id="div_info"><h4>Mr Daniel</h4><h5>Phone: 0035 (0) 797.666.175</h5></div>';
document.getElementById('email_h').style.display = 'none';
}
cp.onmouseout = function (){
document.getElementById('display_info').innerHTML = '';
document.getElementById('email_h').style.display = '';
}
var be = document.getElementById('info_be');
be.onmouseover = function(){
document.getElementById('display_info').innerHTML = '<div id="div_info"><h4>Mr Ciprian</h4><h5>Phone: 0032 (0) 648.164.578</h5></div>';
document.getElementById('email_h').style.display = 'none';
}
be.onmouseout = function (){
document.getElementById('display_info').innerHTML = '';
document.getElementById('email_h').style.display = '';
}