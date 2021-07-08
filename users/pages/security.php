<?php
session_start();
include "../../config/db.php";
include "../../config/config.php";

$msg = "";
use PHPMailer\PHPMailer\PHPMailer;


$email=$_GET['email'];


if(isset($_SESSION['email'])){
	

  $sql = "UPDATE users SET session='1' WHERE email='$email'";

  mysqli_query($link, $sql) or die(mysqli_error($link));


}
else{


header("location:../form/signin.php");
}

$sql1= "SELECT * FROM users WHERE email = '$email'";
  $result1 = mysqli_query($link,$sql1);
  if(mysqli_num_rows($result1) > 0){
   $row = mysqli_fetch_assoc($result1);
   $row['2fa'];
 
  }
 
if(isset($row['2fa']) &&  $row['2fa']==1){
	$sec = '2FA Activated &nbsp;&nbsp;&nbsp;&nbsp;<i style="color:green; font-size:25px;" class="fa  fa-check" ></i>';

}else{
$sec ='2FA Not Activated &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa  fa-times" style=" font-size:25px;color:red"></i>';
}


$email= $_SESSION['email'];

$sql1= "SELECT * FROM users WHERE email = '$email'";
					$result1 = mysqli_query($link,$sql1);
					
					if(mysqli_num_rows($result1) > 0){
					 $row = mysqli_fetch_assoc($result1);
					 $row['2fa'];
					 }

if(isset($_POST['activate'])){


	
	
	
	$sql = "UPDATE users SET 2fa='0' WHERE email='$email'";

				  if (mysqli_query($link, $sql)) {

					
					
				   if(isset($row['2fa']) && $row['2fa'] == 1){

					$msg = "2FA Already activated!";


				   }else{
					
					header("location:generate.php?email=$email");
				}
						   } else {
						$msg= " Cannot activate 2FA ";
						 }
						} 






if(isset($_POST['deactivate'])){



	
	
		$sql = "UPDATE users SET 2fa='0' WHERE email='$email'";
	
					  if (mysqli_query($link, $sql)) {
	
	  	
					  $sq = "DELETE FROM tfa WHERE email='$email'";
					  mysqli_query($link, $sq);
				   $msg= " You have successfully deactivated 2FA security reload page";
	
							   } else {
							$msg= " Cannot Deactivate 2FA ";
							 }
							} 





include "header.php";

?>



<style>
body{
	background-color: #F7F7F7;
}
</style>
    


<div class="panel-header bg-primary-gradient">
						<div class="page-inner py-5">
							<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
								<div>
									<h2 class="text-white pb-2 fw-bold">Security Control</h2>







                  
									<h5 style="color:#fff" class="text-white op-7 mb-2"><marquee style="color:#fff" width="50%" >Thanks for investing in <?php  echo $name;?> have a nice day!</marquee></h5>
								</div>
								</br>


              

								<div class="ml-md-auto py-2 py-md-0">
									
 <input type="text" id="myInput" style="width:70%; padding:4px; border-radius:5%;" value="https://<?php echo $bankurl;?>/users/form/signup.php?refcode=<?php echo $_SESSION['refcode'];?>" readonly="true"/><button class="btn btn-secondary" onclick="myFunction()">Click to copy Referral link</button>
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





            <div class="page-inner " style="margin-top:50px">


<div class="row row-card-no-pd mt--2">




  <div class="col-md-12 col-sm-12 col-sx-12">
          <div class="box box-default">
            <div class="box-header with-border">


   
		  <h2 align="center" ><b><?php echo $name;?> SECURITY</b></h2>
		  </br>
		 
         
         

				<div class="col-md-12 col-sm-12 col-xs-12" style="width:100%;">
		    <div class="x_panel" style="width:100%;">

			<?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
          </br>
				

				<form id="myform" action="security.php?email=<?php  echo $_SESSION['email']?>" method="POST">
						


                         <button id="" type="submit"  name="activate" class="btn btn-info" style="margin-left:5%;padding:15px; width:90%;" ><?php  echo $sec ;?></button>
						 </br>	 </br>
						 
						  <button type="submit" name="deactivate"  class="btn btn-warning"  style="margin-left:5%;padding:15px; width:90%;">Deactivate 2FA</button>


						 </form>
				</div>



                  </div>

                </div>



              </div>


          

      <script>

      </script>
   </div>
  </div>
</div>

<?php
		 
		 include 'footer.php';
		 
		 ?>   