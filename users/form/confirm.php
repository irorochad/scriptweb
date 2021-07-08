<?php
require_once "../../config/db.php";function redirect(){
	header("Location: signin.php");
	exit();
}

if(!isset($_GET['email']) || !isset($_GET['token'])){
	
	redirect();
	
}else{
	
	$email =$link->real_escape_string($_GET['email']);
	$token =$link->real_escape_string($_GET['token']);
	
	$sql=$link->query("SELECT id FROM users WHERE email='$email' AND token='$token'
	AND confirm=0
		
	");
	if($sql->num_rows > 0){
		
		$link->query("UPDATE users SET confirm=1,token='' WHERE email='$email'");
		redirect();
	}else{
		
		redirect();
	}
	
}


?>