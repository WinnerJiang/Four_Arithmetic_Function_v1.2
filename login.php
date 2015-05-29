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
 
 $tableIsReady= false;
 $response =array();
 
 // connect with MySQL
 $con = mysql_connect("localhost","root","");
 if(!$con){
 		die('Could not connect:'. mysql_error());
 }
 else{
 	// create the db, if has created then manage the tables
 	if(mysql_query("CREATE DATEBASE userdb",$con)){
// 		echo "Database created";
 	}

	mysql_select_db("userdb",$con);
	 	
	//find table userdb, if cannot find, then create one.
	if(mysql_num_rows(mysql_query("SHOW TABLES LIKE 'userinfoTB'"))==1){
		//userdb table exist
//		echo "userinfo table exist";
		$tableIsReady = true;
	}else{
		//userdb tabe not exist and create a new one
//		echo "userinfo table not exist";
		$userinfoSql = "CREATE TABLE userinfoTB(userid int NOT NULL AUTO_INCREMENT,username varchar(15),password varchar(20),PRIMARY KEY (userid))AUTO_INCREMENT=1";
//		echo $userinfoSql;
		mysql_query($userinfoSql,$con);
//		echo "userinfo table exist now";
		$tableIsReady = true;
	}

	if($tableIsReady){
			// insert new user and check user has regiestered
		 if($loginOrNot==="true"){
	 		//login
	 		//chech whether the user in userinfoTB
	 		$checkUserSql =  "SELECT * FROM  userinfoTB  WHERE username='".$username."'and password='".$password."'";
//	 		echo $checkUserSql;
//	 		var_dump($checkUserSql);
	 		$checkRes =mysql_num_rows( mysql_query($checkUserSql,$con));
	 	//ss	echo $checkRes;
	 		if($checkRes){
//	 			 echo "user have signed up";
	 			 $response = array('sucess'=>'true');
	 			 echo json_encode($response);
	 		}
	 		else{
//	 			echo "there is no res"; 	
				$response = array('sucess'=>'false'); 		
	 			echo json_encode($response);
	 		} 
	 			
	 		
	 		
	 		
		 }else if($loginOrNot==="false"){
		 	//signup
//		   echo $username;
//		   echo $password;
	
	 		//insert new user to userinfoTB
	 		$insertSql = "INSERT INTO userinfoTB (userid, username, password) VALUES (null,'".$username."','".$password."')";
	 		//$insertSql = "INSERT INTO userinfoTB ('".$username."','".$password."')";
//	 		echo $insertSql;
	 		mysql_query($insertSql,$con);
	     }
		
	}

 		
 
 	
 	
}
 		
 	
 
 
 

 
 
 //insert the user info into table userdb
 
 //save the userdb
 
 //
 
 
?>
