<?php


include "../../config/db.php";
include "../../config/config.php";

$msg = "";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$username=$_GET['username'];
$email=$_GET['email'];



if(isset($_SESSION['email'])){
	



}
else{


	header("location:../form/signin.php");
}




if(isset($_POST['switch'])){
    
    $profit = $_POST['profit'];
     $email = $_POST['email'];
    
       $pp =   $percentage;     
    
	
	 $sql = "UPDATE users SET activate = '0',pdate = '0',walletbalance= walletbalance + $profit  WHERE email='$email'";
	 
	 
  if(mysqli_query($link, $sql)){
	
$msg = "Package Ended with profit of $profit you can now switch or enjoy a new package !";

  }else{
      
      $msg = "Package cannot be ended/switched!";
  }
}














if(isset($_POST['activate'])){
	
	
  $email = $_POST['email'];
  $usd = $_POST['usd'];
  $cdate = date('Y-m-d H:i:s');


  $sql2= "SELECT * FROM users WHERE email= '$email'";
  $result2 = mysqli_query($link,$sql2);
  if(mysqli_num_rows($result2) > 0){
   $row = mysqli_fetch_assoc($result2);
   $row['walletbalance'];
   $row['activate'];
   $from = $row['froms'];
   $bonus = $row['bonus'];
   $pname1 = $row['pname'];
 

    $sql1 = "UPDATE users SET activate = '1',pdate='$cdate',usd='$usd',walletbalance= walletbalance + $bonus  WHERE email='$email'";
    
    
		
	
  
 

  if(isset($row['activate']) &&  $row['activate'] == '1'){

    $msg = "package is already active!";

  }else{
	
if(isset($row['walletbalance']) && isset($row['froms']) && $row['walletbalance'] >= $from && $row['walletbalance'] >= $usd && $usd >= $from){


  mysqli_query($link, $sql1);
	
  $msg = "Your package is successfully activated!";
	 
  include_once "PHPMailer/PHPMailer.php";
    require_once 'PHPMailer/Exception.php';
  
    $mail= new PHPMailer();
     $mail->setFrom($emaila);
   $mail->FromName = $name;
    $mail->addAddress($email, $username);
    $mail->Subject = "Package Activated";
    $mail->isHTML(true);
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

Your package of '.$pname1.'  has been activated successfully. Thank you for investing in us! 

</p>

<div class="be_footer">
<div style="border-bottom: 1px solid #ccc;"></div>


<div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

<p> Please do not reply to this email. Emails sent to this address will not be answered. 
Copyright ©2020 '.$name.'. </p> <div class="be_logo" style=" width:60px;height:40px;float: right;"> </div> </div> </div> </div></div>';
    
    
    if($mail->send()){
  
      
    }

}else{
		

    $msg = "Package cannot be activated, insufficient balance or amount less than package minimum value ! ";
}
    }
  }

}
	
   
 


include 'header.php';





?>



<link rel="stylesheet" href="http://cdn.datatables.net/plug-ins/a5734b29083/integration/bootstrap/3/dataTables.bootstrap.css"/>
    <link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css"/>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/responsive/1.0.2/js/dataTables.responsive.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/a5734b29083/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">

   

<div class="panel-header bg-primary-gradient">
						<div class="page-inner py-5">
							<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
								<div>
									<h2 class="text-white pb-2 fw-bold">My Investment Package</h2>







                  
									<h5 style="color:#fff" class="text-white op-7 mb-2"><marquee style="color:#fff" width="50%" >Thanks for investing in <?php  echo $name;?> have a nice day!</marquee></h5>
								</div>
								</br>


              

								<div class="ml-md-auto py-2 py-md-0">
									
 <input type="text" id="myInput" style="width:70%; padding:4px; border-radius:5%;" value="https://<?php echo $bankurl;?>/users/form/signup.php?refcode=<?php echo $_SESSION['refcode'];?>" readonly="true"/>
 <button class="btn btn-secondary" onclick="myFunction()">Click to copy Referral link</button>
								</div>
							</div>
						</div>
				


<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
  {
  "symbols": [
    {
      "title": "S&P 500",
      "proName": "OANDA:SPX500USD"
    },
    {
      "title": "Nasdaq 100",
      "proName": "OANDA:NAS100USD"
    },
    {
      "title": "EUR/USD",
      "proName": "FX_IDC:EURUSD"
    },
    {
      "title": "BTC/USD",
      "proName": "BITSTAMP:BTCUSD"
    },
    {
      "title": "ETH/USD",
      "proName": "BITSTAMP:ETHUSD"
    }
  ],
  "colorTheme": "dark",
  "isTransparent": false,
  "displayMode": "adaptive",
  "locale": "en"
}
  </script>
