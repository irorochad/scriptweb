<?php

  


////////

	$sql_qry1="SELECT SUM(moni) AS count FROM wbtc  WHERE email=$email ";

$duration1 = $link->query($sql_qry1);
while($record1 = $duration1->fetch_array()){
    $withdraw = $record1['count'];
	}
	
	
	
////////

	$sql_qry="SELECT SUM(usd) AS counter FROM btc ";

if($duration = $link->query($sql_qry)){
while($record = $duration->fetch_array()){
    $deposit = $record['counter'];
	}
}else{
				$deposit = 0  ;
			  }
	
	
?>


