
<?php

session_start();

include "../../config/db.php";
include "../../config/config.php";

$msg = "";
use PHPMailer\PHPMailer\PHPMailer;

$username=$_GET['username'];
$email=$_GET['email'];

if(isset($_SESSION['email'])){
	

  $sql = "UPDATE users SET session='1' WHERE email='$email'";

  mysqli_query($link, $sql) or die(mysqli_error($link));


}
else{


header("location:../form/signin.php");
}


if(isset($_POST['submit'])){




$email =$link->real_escape_string( $_POST['email']);
$pm =$link->real_escape_string( $_POST['pm']);
$eth =$link->real_escape_string($_POST['eth']);
$btc =$link->real_escape_string($_POST['btc']);




    $sql = "UPDATE users SET pm='$pm', eth='$eth', btc='$btc' WHERE email='$email'";

                  if (mysqli_query($link, $sql)) {

  
               $msg= " Your wallets has been successfully added/updated pls logout and login to confirm your updated status ";

                           } else {
                        $msg= " Your wallets was not added/updated ";
                         }
                        }   

include "header.php";


    ?>





<div class="panel-header bg-primary-gradient">
						<div class="page-inner py-5">
							<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
								<div>
									<h2 class="text-white pb-2 fw-bold">Wallet Details</h2>







                  
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





            <div class="page-inner " style="margin-top:50px">


<div class="row row-card-no-pd mt--2">






<div class="col-md-12 col-sm-12 col-sx-12">
          <div class="box box-default">
            <div class="box-header with-border">

          <h4 align="center"><i class="fa fa-user"></i> ACCOUNT DETAILS</h4>
</br>


        
         

 
          <hr></hr>
          
        
          
            <div class="box-header with-border">
            
            <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
          </br>

     <form class="form-horizontal" action="bdetails.php?username=<?php  echo $_SESSION['username']?>&email=<?php  echo $_SESSION['email']?>&sessions= <?php  echo $_SESSION['session']?>" method="POST" >

     
        
        <input type="hidden" name="email" placeholder="Your bank account name" value="<?php  echo $email;?>" class="form-control">
        </div>

       <div class="form-group">
        <input type="text"  name="pm" placeholder="Perfect Money ID " value="<?php  echo $_SESSION['pm']?>" class="form-control">
      </div>

      <div class="form-group">
        <input type="text"  name="eth" placeholder="Ethereum Address"  value="<?php  echo $_SESSION['eth']?>" class="form-control">
      </div>

      <div class="form-group">
        <input type="text"  name="btc" placeholder="Bitcoin Address "  value="<?php  echo $_SESSION['btc']?>" class="form-control">
      </div>
        
       
       

      <button style="" type="submit" class="btn btn-warning" name="submit" >Add / Update wallet </button>


    </form>


    </div>
   </div>

   </div>
  </div>
  </section>
</div>

	
<?php
		 
		 include 'footer.php';
		 
		 ?>   