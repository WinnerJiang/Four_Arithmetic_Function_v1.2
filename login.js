$(document).ready(function(){
	
		var username="";
		var password="";
		var confirmPassword="";
		var loginOrNot= true;
	 
	// show username and password textbox
	$("#userLogin").click(function(){
		$("#userLogin").hide();
		$("#confirmPassword").hide();
		$("#newUserSignUp").hide();
		$("#loginOrSignUp").val("Login");
		loginOrNot = true;
	});
	
	//show the confirm password textbox
	$("#newUserSignUp").click(function(){
		$("#confirmPassword").show();
		$("#userLogin").hide();
		$("#newUserSignUp").hide();
		$("#loginOrSignUp").val("Sign up");
		loginOrNot = false;
		
	});
	
	//get the user info and send to backend login.php
	$("#loginOrSignUp").click(function(){
		username = $("#usernameText").val();
		password =  $("#passwordText").val();
		if(loginOrNot ===true){
			//login

			console.log(username);
			console.log(username,password);
		}
		else if(loginOrNot === false){
			//sign up
			confirmPassword = $("#confirmPasswordText").val();
			console.log(username);
			console.log(username,password);
			console.log(confirmPassword);
			if(password !==confirmPassword)
				$("#confirmPwWarningMessage").text ("Password and password confirm values must match!");
		}
			
		sendUserInfoToDB(loginOrNot, username, password);
		
	});
	
	//send the data to login.php
	var  sendUserInfoToDB= function(loginOrNot, username, password){
		$.ajax({
			type:"POST",
			url:"login.php",
			data:{loginOrNot:loginOrNot,username:username,password:password},
			dataType:"json",
			success:function(data){
				console.log(data.sucess);
				getResponse(data);
			}
				
			});
		};
		
		var getResponse = function(data){
			console.log("succes to send data to login.php");
			if(data.sucess=="true"){
				//jump into calculate.html
				location.href='calculate.html'; //上面的相当于<a href="newpage.html" target="_self"><img src="img.jpg" /></a>
//				window.open('caclulate.html'); //相当于<a href="newpage.html" target="_blank"><img src="img.jpg" /></a>
			}
			else if (data.sucess =="false"){
				alert("Log in failed!");
				//refresh the page
				
			}
		};
	
	
	
});