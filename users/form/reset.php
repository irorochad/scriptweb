<?php
session_start();
include "../../config/db.php";
include "../../config/config.php";

$msg = "";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  if (empty($_POST["email"])) {
    $msg = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    
    }
  	
	$email = $link->real_escape_string($_POST['email']);
	
	
	if($email == "" ){
		$msg = "email fields cannot be empty!";
		
	}else {
   

					$sql = "SELECT * FROM users WHERE email = '$email' ";

          $result = mysqli_query($link, $sql);
          if(mysqli_num_rows($result) == 1){
             $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
            

           
            
		  require_once "PHPMailer/PHPMailer.php";
          require_once 'PHPMailer/Exception.php';


//PHPMailer Object
$mail = new PHPMailer;

//From email address and name
     $mail->setFrom($emaila);
   $mail->FromName = $name;

//To address and name
$mail->addAddress($email);


//Address to which recipient will reply

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "Password Reset";
$mail->Body ='
              
              
               <div style="background: #f5f7f8;width: 100%;height: 100%; font-family: sans-serif; font-weight: 100;" class="be_container"> 

<div style="background:#fff;max-width: 600px;margin: 0px auto;padding: 30px;"class="be_inner_containr"> <div class="be_header">

<div class="be_logo" style="float: left;"> <img src="https://'.$bankurl.'/admin/c2wad/logo/'.$logo.'" alt="navbar brand" 
					style="height:40px;width:100px; margin-top:15px;"> </div>

<div class="be_user" style="float: right">  </div> 

<div style="clear: both;"></div> 

<div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

<h1>Thank you for investing on '.$name.'</h1>

</div> </div> 

<div class="be_body" style="padding: 20px;"> <p style="line-height: 25px;">

<p>Click on the link below to Reset your password</p>
</br>
<a href="https://'.$bankurl.'/users/form/confirmres.php?id='.$id.'&email='.$email.'
">Click here to reset password</a>

<div class="be_footer">
<div style="border-bottom: 1px solid #ccc;"></div>


<div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

<p> Please do not reply to this email. Emails sent to this address will not be answered. 
Copyright ©2020 '.$name.'. </p> <div class="be_logo" style=" width:60px;height:40px;float: right;"> </div> </div> </div> </div></div>      
              
              
              ';

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    $msg =  "Check Your Email and follow the link to reset your password";
}
               
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
				 
		
		
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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
														<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

														
															
															
																<input placeholder="Enter your email" id="inp" type="email" name="email" >
                                                                <span class="help-block"><?php echo $email_err; ?></span>
                                                               
															   
															
																
																
							</br>
															<div class="tp">
																<input type="submit" name="submit" value="Reset">
															</div>
														</form>
													</div>
													
																						 <h6>Back to login &nbsp; <a href="signin.php"> LOGIN</a><h6>
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