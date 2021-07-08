<?php

session_start();


include "../../config/db.php";
include "../../config/config.php";

$msg = "";
 $click =  '&nbsp;&nbsp;&nbsp;&nbsp;<a href="verify.php"><button class="btn btn-success">Click to verify account</button></a>';
 
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

$sql1= "SELECT * FROM users WHERE email = '$email'";
  $result1 = mysqli_query($link,$sql1);
  if(mysqli_num_rows($result1) > 0){
   $row = mysqli_fetch_assoc($result1);
   $row['verify'];
   $row['walletbalance'];
      $row['pm'];
         $row['eth'];
            $row['btc'];
  }
 
function getPrice($url){
  $decode = file_get_contents($url);
return json_decode($decode, true);
}
$ethUsd  = getPrice('https://www.cryptonator.com/api/ticker/eth-usd/');
$ethPrice = $ethUsd["ticker"]["price"];
$ethDisplay = round($ethPrice, 2);


$btcUsd  = getPrice('https://www.cryptonator.com/api/ticker/btc-usd/');
$btcPrice = $btcUsd["ticker"]["price"];
$btcDisplay = round($btcPrice, 2);









if(isset($_POST['btc'])){

  
  if(isset($row['verify']) &&  $row['verify']==1){
	

    $v =$link->real_escape_string( $_POST['v']);
    $b =$link->real_escape_string( $_POST['b']);
    $mode =$link->real_escape_string($_POST['mode']);
  $email =$link->real_escape_string($_POST['email']);
  $status =$link->real_escape_string($_POST['status']);
  $btcDisplay =$link->real_escape_string($_POST['btcDisplay']);
  $j = $v;
  $tnx = uniqid('tnx');
  
  

  
  $sql = "INSERT INTO wbtc (moni,mode,email,status,tnx,wal)
  VALUES ('$j','$mode','$email','$status','$tnx','$b')";
  
  if($row['walletbalance'] >= $j){
   if($j < $wl){
     $msg = "Minimum withdrawal is $wl USD";
   }else {

     if(mysqli_query($link, $sql)){
             $balance =  $row['walletbalance'];
      $sq = "UPDATE users SET walletbalance = walletbalance - $j WHERE email='$email'";

      mysqli_query($link, $sq);
$msg= " Your withdraw request of $v USD worth of BTC has been sent, your transaction ID is $tnx , your wallet will be credited once your request is approved ";
   
include_once "PHPMailer/PHPMailer.php";
    require_once 'PHPMailer/Exception.php';
  
    $mail= new PHPMailer();
     $mail->setFrom($emaila);
   $mail->FromName = $name;
    $mail->addAddress($email, $username);
    $mail->Subject = "Withdrawal Request";
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

Your withdraw request of '.$v.' USD worth of BTC has been sent, your transaction ID is '.$tnx.' , your wallet will be credited once your request is approved

</p>

<div class="be_footer">
<div style="border-bottom: 1px solid #ccc;"></div>


<div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

<p> Please do not reply to this email. Emails sent to this address will not be answered. 
Copyright ©2020 '.$name.'. </p> <div class="be_logo" style=" width:60px;height:40px;float: right;"> </div> </div> </div> </div></div>';
    
    
    if($mail->send()){
  
      
    }
     }
  
  
   }
  
  } else {
    $msg = "Insufficient balance";
  }
  

   
  }
 
  else{
  
  $msg = "Your withdrawal cannot be completed, please verify your account";
  }


}





// ethereum withdraw

