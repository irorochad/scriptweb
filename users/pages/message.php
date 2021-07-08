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


if (isset($_POST['msgs'])){


   $email = $_POST['email'];
   $title = $_POST['title'];
   $message = $_POST['message'];


	 $msgid ='cabcdg19etsfjhdshdsh35678gwyjerehuhb/>()[]{}|\dTSGSAWQUJHDCSMNBVCBNRTPZXMCBVN1234567890';
            $msgid = str_shuffle($msgid);
             $msgid= substr($msgid,0, 10);


	 $sql = "INSERT INTO messageadmin (email, message, title, msgid) VALUES ('$email','$message','$title','$msgid')";

	  if(mysqli_query($link, $sql)){

        $msg= "Your message was successfully sent!";
    } else {
        $msg= "Cannot send message!";
    }
}




include "header.php";

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
									<h2 class="text-white pb-2 fw-bold">My Ticket</h2>







                  
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
   
<h2 align="center" style="color:black"> <i class="fa  fa-comment"></i> MESSAGE ADMIN </h2>


</br>
<?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>


<form action="message.php?email=<?php  echo $_SESSION['email']?>" method="POST" enctype="multipart/form-data"  class="form-horizontal form-label-left" >


<legend> <i class="fa  fa-comment"></i> Send Complain/Message To Admin</legend>

   <div class="item form-group">
                       
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="hidden" name="fileToUpload" id="fileToUpload" class="form-control col-md-7 col-xs-12"  >
                        </div>
                      </div>

                      <div class="item form-group">
                       
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" name="title"  class="form-control col-md-12 col-xs-12"  placeholder="Message title" >
                        </div>
                      </div>

                      <div class="item form-group">
                       
                        <div class="col-md-12 col-sm-12 col-xs-12">
        <textarea placeholder="write message here" name="message" class="form-control col-md-12 col-xs-12"></textarea>
      </div>
      </div>

      <input type="hidden" name="email"  value="<?php  echo $_SESSION['email']?>">

   <div class="col-md-6 ">

                          <button type="submit"  class="btn btn-info"  name="msgs" >Send Message</button>
                        </div>


</form>



          </div>
    </div>


    </div>
    </div>

             
		 <?php
		 
		 include 'footer.php';
		 
		 ?>   
            
            
           
</div> 
        



  </body>
</html>
