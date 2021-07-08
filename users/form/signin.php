<?php
session_start();

include "../../config/db.php";
include "../../config/config.php";

$msg = "";
use PHPMailer\PHPMailer\PHPMailer;


$email_err = $password_err= ""; 
$email = $password= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  if (empty($_POST["email"])) {
    $email_err = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_err = "Invalid email format"; 
    }
  }
  
  
   if (empty($_POST["password"])) {
    $password_err = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
    // check if name only contains letters and whitespace
   
  }
    
		
	$email = $link->real_escape_string($_POST['email']);
	$password = $link->real_escape_string($_POST['password']);
	$ip = $_SERVER['REMOTE_ADDR'];
	
	
	if($email == "" || $password == ""){
		$msg = "Email or Password fields cannot be empty!";
		
	}else {
		$sql=$link->query("SELECT id,username,email, password, 2fa FROM users WHERE email='$email' AND password= '$password'");
		if($sql->num_rows > 0){
			$data = $sql->fetch_array();
		
				
                         
					if($data['2fa'] == 1){

header("location:../pages/login.php?email=$email");

					}else {

					if($sql1 = "SELECT * FROM users WHERE email='$email'  AND password='$password'"){

                 $result1 = $link->query($sql1);
                 if(mysqli_num_rows($result1) > 0){
                     $row = mysqli_fetch_array($result1);


	             $_SESSION['email']=$_POST['email'];
	               $_SESSION['username']=$row['username'];
				   $_SESSION['refcode']=$row['refcode'];
				   $_SESSION['referred']=$row['referred'];
				   $_SESSION['uid']=$row['id'];
					$_SESSION['profit']=$row['profit'];
					$_SESSION['refbonus']=$row['refbonus'];
					 $_SESSION['walletbalance']=$row['walletbalance'];
					   $_SESSION['session']=$row['session'];
					   $_SESSION['password']=$row['password'];
					   $_SESSION['verify']=$row['verify'];
					   $_SESSION['package']=$row['package'];
					  
					   $_SESSION['pm']=$row['pm'];
					   $_SESSION['eth']=$row['eth'];
					   $_SESSION['btc']=$row['btc'];
					   
					   $_SESSION['2fa']=$row['2fa'];
                     $username= $_SESSION['username'];
					 $emails= $_SESSION['email'];
					 $refcode= $_SESSION['refcode'];
					  $phone= $_SESSION['phone']  = $row['phone'] ;
					   $country= $_SESSION['country'] =  $row['country'];
					    $address= $_SESSION['address'] = $row['address'];
					 
$date = date("Y/m/d");
					header("location:../pages/mypackage.php?Date= $date &username=$username &email=$emails ");
					
					//send email



              require_once "PHPMailer/PHPMailer.php";
              require_once 'PHPMailer/Exception.php';
              
              
              //PHPMailer Object
              $mail = new PHPMailer;
              
              //From email address and name
        $mail->setFrom($emaila);
   $mail->FromName = $name;
              
              //To address and name
              $mail->addAddress($email, $fname);
              $mail->addAddress("$email"); //Recipient name is optional
              
              //Address to which recipient will reply
              
              //Send HTML or Plain Text email
              $mail->isHTML(true);
              
              $mail->Subject = "Account Details";
              
              $mail->Body = '
              
              
               <div style="background: #f5f7f8;width: 100%;height: 100%; font-family: sans-serif; font-weight: 100;" class="be_container"> 

<div style="background:#fff;max-width: 600px;margin: 0px auto;padding: 30px;"class="be_inner_containr"> <div class="be_header">

<div class="be_logo" style="float: left;"> <img src="https://'.$bankurl.'/admin/c2wad/logo/'.$logo.'"> </div>

<div class="be_user" style="float: right"> <p>Dear: '.$username.'</p> </div> 

<div style="clear: both;"></div> 

<div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

<h1>Thank you for investing on '.$name.'</h1>

</div> </div> 

<div class="be_body" style="padding: 20px;"> <p style="line-height: 25px; color:#000;"> 
              
              
              
              
              
              Your account was logged in from '. '(IP: '.$ip.') on '.date("F j, Y, g:i a").', if you did not 
              login from this device, contact your account manager to secure your account.
              
        </p>

<div class="be_footer">
<div style="border-bottom: 1px solid #ccc;"></div>


<div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

<p> Please do not reply to this email. Emails sent to this address will not be answered. 
Copyright ©2020 '.$name.'. </p> <div class="be_logo" style=" width:60px;height:40px;float: right;"> </div> </div> </div> </div></div>      
              
              
              ';
              
              if($mail->send()) {
                
                  $msg =  "Message has been sent successfully!";
              }
                             
                         else{
                              $msg = "Something went wrong. Please try again later!";
                          }
                      
                  }else{
                      $msg = "Cannot Send!";
                  }
              }
					}
              
              
					
					
					
					
				
				 }
			else{
				
				$msg = "Email or Password incorrect!";
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


<div id="google_translate_element" style="margin-left:1%">

</div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
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
<body>
			
<style>
input{

	
}
</style>
						<div class="">
							<!-- /login -->
							   <div class="">
								    <div class="registration">
								
												<div class="signin-form profile"  style="margin-top:50px;background-color:#220a80">
												    
												    
				
					<img src="https://<?php echo $bankurl;?>/admin/c2wad/logo/<?php echo $logo;?>" alt="navbar brand" 
					style="height:40px;width:100px; margin-top:15px;">
					
			
													<h2 style="color:#fff">Member Sign in Form</h2>

													<?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
													<?php if(isset($_GET['success']) && $msg == "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> You have successfully registered. Kindly login.</div class='btn btn-success'>" ."</br></br>";  ?>

													<div class="login-form">
														<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

														
															
															
																<input style="background-color:#fff;" type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>">
                                                                <span class="help-block"><?php echo $email_err; ?></span>
                                                               
															   
																<input style="background-color:#fff;" type="password" name="password" placeholder="Password" value="<?php echo $password; ?>">
                                                                <span class="help-block"><?php echo $password_err; ?></span>

																
																
							</br>
															<div class="tp">
																<input type="submit" style="background-color:#abb4f7" name="submit" value="SIGN In">
															</div>
														</form>
													</div>
													
																										
													 <h6 style="color:#fff">Not  a member &nbsp; <a href="signup.php"> REGISTER</a><h6>
													     <h6 style="color:#fff">Forgot Password &nbsp; <a href="../form/reset.php"> Click</a><h6>
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