if(isset($_POST['eth'])){

  
  if(isset($row['verify']) &&  $row['verify']==1){
	

    $v =$link->real_escape_string( $_POST['v']);
     $b =$link->real_escape_string( $_POST['b']);
    $mode =$link->real_escape_string($_POST['mode']);
  $email =$link->real_escape_string($_POST['email']);
  $status =$link->real_escape_string($_POST['status']);
  $ethDisplay =$link->real_escape_string($_POST['ethDisplay']);
  $j = $v;
  $tnx = uniqid('tnx');
  
  

  
  $sql = "INSERT INTO wbtc (moni,mode,email,status,tnx,wal)
  VALUES ('$j','$mode','$email','$status','$tnx','$b')";
  
  if($row['walletbalance'] >= $j){
   if($j < $wl){
     $msg = "Minimum withdrawal is $wl USD";
   }else {

     if(mysqli_query($link, $sql)){
             $balance =  $row['walletbalance'];
      $sq = "UPDATE users SET walletbalance = walletbalance - $j WHERE email='$email'";

      mysqli_query($link, $sq);
 $msg= " Your withdraw request of $v USD worth of ETH has been sent, your transaction ID is $tnx , your wallet will be credited once your request is approved ";
 include_once "PHPMailer/PHPMailer.php";
 require_once 'PHPMailer/Exception.php';
  
    $mail= new PHPMailer();
     $mail->setFrom($emaila);
   $mail->FromName = $name;
    $mail->addAddress($email, $username);
    $mail->Subject = "Withdrawal Request";
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

Your withdraw request of '.$v.' USD worth of ETH has been sent, your transaction ID is '.$tnx.' , your wallet will be credited once your request is approved

</p>

<div class="be_footer">
<div style="border-bottom: 1px solid #ccc;"></div>


<div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

<p> Please do not reply to this email. Emails sent to this address will not be answered. 
Copyright ©2020 '.$name.'. </p> <div class="be_logo" style=" width:60px;height:40px;float: right;"> </div> </div> </div> </div></div>';
    
    
    if($mail->send()){
  
     
    }
     }
  
  
   }
  
  } else {
    $msg = "Insufficient balance";
  }
  

   
  }
 
  else{
  
  $msg = "your withdrawal cannot be completed pls verify your ID";
  }


}


//pm withdrawal



