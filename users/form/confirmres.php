<?php
session_start();
include "../../config/db.php";
include "../../config/config.php";
$msg = "";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$id = $_GET['id'];
$email = $_GET['email'];


if (isset($_POST['submit'])) {
 
  	
	$password = $link->real_escape_string($_POST['password']);
	
		$email= $link->real_escape_string($_POST['email']);
		
		$id= $link->real_escape_string($_POST['id']);

	
	if($password == "" ){
		$msg = "password fields cannot be empty!";
		
	}else {
	    
					$sql = "UPDATE users  SET password = '$password'  WHERE id= '$id' ";

          if($result = mysqli_query($link, $sql)){
        
 $msg = "Password Reset Successful!.";
}
               
             else{
                $msg = "error!.";
            }
        }
         
				 
		
	}




?>
<div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script> 

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


<!DOCTYPE html>
<html lang="zxx">
<head>
<title>Crypto investment</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/snow.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/component.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style_grid.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome-icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome-icons -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>

<style>
#inp{
   border-radius:5px; 
    background-color:#fff;
}    
 #den{
        border-radius:5px; 
     background-color:#8ca2bf;
     color:green;
     margin-top:100px;
 } 

</style>
<body>
			

						<div class="">
							<!-- /login -->
							   <div class="">
								    <div class="registration">
								
												<div id="den" class="signin-form profile">
													<h2 style="color:#fff;font-family:Comic Sans MS;">Password Reset</h2>

													<?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>

													<div class="login-form">
														<form  action="confirmres.php?id=<?php echo $id;?>&email=<?php echo $email;?>" method="POST">

														
															
															
																<input id="inp" type="text" name="password" placeholder="Enter your new password" >
                                                               
                                                               
															   
													<input id="inp" type="hidden" name="email" value="<?php echo $email;?>" >
                                                    
                                                    <input id="inp" type="hidden" name="id" value="<?php echo $id;?>" >
                                                                
																
																
							</br>
															<div class="tp">
																<input type="submit" name="submit" value="Reset">
															</div>
														</form>
													</div>
													
																						     
												</div>
										</div>
										<!--copy rights start here-->
											<div class="copyrights_agile">
											<p>© 2020 <?php echo $name;?>. All Rights Reserved</a> </p>
											</div>	
										
						    </div>
						</div>


<!-- js -->

          <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		  <script src="js/modernizr.custom.js"></script>
		
		   <script src="js/classie.js"></script>
		 <script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>


</body>
</html>