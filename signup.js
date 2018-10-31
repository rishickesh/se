function signUpValidate(){
	var t=0;
	//var form=document.getElementById("myform");
var name = document.getElementById("name").value;
var psw1 = document.getElementById("pass1").value;
var psw2 = document.getElementById("pass2").value;
var num = document.getElementById("connum").value;
var email = document.getElementById("emailid").value;

if(name == "" || psw1 == "" || psw2 == "" || num == "" || email == "")
{alert("Do not leave the fields empty");t=1;}

var passwordPattern = /^[a-zA-Z]\w{3,14}$/;
var connumPattern = new RegExp("^[0-9]{10}$");
var emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/

if(!passwordPattern.test(psw1) || !passwordPattern.test(psw2))
{alert("Password must contain numbers, special characters, upper and lower case letters with length between 8 and 12");t=1;}

if(psw1!=psw2)
{alert("Passwords do not match");t=1;}

if(!connumPattern.test(num))
{alert("Contact Number must have 10 numbers");t=1;}

if(!emailPattern.test(email))
{alert("Enter a valid Email ID");t=1;}

if(t==0){

	document.location.href = "search.php";

}

}