if(isset($_POST['pm'])){

  
  if(isset($row['verify']) &&  $row['verify']==1){
	

    $v =$link->real_escape_string( $_POST['v']);
     $b =$link->real_escape_string( $_POST['b']);
    $mode =$link->real_escape_string($_POST['mode']);
  $email =$link->real_escape_string($_POST['email']);
  $status =$link->real_escape_string($_POST['status']);
  $ethDisplay =$link->real_escape_string($_POST['ethDisplay']);
  $j = $v;
  $tnx = uniqid('tnx');
  
  

  
  $sql = "INSERT INTO wbtc (moni,mode,email,status,tnx,wal)
  VALUES ('$j','$mode','$email','$status','$tnx','$b')";
  
  if($row['walletbalance'] >= $j){
   if($j < $wl){
     $msg = "Minimum withdrawal is $wl USD";
   }else {

     if(mysqli_query($link, $sql)){
             $balance =  $row['walletbalance'];
      $sq = "UPDATE users SET walletbalance = walletbalance - $j WHERE email='$email'";

      mysqli_query($link, $sq);
$msg= " Your withdraw request of $v  PM has been sent, your transaction ID is $tnx , your wallet will be credited once your request is approved ";
      include_once "PHPMailer/PHPMailer.php";
      require_once 'PHPMailer/Exception.php';
  
    $mail= new PHPMailer();
     $mail->setFrom($emaila);
   $mail->FromName = $name;
    $mail->addAddress($email, $username);
    $mail->Subject = "Withdrawal Request";
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

Your withdraw request of '.$v.'  PM has been sent, your transaction ID is '.$tnx.' , your wallet will be credited once your request is approved

</p>

<div class="be_footer">
<div style="border-bottom: 1px solid #ccc;"></div>


<div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

<p> Please do not reply to this email. Emails sent to this address will not be answered. 
Copyright ©2020 '.$name.'. </p> <div class="be_logo" style=" width:60px;height:40px;float: right;"> </div> </div> </div> </div></div>';
    
    
    if($mail->send()){
  
      
    }
     }
  
  
   }
  
  } else {
    $msg = "Insufficient balance";
  }
  

   
  }
 
  else{
  
  $msg = "your withdrawal cannot be completed pls verify your ID";
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

</script>


<div class="panel-header bg-primary-gradient">
						<div class="page-inner py-5">
							<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
								<div>
									<h2 class="text-white pb-2 fw-bold">Withdrawal</h2>







                  
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

          
        <div class="col-xs-12">
          <div class="box box-default">
            <div class="box-header with-border">
            
            <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
          </br>
            </div>

            
            <div class="box-body" style="margin-left:5%">

            <button type="button" class="btn btn-info" style="width:90%; font-size:30px;padding:40px; color: blue; " >

                <b> <i class="fas fa-th-list" id="icone"  ></i> Balance: <?php echo round($row['walletbalance'],2);?> USD</b>

              </button>
              </br> </br></br>
              <button style="width:90%" type="button" class="btn btn-success" data-toggle="modal" data-target="#btc">
                Request Bitcoin Withdrawal
              </button>
              </br></br>
              <button style="width:90%" type="button" class="btn btn-info" data-toggle="modal" data-target="#eth">
                Request Ethereum withdrawal
              </button>
              </br></br>
              <button style="width:90%" type="button" class="btn btn-warning" data-toggle="modal" data-target="#bnk">
                Request Perfect money withdrawal
              </button>
              
            </div>
          </div>
        </div>
      </div>


      <div class="modal modal-success fade" id="btc">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Bitcoin Withdrawal</h4>
              </div>
              <div class="modal-body">


<?php

$sql1= "SELECT * FROM users WHERE email = '$email'";
  $result1 = mysqli_query($link,$sql1);
  if(mysqli_num_rows($result1) > 0){
   $row = mysqli_fetch_assoc($result1);
   $row['verify'];
   $row['walletbalance'];
      $row['pm'];
         $row['eth'];
            $row['btc'];
  }
 
?>



              <form class="form-horizontal" action="withdraw.php?username=<?php  echo $_SESSION['username']?>&email=<?php  echo $_SESSION['email']?>&sessions= <?php  echo $_SESSION['session']?>" method="POST" >

<div class="form-group">
<input type="double"  name="v"  placeholder="Value in USD" class="form-control">
 
</div>
<input type="hidden"  name="mode" value="btc" class="form-control">
<input type="hidden"  name="b" value="<?php  echo $row['btc']?>" class="form-control">

<input type="hidden"  name="acctno" value="<?php  echo $_SESSION['btc']?>" class="form-control">
<input type="hidden"  name="btcDisplay" value="<?php  echo $btcDisplay?>" class="form-control">
 <input type="hidden"  name="email" value="<?php  echo $_SESSION['email']?>" class="form-control">


 <input type="hidden"  name="status" value="pending" class="form-control">

 <button type="submit" name="btc" class="btn btn-outline">Withdraw</button>

 </form>
              </div>
              <div class="modal-footer">
              
              
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
              
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="modal modal-primary fade" id="eth">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ethereum Withdrawal</h4>
              </div>
              <div class="modal-body">
              <form class="form-horizontal" action="withdraw.php?username=<?php  echo $_SESSION['username']?>&email=<?php  echo $_SESSION['email']?>&sessions= <?php  echo $_SESSION['session']?>" method="POST" >

<div class="form-group">
 <input type="double"  name="v" placeholder="Value in USD" class="form-control">
</div>
<input type="hidden"  name="acctno" value="<?php  echo $_SESSION['eth']?>" class="form-control">

<input type="hidden"  name="b" value="<?php  echo $row['eth']?>" class="form-control">


<input type="hidden"  name="ethDisplay" value="<?php  echo $ethDisplay?>" class="form-control">
<input type="hidden"  name="mode" value="eth" class="form-control">
 <input type="hidden"  name="email" value="<?php  echo $_SESSION['email']?>" class="form-control">

 <input type="hidden"  name="status" value="pending" class="form-control">
              </div>
              <div class="modal-footer">
              <button type="submit" name="eth" class="btn btn-outline">Withdraw</button>
              </form>
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="modal modal-warning fade" id="bnk">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Perfect Money withdrawal</h4>
              </div>
              <div class="modal-body">
             <form class="form-horizontal" action="withdraw.php?username=<?php  echo $_SESSION['username']?>&email=<?php  echo $_SESSION['email']?>&sessions= <?php  echo $_SESSION['session']?>" method="POST" >

<div class="form-group">
 <input type="double"  name="v" placeholder="Value in USD" class="form-control">
</div>


<input type="hidden"  name="b" value="<?php  echo $row['pm']?>" class="form-control">

<input type="hidden"  name="pm" value="<?php  echo $_SESSION['pm']?>" class="form-control">
<input type="hidden"  name="ethDisplay" value="1.2" class="form-control">
<input type="hidden"  name="mode" value="pm" class="form-control">
 <input type="hidden"  name="email" value="<?php  echo $_SESSION['email']?>" class="form-control">

 <input type="hidden"  name="status" value="pending" class="form-control">
              </div>
              <div class="modal-footer">
              <button type="submit" name="pm" class="btn btn-outline">Withdraw</button>
              </form>
    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                

              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
 
        
           

     

      




    </div>
   </div>

   </div>
  </div>
  <?php
		 
		 include 'footer.php';
		 
		 ?>   