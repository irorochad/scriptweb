<?php

session_start();


include "../../config/db.php";

$msg = "";
use PHPMailer\PHPMailer\PHPMailer;

$username=$_GET['username'];
$email=$_GET['email'];


if(isset($_POST['btc'])){



  $v =$link->real_escape_string( $_POST['v']);

$email =$link->real_escape_string($_POST['email']);
$status =$link->real_escape_string($_POST['status']);

$tnx = uniqid('tnx');




$sql = "INSERT INTO wbtc (moni,email,status,tnx)
VALUES ('$v','$email','$status','$tnx')";

if (mysqli_query($link, $sql)) {

  

    $msg= " Your withdraw order of $btc  BTC has been sent, your transaction ID is $tnx , you  will be credited once your order is confirmed ";
  }





} else {
    
}




include "header.php";


    ?>



<style>



.snip1404 {
  font-family: 'Source Sans Pro', Arial, sans-serif;
  color: #ffffff;
  text-align: left;
  font-size: 16px;
  width: 100%;
  max-width: 1000px;
  margin: 50px 10px;
}
.snip1404 img {
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  z-index: -1;
}
.snip1404 .plan {
  margin: 0;
  width: 25%;
  position: relative;
  float: left;
  overflow: hidden;
  border: 3px solid #442232;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
  background-color: #5f3047;
}
.snip1404 .plan:hover i,
.snip1404 .plan.hover i {
  -webkit-transform: scale(1.2);
  transform: scale(1.2);
}
.snip1404 .plan:first-of-type {
  border-radius: 8px 0 0 8px;
}
.snip1404 .plan:last-of-type {
  border-radius: 0 8px 8px 0;
}
.snip1404 * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.25s ease-out;
  transition: all 0.25s ease-out;
}
.snip1404 header {
  background-color: #5f3047;
  color: #ffffff;
}
.snip1404 .plan-title {
  background-color: rgba(0, 0, 0, 0.5);
  position: relative;
  margin: 0;
  padding: 20px 20px 0;
  text-transform: uppercase;
  letter-spacing: 4px;
}
.snip1404 .plan-title:after {
  position: absolute;
  content: '';
  top: 100%;
  left: 0;
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 40px 300px 0 0;
  border-color: rgba(0, 0, 0, 0.5) transparent transparent;
}
.snip1404 .plan-cost {
  padding: 40px 20px 10px;
  text-align: right;
}
.snip1404 .plan-price {
  font-weight: 600;
  font-size: 3em;
}
.snip1404 .plan-type {
  opacity: 0.8;
  font-size: 0.7em;
  text-transform: uppercase;
}
.snip1404 .plan-features {
  padding: 0 0 20px;
  margin: 0;
  list-style: outside none none;
}
.snip1404 .plan-features li {
  padding: 8px 5%;
}
.snip1404 .plan-features i {
  margin-right: 8px;
  color: rgba(0, 0, 0, 0.5);
}
.snip1404 .plan-select {
  border-top: 1px solid rgba(0, 0, 0, 0.2);
  padding: 20px;
  text-align: center;
}
.snip1404 .plan-select a {
  background-color: #442232;
  color: #ffffff;
  text-decoration: none;
  padding: 12px 20px;
  font-size: 0.75em;
  font-weight: 600;
  border-radius: 20px;
  text-transform: uppercase;
  letter-spacing: 4px;
  display: inline-block;
}
.snip1404 .plan-select a:hover {
  background-color: #552a3f;
}
.snip1404 .featured {
  margin-top: -10px;
  border-color: #331926;
  box-shadow: 0 0 25px rgba(0, 0, 0, 0.4);
  z-index: 1;
  border-radius: 8px;
}
.snip1404 .featured .plan-select {
  padding: 30px 20px;
}
@media only screen and (max-width: 767px) {
  .snip1404 .plan {
    width: 50%;
  }
  .snip1404 .plan-title,
  .snip1404 .plan-select a {
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
  .snip1404 .plan-select,
  .snip1404 .featured .plan-select {
    padding: 20px;
  }
  .snip1404 .featured {
    margin-top: 0;
  }
}
@media only screen and (max-width: 440px) {
  .snip1404 .plan {
    width: 100%;
  }
}



</style>

 <div class="content-wrapper">
   <section class="content">


          <div class="box box-default">
            <div class="box-header with-border">

          <h4 align="center"><i class="fa fa-refresh"></i> COINXPROS INVESTMENT PLAN UPGRADE</h4>
          </br>

          <div class="col-md-12 col-sm-12 col-sx-12">
          <div class="snip1404">
  <div class="plan">
    <header>
      <h4 class="plan-title">
        Starter
      </h4>
      <div class="plan-cost"><span class="plan-price">$19</span><span class="plan-type">3month</span></div>
    </header>
    <ul class="plan-features">
    <li><i class="ion-checkmark"> </i>Plus $10 Activation Fee</li>
      <li><i class="ion-checkmark"> </i>Fast Activation</li>
      <li><i class="ion-checkmark"> </i> 2% Profit Daily</li>
      
    </ul>
    <div class="plan-select"><a href="">Upgrade Plan</a></div>
  </div>
  </br>
  
  <div class="plan">
    <header>
      <h4 class="plan-title">
         
        Basic
      </h4>
      <div class="plan-cost"><span class="plan-price">$29</span><span class="plan-type">3month</span></div>
    </header>
    <ul class="plan-features">
    <li><i class="ion-checkmark"> </i>Plus $10 Activation Fee</li>
      <li><i class="ion-checkmark"> </i>Fast Activation</li>
      <li><i class="ion-checkmark"> </i> 2% Profit Daily</li>
      
    </ul>
    <div class="plan-select"><a href="">Upgrade Plan</a></div>
  </div>
  </br>
  <div class="plan featured">
    <header>
      <h4 class="plan-title">
         
        Professional
      </h4>
      <div class="plan-cost"><span class="plan-price">$49</span><span class="plan-type">3month</span></div>
    </header>
    <ul class="plan-features">
      <li><i class="ion-checkmark"> </i>Plus $10 Activation Fee</li>
      <li><i class="ion-checkmark"> </i>Fast Activation</li>
      <li><i class="ion-checkmark"> </i> 2% Profit Daily</li>
 

      
    
   


    </ul>
    <div class="plan-select"><a href="">Upgrade Plan</a></div>
  </div>
  </br>
  <div class="plan">
    <header>
      <h4 class="plan-title">
         
       User's Choice
      </h4>
      <div class="plan-cost"><span class="plan-price"><input style="color:black" type="" placevalue="enter amount to invest"></span><span class="plan-type">/3month</span></div>
    </header>
    <ul class="plan-features">
    <li><i class="ion-checkmark"> </i>Plus $10 Activation Fee</li>
      <li><i class="ion-checkmark"> </i>Fast Activation</li>
      <li><i class="ion-checkmark"> </i> 2% Profit Daily</li>
    </ul>
    <div class="plan-select"><a href="">Upgrade Plan</a></div>
  </div>
</div>



            </div>
          </div>
          <!-- /.widget-user -->
        </div>

<script>
       
$(".hover").mouseleave(
  function () {
    $(this).removeClass("hover");
  }
);
</script>