
<?php

session_start();


include "../../config/db.php";
include "../../config/config.php";

$msg = "";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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




$eth =$link->real_escape_string( $_POST['eth']);
$usd =$link->real_escape_string( $_POST['usd']);
$btctnx =$link->real_escape_string($_POST['btctnx']);
$email =$link->real_escape_string($_POST['email']);
$status =$link->real_escape_string($_POST['status']);
$refcode =$link->real_escape_string($_POST['refcode']);
$referred =$link->real_escape_string($_POST['referred']);


$tnx = uniqid('tnx');


if($eth == "" || $usd == "" ||  $btctnx == "" ){
			$msg = "No Field should be left empty!";

	}else{


$sql = "INSERT INTO btc (eth,usd,btctnx,email,status,tnxid,refcode,referred)
VALUES ('$eth','$usd','$btctnx','$email','$status','$tnx','$refcode','$referred')";

if (mysqli_query($link, $sql)) {

  include_once "PHPMailer/PHPMailer.php";
  require_once 'PHPMailer/Exception.php';

  $mail= new PHPMailer();
   $mail->setFrom($emaila);
   $mail->FromName = $name;
  $mail->addAddress($email, $username);
  $mail->Subject = "Deposit Alert!";
  $mail->isHTML(true);
  $mail->Body = '<div style="background: #f5f7f8;width: 100%;height: 100%; font-family: sans-serif; font-weight: 100;" class="be_container"> 

<div style="background:#fff;max-width: 600px;margin: 0px auto;padding: 30px;"class="be_inner_containr"> <div class="be_header">

<div class="be_logo" style="float: left;"> <img src="https:// '.$bankurl.'/investment-script/demo-admin/c2wad/logo/logo.png"> </div>

<div class="be_user" style="float: right"> <p>Dear: '.$username.'</p> </div> 

<div style="clear: both;"></div> 

<div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

<h1>Thank you for investing on '.$name.'</h1>

</div> </div> 

<div class="be_body" style="padding: 20px;"> <p style="line-height: 25px;"> 

Your order of '.$usd.' USD worth of '.$eth.'  ETH has been sent, your transaction ID is '.$tnx.' , you  will be credited once your order is confirmed.


</p>

<div class="be_footer">
<div style="border-bottom: 1px solid #ccc;"></div>


<div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

<p> Please do not reply to this email. Emails sent to this address will not be answered. 
Copyright ©2019 '.$name.'. </p> <div class="be_logo" style=" width:60px;height:40px;float: right;"> </div> </div> </div> </div></div>
  
  
  
';
  if($mail->send()){

    $msg= " Your order of $usd USD worth of $eth  ETH has been sent, your transaction ID is $tnx , you  will be credited once your order is confirmed ";
  }





} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
}

}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
include "header.php";


    ?>





<div class="panel-header bg-primary-gradient">
						<div class="page-inner py-5">
							<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
								<div>
									<h2 class="text-white pb-2 fw-bold">Ethereum Deposit</h2>







                  
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



   


        <?php
function getPrice($url){
  $decode = file_get_contents($url);
return json_decode($decode, true);
}
$ethUsd  = getPrice('https://www.cryptonator.com/api/ticker/eth-usd/');
$ethPrice = $ethUsd["ticker"]["price"];
$ethDisplay = round($ethPrice, 2);

?>

<script>
function btcconverter(input){
var price = "<?php echo $ethDisplay; ?>";
var output = input.value / price;
var out= document.getElementById('eth');
out.value=output;
}

</script>

<div class="col-md-12 col-sm-12 col-sx-12">
          <div class="box box-default">
            <div class="box-header with-border">

          <h4 align="center"><i class="fa fa-refresh"></i> <?php echo $name;?>   Ethereum Payment Process</h4>
</br>

          <div class="">
                   <a href="deposit.php?username=<?php  echo $_SESSION['username']?>&email= <?php  echo $_SESSION['email']?>&sessions= <?php  echo $_SESSION['session']?>"><button type="button" class="btn btn-primary btn-flat">Bitcoin Payment</button></a> 
                  </br></br>
                  <a href="pm.php?username=<?php  echo $_SESSION['username']?>&email= <?php  echo $_SESSION['email']?>&sessions= <?php  echo $_SESSION['session']?>"><button type="button" class="btn btn-primary btn-flat">Perfect Money Payment</button></a>
                  
                   
                  
                </div>
         

 
          <hr></hr>
           <h5>Make payment to the below Ethereum wallet</h5>
          
            <?php   
        $sql1= "SELECT * FROM admin";
  $result1 = mysqli_query($link,$sql1);
  if(mysqli_num_rows($result1) > 0){
  $row = mysqli_fetch_assoc($result1);

    if(isset($row['ewallet'])){
  $bw = $row['ewallet'];
}else{
  $bw="cant find wallet";
}
}
          ?>
          <input type="text" class="form-control" value="<?php echo $bw ;?>" id="myInput" readonly>
          </br>
<button onclick="myFunction()" class="btn btn-info">Copy Ethereum Address</button>
<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  document.execCommand("copy");
  alert("Copied the wallet address: " + copyText.value);
}
</script>
          
        
          
            <div class="box-header with-border">
            
            <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
          </br>

     <form class="form-horizontal" action="ethereum.php?username=<?php  echo $_SESSION['username']?>&email=<?php  echo $_SESSION['email']?>&sessions= <?php  echo $_SESSION['session']?>" method="POST" >

       <div class="form-group">
        <input type="double" id="eth" name="eth" placeholder="Value in ETHEREUM is displayed here" readonly="true" class="form-control">
      </div>
        <div class="form-group">
        <input type="double" onchange="btcconverter(this);" onkeyup="btcconverter(this);" id="usd" name="usd" placeholder="Amount in USD" class="form-control">
        </div>
       
        <div class="form-group">
        <input type="text"  name="btctnx" placeholder="Paste the transferred eth transaction ID " class="form-control">
        </div>

        <input type="hidden"  name="email" value="<?php  echo $_SESSION['email']?>" class="form-control">
        <input type="hidden"  name="refcode" value="<?php  echo $_SESSION['refcode']?>" class="form-control">
        <input type="hidden"  name="referred" value="<?php  echo $_SESSION['referred']?>" class="form-control">

        <input type="hidden"  name="status" value="pending" class="form-control">

      <button style="" type="submit" class="btn btn-success" name="submit" >Deposit</button>


    </form>


    </div>
   </div>

   </div>
  </div>
  </section>
</div>
</div>
</div>
  <?php
		 
		 include 'footer.php';
		 
		 ?> 

