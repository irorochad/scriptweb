   
<?php


   require_once '../../config/db.php';
  require_once $pre;
require_once '../../config/inc.php';
 require_once $init;
  
  if(isset($init)){
      
     $init; 
  }else{
      
      header("location:form");
  }
  

?>