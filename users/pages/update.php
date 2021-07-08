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


if(isset($_POST['submit'])){




  $username =$link->real_escape_string( $_POST['username']);
  $email =$link->real_escape_string( $_POST['email']);
  
    $phone =$link->real_escape_string( $_POST['phone']);
    
      $country =$link->real_escape_string( $_POST['country']);
      
        $address =$link->real_escape_string( $_POST['address']);

  
  
  
      $sql = "UPDATE users SET username ='$username', email='$email' ,phone='$phone',  country='$country', address='$address'  WHERE email='$email'";
  
                    if (mysqli_query($link, $sql)) {
  
    
                 $msg= " Your details has been successfully updated ";
  
                             } else {
                          $msg= " Your details was not updated ";
                           }
                          }   
  



include "header.php";


    ?>




<div class="panel-header bg-primary-gradient">
						<div class="page-inner py-5">
							<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
								<div>
									<h2 class="text-white pb-2 fw-bold">My Profile</h2>







                  
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

          <h4 align="center"><i class="fa fa-refresh"></i> PROFILE UPDATE</h4>
          </br>

          <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
          </br>
<div class="col-md-12 col-sm-12 col-sx-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
           
            <div class="widget-user-header bg-teal">
             

              <form class="form-horizontal" action="update.php?email=<?php  echo $_SESSION['email']?>" method="POST" >
              <div class="form-group">
<input type="text"  name="username"  value="<?php  echo $_SESSION['username']?>" placeholder="username" class="form-control">
 
</div>


<div class="form-group">
<input type="text"  name="email"  value="<?php  echo $_SESSION['email']?>" placeholder="email" class="form-control">
 
</div>


<div class="form-group">
<input type="text"  name="phone"  value="<?php  echo $_SESSION['phone']?>" placeholder="phone" class="form-control">
 
</div>


<div class="form-group">
<input type="text"  name="address"  value="<?php  echo $_SESSION['address']?>" placeholder="address" class="form-control">
 
</div>

<div class="form-group">
<input type="text"  name="country"  value="<?php  echo $_SESSION['country']?>" placeholder="country" class="form-control">
 
</div>


            </div>
            <div class="box-footer no-padding">
           

</br>


<div class="form-group">
<input type="submit"  name="submit" value="Update Profile" class="btn btn-info">
 
</div>

            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        </div>
          <!-- /.widget-user -->
        </div>
        </div>
          <!-- /.widget-user -->
        </div>
        
        <?php
		 
		 include 'footer.php';
		 
		 ?>   