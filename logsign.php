<?php
		//check for empty values
		if(!empty($_REQUEST['pass']) and !empty($_REQUEST['username']) and !empty($_REQUEST['lname']) and !empty($_REQUEST['number'])and !empty($_REQUEST['fname'])){

		//fetch data from form input and save as variables	
			$login=$_POST["email"];
			$lname=$_POST["name"];
			$number=$_POST["username"];
			$fname=$_POST["password"];
			$password=$_POST["confirmpassword"];

		//connection with server
			$link1=mysqli_connect("127.0.0.1", "root", ""); // save connection configurations as variable
			mysqli_connect("127.0.0.1", "root", "") or die("Can't connect to server");//open connection with server 
			mysqli_select_db($link1,"usertable") or die("Can't select to db");// select database from server

		//sql query
			$queryvar="INSERT INTO `users`(`username`,`lname`,`fname`,`number`,`password`) VALUES ('$login','$lname','$fname', '$number', '$password')";

		//check for query success
			if(mysqli_query($link1,$queryvar)===TRUE){
				echo "You are successfully registered!";
			}
		// report error if query fails
			else{
				die('error'.mysqli_error($link1));}}
				
		//report if at least one empty field
		else{
			echo "Fields cannot be empty";
		}
?>
