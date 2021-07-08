<?php
session_start();
include "../../config/db.php";
require_once 'PHPGangsta/GoogleAuthenticator.php';
$msg = "";
$ga = new PHPGangsta_GoogleAuthenticator();

$secret = $ga->createSecret();



$qr = $ga->getQRCodeGoogleUrl('coin2wealth', $secret);


$myCode = $ga->getCode($secret);

$result = $ga->verifyCode($secret, $myCode, 3);

if(isset($_POST['submit'])){

 $email= $_POST['email'];
$secret = $_POST['secret'];
$qrcode = $_POST['qrcode'];
$result = $_POST['result'];

$sql= "INSERT INTO tfa (email,secret,qrcode,result) VALUES ('$email','$secret','$qrcode','$result')";

if ($link->query($sql) === TRUE) {
    $msg= " You have successfully activated google authenticator security down 2fa app from playstore";
} else {
    $msg= " Error activating google authenticator";
}

}

include "header.php";

?>

<div class="content-wrapper">
  


  <!-- Main content -->
  <section class="content">


  <div class="col-md-12 col-sm-12 col-sx-12">
          <div class="box box-default">
            <div class="box-header with-border">
            <h2 align="center" ><b>COIN2WEALTH GOOGLE AUTHENTICATOR</b></h2>
            </br>
            <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
          </br>
          </br>
<div style="margin-left:20%">
<?php echo '<img src="'.$qr.'" /><br />';?>

</br>
</br>
<form action="generate.php" method="POST">

<input style="padding:12px;border-radius:5px" type="email" name="email" placeholder="Enter your email">
<input type="hidden" name="secret" value="<?php echo $secret; ?>">
<input  type="hidden" name="qrcode" value="<?php echo $qr; ?>" >
<input  type="hidden" name="result" value="<?php echo $result; ?>" >
</br></br>
<input type="submit" class="btn btn-success" name="submit" value="authenticate">


</form>
</div>