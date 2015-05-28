$(document).ready(function(){
	
		var username="";
		var password="";
		var confirmPassword="";
		var login= true;
	 
	// show username and password textbox
	$("#userLogin").click(function(){
		$("#userLogin").hide();
		$("#confirmPassword").hide();
		$("#newUserSignUp").hide();
		$("#loginOrSignUp").val("Login");
		login = true;
	});
	
	//show the confirm password textbox
	$("#newUserSignUp").click(function(){
		$("#confirmPassword").show();
		$("#userLogin").hide();
		$("#newUserSignUp").hide();
		$("#loginOrSignUp").val("Sign up");
		login = false;
		
	});
	
	//get the user info and send to backend login.php
	$("#loginOrSignUp").click(function(){
		username = $("#usernameText").val();
		password =  $("#passwordText").val();
		if(login ===true){
			//login

			console.log(username);
			console.log(username,password);
		}
		else if(login === false){
			//sign up
			confirmPassword = $("#confirmPasswordText").val();
			console.log(confirmPassword);
			if(password !==confirmPassword)
				$("#confirmPwWarningMessage").text ("Password and password confirm values must match!");
		}
			
		sendUserInfoToDB(login, username, password);
		
	});
	
	//send the data to login.php
	function sendUserInfoToDB(username,password){
		$.ajax({
			type:"POST",
			url:"login.php",
			data:{loginOrSignup:login,username:username,password:password},
			dataType:"json",
			success:function(data){
				console.log("succes to send data to login.php");
				}
			}
		});
	}
	
	
});