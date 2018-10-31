<?php
	session_start();
	$db=mysqli_connect("localhost","root","","hows");
	if(isset($_POST['sigbtn'])){

			header("location:2a.php");
	}
	if(isset($_POST['logbtn'])){

		$username=mysqli_real_escape_string($db,$_POST['name']);
		
		$pass1=mysqli_real_escape_string($db,$_POST['pass1']);
		
		$pass1=md5($pass1);
		$sql="SELECT * FROM users WHERE name='$username' AND password='$pass1'";
		$result=mysqli_query($db,$sql);

		if(mysqli_num_rows($result)==1){

			$_SESSION['message']="You are now logged in";
			$_SESSION['username']=$username;
			header("location:search.php");


		}
		else{
			//alert("Password and username do not match!");
			$message = "Password and username do not match!";
			echo "<script type='text/javascript'>alert('$message');</script>";
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

if(t==0){

	//document.location.href = "search.php";

}

}
	</script>

<div class = "title">
<h1>My Search engine</h1>
</div>
<form method="post" action="login.php" id="myform">
<table>
		<tr>
			<td>
				Username:
			</td>
			<td><input type="text" name="name" class="textInput" id="name"></td>
		</tr>
		<tr>
			<td>
				Password:
			</td>
			<td><input type="password" name="pass1" class="textInput" id="pass1"></td>
			
		</tr>
		<tr>
			<td>
				
			</td>
			<td><input type="submit" name="logbtn" value="Log In" ></td>
			
		</tr>
		<tr>
			<td>
				
			</td>
			<td><input type="submit" name="sigbtn" value="Sign Up" ></td>
			
		</tr>
</table>
</form>
<script src="signup.js"></script>
</body>
</html>
