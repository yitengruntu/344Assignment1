var xmlHttp
function checkUsername(){
    var username = document.getElementById('username').value;

    if(username == ''){
        document.getElementById('usererror').innerHTML="Please enter a username.";
        return false;
    }
	document.getElementById('usererror').innerHTML="";
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null){
		alert ("Browser does not support HTTP Request");
		return;
	} 
	var url="checkUser.php";
	url=url+"?username="+username;
	url=url+"&sid="+Math.random();
	xmlHttp.onreadystatechange=stateChanged ;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);

    return true;
}
function stateChanged() { 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
	if(xmlHttp.responseText!="")
		document.getElementById("usererror").innerHTML=xmlHttp.responseText 
	}
	var check=/[a-zA-Z]/;
	if(!check.test(document.getElementById("usererror").innerHTML)){
		document.getElementById("usererror").innerHTML='';
	}
}

function GetXmlHttpObject(){
var xmlHttp=null;
try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 // Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}
function checkPassword(){
    var password = document.getElementById('password').value;
	var passwordcheck =/[a-zA-Z]*[0-9][a-zA-Z]*[0-9][a-zA-Z]*/;
	var passwordcheck2 =/[a-zA-Z]/;
	if(password==''){
		document.getElementById('passworderror').innerHTML="Please enter a password.";
		return false;
	}
	if(!(passwordcheck.test(password) && password.length==8 && passwordcheck2.test(password))){
        document.getElementById('passworderror').innerHTML="A password should contain totally 8 letters and numbers, and it contains at least two digit numbers.";
        return false;
    }
	document.getElementById('passworderror').innerHTML="";
    return true;
}
function checkRePassword(){
	var repassword = document.getElementById('repassword').value;
	if(repassword!=document.getElementById('password').value){
		document.getElementById('repassworderror').innerHTML="Please enter the same password.";
        return false;
    }
	document.getElementById('repassworderror').innerHTML="";
    return true;
}
function checkFullname(){
    var fullname = document.getElementById('fullname').value;
    if(fullname == ''){
        document.getElementById('fullnameerror').innerHTML="Please enter your full name.";
        return false;
    }
	document.getElementById('fullnameerror').innerHTML="";
    return true;
}
function checkStreet(){
    var streetno = document.getElementById('streetno').value;
	var streetname=document.getElementById('streetname').value;
	var suburbcity=document.getElementById('suburbcity').value;
	var numbercheck=/[0-9]/;
	var postcode=document.getElementById('postcode').value;
	var postcheck=/[a-zA-Z]/;
	if(streetno == ''){
        document.getElementById('streeterror').innerHTML="Please enter the street number.";
        return false;
    }
    else if(!numbercheck.test(streetno)){
        document.getElementById('streeterror').innerHTML="Please enter the correct street number.";
        return false;
    }else if(streetname == ''){
        document.getElementById('streeterror').innerHTML="Please enter the street name.";
        return false;
    }else
	document.getElementById('streeterror').innerHTML="";
	if(suburbcity == ''){
	    document.getElementById('addresserror').innerHTML="Please enter the Suburb/City.";
        return false;
	}else if(postcode == ''){
	    document.getElementById('addresserror').innerHTML="Please enter the postcode.";
        return false;
	}else if(postcheck.test(postcode)||postcode.length<4){
		document.getElementById('addresserror').innerHTML="Please enter the correct postcode (4 digits)."
		return false;
	}
	document.getElementById('addresserror').innerHTML="";
    return true;
}
function checkEmail(){
	var email=document.getElementById('email').value;
	var emailCheck=/^[a-z0-9A-Z]+([-_\.][a-z0-9A-Z]+)*@([a-z0-9A-Z]+([-_][a-z0-9A-Z]+)*\.)+[a-z0-9A-Z]+$/;	
	if(!emailCheck.test(email)){
		document.getElementById('emailerror').innerHTML="Please enter correct Email address."
		return false;
	}
	document.getElementById('emailerror').innerHTML="";
    return true;
}
function checkStudentname(){
    var studentname = document.getElementById('studentname').value;
    if(studentname == ''){
        document.getElementById('nameerror').innerHTML="Please enter student name.";
        return false;
    }
	document.getElementById('nameerror').innerHTML="";
    return true;
}
function checkClass(){
    var classname = document.getElementById('classname').value;
    if(classname == ''){
        document.getElementById('classerror').innerHTML="Please enter class number.";
        return false;
    }
	document.getElementById('classerror').innerHTML="";
    return true;
}
function checkCard(){
    var creditcardno = document.getElementById('creditcardno').value;
	var creditcardnocheck =/[a-zA-Z]/;
	if(creditcardno==''){
		document.getElementById('CCNerror').innerHTML="Please enter the credit card number.";
		return false;
	}
	if(creditcardnocheck.test(creditcardno) || creditcardno.length<10){
        document.getElementById('CCNerror').innerHTML="Please enter the correct credit card number (10 digits)";
        return false;
    }
	document.getElementById('CCNerror').innerHTML="";
    return true;
}
function checkDate(){
	var month = document.getElementById('purchase_creditCardExpirationMonth').value;
	var year = document.getElementById('purchase_creditCardExpirationYear').value;
	if(month==''){
		document.getElementById('dateerror').innerHTML="Please select the Expiry Date.";
		return false;
	}	
	if(year==''){
		document.getElementById('dateerror').innerHTML="Please select the Expiry Date.";
		return false;
	}
	document.getElementById('dateerror').innerHTML="";
	return true;
}
function checkAll(){
	if(document.getElementById('usererror').innerHTML!=""){
		alert("Invalid Information");
		return false;
	}
	if(!checkUsername()||!checkPassword()||!checkRePassword()||!checkFullname()||!checkStreet()||!checkEmail()||!checkStudentname()||!checkClass()||!checkCard()||!checkDate()){
		checkUsername();
		checkPassword();
		checkRePassword();
		checkFullname();
		checkStreet();
		checkEmail();
		checkStudentname();
		checkClass();
		checkCard();
		checkDate();
		alert("Invalid Information");
	return false;
}	
	return true;

}


