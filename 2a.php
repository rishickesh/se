<?php
	//session_start();
	$db=mysqli_connect("localhost","root","","hows");

	if(isset($_POST['regbtn'])){
		//session_start();
		$username=mysqli_real_escape_string($db,$_POST['name']);
		$email=mysqli_real_escape_string($db,$_POST['email']);
		$pass1=mysqli_real_escape_string($db,$_POST['pass1']);
		$pass2=mysqli_real_escape_string($db,$_POST['pass2']);
		$number=mysqli_real_escape_string($db,$_POST['connum']);
		
		$t=$_POST["hiddencontainer"];
		if($t==0){

			$password=md5($pass1);
			$sql="INSERT INTO users(name,email,password,numb) VALUES ('$username','$email','$password','$number')";
			mysqli_query($db,$sql);
			header("location:search.php");
		}
	
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>
Registration form
</title>
<link rel = "stylesheet" type="text/css" href="signup.css">
</head>

<body background = "Signup.jpg">
	<script type="text/javascript">
		function signUpValidate(){
	var t=0;
	//var form=document.getElementById("myform");
	var myhidden = document.getElementById("hiddencontainer");
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
{alert("Password length must be between 3 and 14");t=1;}

if(psw1!=psw2)
{alert("Passwords do not match");t=1;}

if(!connumPattern.test(num))
{alert("Contact Number must have 10 numbers");t=1;}

if(!emailPattern.test(email))
{alert("Enter a valid Email ID");t=1;}

myhidden.value=t;

return t;

if(t==0){

	//document.location.href = "search.php";

}

}
	</script>

<div class = "title">
<h1>My Search engine</h1>
</div>
<form method="post" action="2a.php" id="myform">
	<input type="hidden" id="hiddencontainer" name="hiddencontainer"/>
	<table>
		<tr>
			<td>
				Username:
			</td>
			<td><input type="text" name="name" class="textInput" id="name"></td>
		</tr>
		<tr>
			<td>
				Email:
			</td>
			<td><input type="text" name="email" class="textInput" id="emailid"></td>
			
		</tr>
		<tr>
			<td>
				Number:
			</td>
			<td><input type="number" name="connum" class="textInput" id="connum"></td>
			
		</tr>
		<tr>
			<td>
				Password:
			</td>
			<td><input type="password" name="pass1" class="textInput" id="pass1"></td>
			
		</tr>
		<tr>
			<td>
				Re-Enter Password:
			</td>
			<td><input type="password" name="pass2" class="textInput" id="pass2"></td>
			
		</tr>
		<tr>
			<td>
				
			</td>
			<td><input type="submit" name="regbtn" value="Register" onclick="signUpValidate()"></td>
			
		</tr>
	</table>

</form>

</body>
</html>