</div>


               
              
            </div>


		<?php

$sql2= "SELECT * FROM users WHERE email= '$email'";
$result2 = mysqli_query($link,$sql2);
if(mysqli_num_rows($result2) > 0){
 $row = mysqli_fetch_assoc($result2);
 $pdate = $row['pdate'];
 $duration = $row['duration'];
 $increase = $row['increase'];
 $usd = $row['usd'];
}


        if(isset($row['pdate']) &&  $row['pdate'] != '0' && isset($row['duration'])  && isset($row['increase'])  && isset($row['usd']) ){
         
          $endpackage = new DateTime($pdate);
          $endpackage->modify( '+ '.$duration. 'day');
 $Date2 = $endpackage->format('Y-m-d');
 $current=date("Y/m/d");

 $diff = abs(strtotime($Date2) - strtotime($current));
 $one = 1;

          $date3 = new DateTime($Date2);
           $date3->modify( '+'. $one.'day');
           $date4 = $date3->format('Y-m-d');

 $days=floor($diff / (60*60*24));
 
 
$daily = $duration - $days;
$percentage = ($increase/100) * $daily * $usd;




 
 


?>

<?php


 $one = 1;
$f = date('Y-m-d', strtotime($Date2 . ' + '. $one.'day'));

if(isset($days) && $days == 0 || $Date2 == (date("Y/m/d"))  ){
    
       $pp =   $percentage;     
    
	
	 $sql = "UPDATE users SET activate = '0',pdate = '0',walletbalance= walletbalance + $pp  WHERE email='$email'";
	 
	 
  if(mysqli_query($link, $sql)){
	
	$percentage = $pp = 0;
	
		$Date2 = 0;
	$current = 0;
	$duration = 0;

	$days = 'package completed &nbsp;&nbsp;<i style="color:green; font-size:20px;" class="fa  fa-check" ></i>';
	$days = 0;
	$Date2 = 0;
	$current = 0;
	$duration = 0;

  }
}else{
$_SESSION['pprofit'] = $percentage;
}





     
$add="days";
       
 }else {
   $daily ="";
   $percentage ="";
   $Date = "0";
   $days ="No active days";
   $diff = "";
   $Date2 = 'No active date';
 }
if(isset($_SESSION['pprofit'])){

  $profit = $_SESSION['pprofit'];
}else{
  session_destroy($_SESSION['pprofit']);
  $profit = "";
}
 


		?>
		</br>
	<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6046604f1c1c2a130d664c93/1f09eged9';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
	</body>
</html>

<p id="demo"></p>
</br>
 <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
         
         
         
         
         
         
         
         
         	<?php $sql= "SELECT * FROM users WHERE email='$email'";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
				  $row = mysqli_fetch_assoc($result);  

