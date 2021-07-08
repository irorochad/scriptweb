<?php    
include "../../../config/db.php";
include "../../../config/config.php";

   
    include "qrlib.php";    
    
  
      
$sql1= "SELECT * FROM admin";
  $result1 = mysqli_query($link,$sql1);
  if(mysqli_num_rows($result1) == 1){
  while($row = mysqli_fetch_assoc($result1)){

    if(isset($row['bwallet'])){
  $msg = $row['bwallet'];
}else{
  $msg="cant find Qr code";
}

	  QRcode::png( $row['bwallet']);

}}
    
  

