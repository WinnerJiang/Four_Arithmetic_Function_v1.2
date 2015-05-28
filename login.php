<?php
/*
 * Created on May 27, 2015
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 * 
 * To establish the MySQL and record the user infomations
 * Author :Winner Jiang
 * 
 * 
 */
 //get the data from login.js
 
$username = $_POST['username'];
$password = $_POST['password'];
$loginOrNot = $_POST['loginOrNot']; //login--true;sign up-- false;
 
 
 // connect with MySQL
 $con = mysql_connect("localhost","root","");
 if(!$con){
 		die('Could not connect:'. mysql_error());
 }
 else{
 	// create the db, if has created then manage the tables
 	if(mysql_query("CREATE DATEBASE userdb",$con)){
 		echo "Database created";
 	}

	mysql_select_db("userdb",$con);
	 	
	//find table userdb, if cannot find, then create one.
	if(mysql_num_rows(mysql_query("SHOW TABLES LIKE '%userinfoTB%'"))==1){
		//userdb table exist
		echo "userinfo table exist";
	}else{
		//userdb tabe not exist and create a new one
		echo "userinfo table not exist";
		$userinfoSql = "CREATE TABLE userinfoTB(" .   //!!!notice: here is "()" not"{}"
					"userid int," .
					"username varchar(15)," .
					"password varchar(20)
			)";
		mysql_query($userinfoSql,$con);
		echo "userinfo table exist now";
	}
	echo "line 48";
	echo $loginOrNot;
	// insert new user and check user has regiestered
	 if($loginOrNot==="true"){
	 	echo "line 52";

 		//login
 		//find the user in userinfoTB
 		
 		
	 }else if($loginOrNot==="false"){
	 	//signup
	 	echo 'line 62';
	   echo $username;
	   echo $password;
	 	$id = mysql_insert_id();
 		echo $id;
 		//insert new user to userinfoTB
 		$insertSql = "INSERT INTO userinfoTB (userid, username,password) VALUES ($id++,$username,$password)";
 		mysql_query($insertSql,$con);
 		
	 }
 		
 
 	
 	
}
 
 	
 
 
 

 
 
 //insert the user info into table userdb
 
 //save the userdb
 
 //
 
 
?>
