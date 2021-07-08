<?php
session_start();
include "../../config/db.php";
require_once 'PHPGangsta/GoogleAuthenticator.php';
$msg = "";
$email = $_GET['email'];

$sql= "SELECT * FROM tfa  WHERE email = '$email'";
$results = mysqli_query($link,$sql);
if(mysqli_num_rows($results) > 0){
    while($row = mysqli_fetch_assoc($results)){  
       $secret= $row['secret'];

if(isset($_POST['submit'])) {

    $email = $_POST['email'];
    $vercode = $_POST['vercode'];
    $ga = new PHPGangsta_GoogleAuthenticator();
   


$result = $ga->verifyCode($secret, $vercode, 3);
if($result == 1){

    $sql = "SELECT * FROM users WHERE email='$email' ";

    if($result = $link->query($sql)){

        $row = mysqli_fetch_array($result);

    $_SESSION['email']=$_POST['email'];
      $_SESSION['username']=$row['username'];
      $_SESSION['refcode']=$row['refcode'];
      $_SESSION['uid']=$row['id'];
       $_SESSION['profit']=$row['profit'];
       $_SESSION['refbonus']=$row['refbonus'];
        $_SESSION['walletbalance']=$row['walletbalance'];
          $_SESSION['session']=$row['session'];
          $_SESSION['password']=$row['password'];
          $_SESSION['verify']=$row['verify'];
          $_SESSION['package']=$row['package'];
          $_SESSION['acctname']=$row['acctname'];
          $_SESSION['acctno']=$row['acctno'];
          $_SESSION['eth']=$row['eth'];
          $_SESSION['btc']=$row['btc'];
          $_SESSION['bname']=$row['bname'];
          $_SESSION['2fa']=$row['2fa'];
        $username= $_SESSION['username'];
        $emails= $_SESSION['email'];

       header("location:../pages/index.php?username=$username&email=$emails");
    }
} else {
    $msg = "Aunthenticator does not match";
}
}
}

}


?>

 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
  <div class="container" style="margin-top:30px;background-color:#f5f8fc;padding:10%;">
  
  <h4 align="center">Google Authenticator Login Page</h4>

<?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
          </br>
          
          

<form action="login.php?email=<?php echo $email; ?>" method="POST">

<input type="text" style="width:100%;padding:16px;border-radius:5px;" name="vercode" placeholder="Enter google authenticator code here">
<input type="hidden" name="email"value="<?php echo $email; ?>" >
</br>
</br>
<input type="submit" class="btn btn-success" name="submit" value="Continue to Login">


</form>