$row['activate'];
$row['pdate'];
   
   
if(isset($row['activate']) &&  $row['activate']== '1'){
	
	
	$sec = 'Active &nbsp;&nbsp;<i style="background-color:green;color:#fff; font-size:20px;" class="fa  fa-refresh" ></i>';

}else{
$sec ='Not Active &nbsp;&nbsp;<i class="fa  fa-times" style=" font-size:20px;color:red"></i>';
$usd = 'No investment';
}



   
if(isset($row['pdate']) &&  $row['pdate']== '0'){
	
	
	$date = 'Not Yet Started &nbsp;&nbsp;<i style="background-color:red;color:#fff; font-size:20px;" class="fa  fa-times" ></i>';
  $start= $row['duration'];
}else{
$date = $row['pdate'];
$start= $row['date'];
}





				  ?>
         












         <form action="mypackage.php?Date = <?php  echo date("Y/m/d");?>&email=<?php  echo $_SESSION['email'];?>" method="post">






         <div class="page-inner " style="margin-top:-50px">


						<div class="row row-card-no-pd mt--2">
							<div class="col-sm-6 col-md-4  col-xs-6" >
								<div class="card card-stats card-round" style="background-color:purple">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="fa fa-users " style="color:#fff"></i>
												</div>
											</div>
											<div class="col-7 col-stats" >
												<div class="numbers">

                      

													<p class="card-category" style="color:#fff">Investment Type</p>
													<h4 class="card-title" style="color:#fff"><?php echo $row['pname'];?></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-4 col-xs-6">
								<div class="card card-stats card-round" style="background-color:#2949a3">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="flaticon-coins " style="color:#fff"></i>
												</div>
											</div>
											<div class="col-7 col-stats">
												<div class="numbers">


													<p class="card-category" style="color:#fff">Daily Profit</p>
													<h4 class="card-title" style="color:#fff"><?php echo $row['increase'];?>%</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>


							<div class="col-sm-6 col-md-4">
								<div class="card card-stats card-round" style="background-color:purple">
									<div class="card-body">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="flaticon-error" style="color:#fff"></i>
												</div>
											</div>
											<div class="col-7 col-stats">
												<div class="numbers">
              

													<p class="card-category" style="color:#fff">Total Profit</p>
													<h4 class="card-title" style="color:#fff"> $ <?php echo $percentage;?></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>






              </div>
              
              
        
     














              <div class="row row-card-no-pd mt--2">
							<div class="col-sm-6 col-md-4  " >
								<div class="card card-stats card-round" style="background-color:orange">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="fa fa-users " style="color:#fff"></i>
												</div>
											</div>
											<div class="col-7 col-stats" >
												<div class="numbers">

													<p class="card-category" style="color:#fff">Activation Date</p>
													<h4 class="card-title" style="color:#fff"><?php echo $date;?></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-4">
								<div class="card card-stats card-round" style="background-color:#2949a3">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="flaticon-coins " style="color:#fff"></i>
												</div>
											</div>
											<div class="col-7 col-stats">
												<div class="numbers">


													<p class="card-category" style="color:#fff">End Date</p>
													<h4 class="card-title" style="color:#fff"><?php echo $Date2;?></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>


							<div class="col-sm-6 col-md-4">
								<div class="card card-stats card-round" style="background-color:orange">
									<div class="card-body">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="flaticon-error" style="color:#fff"></i>
												</div>
											</div>
											<div class="col-7 col-stats">
												<div class="numbers">
              

													<p class="card-category" style="color:#fff">Days To End</p>
													<h4 class="card-title" style="color:#fff"> <?php echo $days;?></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>






              </div>


















              <div class="row row-card-no-pd mt--2">
							<div class="col-sm-6 col-md-4  " >
								<div class="card card-stats card-round" style="background-color:teal">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="fa fa-users " style="color:#fff"></i>
												</div>
											</div>
											<div class="col-7 col-stats" >
												<div class="numbers">

                      

													<p class="card-category" style="color:#fff">Amount Invested</p>
													<h4 class="card-title" style="color:#fff"><?php echo $usd;?></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-4">
								<div class="card card-stats card-round" style="background-color:#2949a3">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="flaticon-coins " style="color:#fff"></i>
												</div>
											</div>
											<div class="col-7 col-stats">
												<div class="numbers">


													<p class="card-category" style="color:#fff">Status</p>
													<h4 class="card-title" style="color:#fff"><?php echo $sec ;?></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>


							<div class="col-sm-6 col-md-4">
								<div class="card card-stats card-round" style="background-color:green">
									<div class="card-body">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="flaticon-error" style="color:#fff"></i>
												</div>
											</div>
											<div class="col-7 col-stats">
												<div class="numbers">
              

													<p class="card-category" style="color:#fff">Amount to Invest</p>
													<h4 class="card-title" style="color:#fff"> <input name="usd" placeholder="Amount to invest" type="double" style="border-radius:5px;width:100%;" ></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>






              </div>





 
              <input type="hidden" name="email" value="<?php echo $row['email'];?>"> 
         
          
      
         
         <input type="hidden" name="email" value="<?php echo $_GET['email'];?>">
         
         <input type="hidden" name="profit" value="<?php echo $percentage;?>">






              <div class="row row-card-no-pd mt--2">
							<div class="col-sm-6 col-md-4  " >
								<div class="card card-stats card-round" style="background-color:indigo">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="fa fa-users " style="color:#fff"></i>
												</div>
											</div>
											<div class="col-7 col-stats" >
												<div class="numbers">

                      

													<p class="card-category" style="color:#fff">Action</p>
													<h4 class="card-title" style="color:#fff"><button style="width:100%;" class="btn btn-success" type="submit" name="activate" ><span class="glyphicon glyphicon-check"> Activate</span></button></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-4">
								<div class="card card-stats card-round" style="background-color:#2949a3">
									<div class="card-body ">
										<div class="row">
										
											<div class="col-7 col-stats">
												<div class="numbers">


													<p class="card-category" style="color:#fff">Action</p>
													<h4 class="card-title" style="color:#fff"><button style="width:100%;" type="submit" name="switch" class="btn btn-primary">Switch Package/ End Package</button></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>


					






              </div>
            
              </form>


</tr>
<?php

}
?>
            
		 <?php
		 
		 include 'footer.php';
		 
		 ?>   
            
            
           
</div> 
            









