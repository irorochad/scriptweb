<?php

session_start();


include "../../config/db.php";

$msg = "";
use PHPMailer\PHPMailer\PHPMailer;

$username=$_GET['username'];
$email=$_GET['email'];



if(isset($_SESSION['email']) ){



	}



else{


  header("location:../form/signin.php");
}



include "header.php";

?>

<link rel="stylesheet" type="text/css" href="dist/css/jquery.dataTables.min.css">

<script type="text/javascript" charset="utf8" src="dist/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="dist/js/jquery.dataTables.js"></script>

<script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>


<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
<body>
<style>

				.pagination>li {
display: inline;
padding:0px !important;
margin:0px !important;
border:none !important;
}
.modal-backdrop {
  z-index: -1 !important;
}
/*
Fix to show in full screen demo
*/
iframe
{
    height:700px !important;
}

.btn {
display: inline-block;
padding: 6px 12px !important;
margin-bottom: 0;
font-size: 14px;
font-weight: 400;
line-height: 1.42857143;
text-align: center;
white-space: nowrap;
vertical-align: middle;
-ms-touch-action: manipulation;
touch-action: manipulation;
cursor: pointer;
-webkit-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;
background-image: none;
border: 1px solid transparent;
border-radius: 4px;
}

.btn-primary {
color: #fff !important;
background: #428bca !important;
border-color: #357ebd !important;
box-shadow:none !important;
}
.btn-danger {
color: #fff !important;
background: #d9534f !important;
border-color: #d9534f !important;
box-shadow:none !important;
}
				</style>
<style>
body{
	background-color: #F7F7F7;
}
</style>
        <!-- page content -->

       
 <div class="content-wrapper">
  


  <!-- Main content -->
  <section class="content">



   


       

<div class="col-md-12 col-sm-12 col-sx-12">
          <div class="box box-default">
            <div class="box-header with-border">

	<div class="row">
		<h2 class="text-center">Bootstrap styling for Datatable</h2>
	</div>

        <div class="row">

            <div class="col-md-12">



<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">



					<thead>

						<tr>
							
							<th>Email</th>
							<th>Amount(USD)</th>
              <th>Amount(BTC)</th>
              <th>Amount(ETH)</th>
							<th>Status</th>
							<th>Tnx ID</th>
							<th>Date</th>
                                <th>Edit</th>
                                 <th>Delete</th>
						</tr>
					</thead>


<?php $sql= "SELECT * FROM btc";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
				  while($row = mysqli_fetch_assoc($result)){    ?>
					<tbody>
						<tr>
							
							<td><?php echo $row['email'];?></td>
							<td><?php echo $row['usd'];?></td>
							<td><?php echo $row['btc'];?></td>
							<td><?php echo $row['eth'];?></td>
							<td><?php echo $row['status'];?></td>
              <td><?php echo $row['tnxid'];?></td>
              <td><?php echo $row['date'];?></td>
                            <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
						</tr>
						<?php
 }


			  }
			  ;?>
					</tbody>
				</table>


          </div>
		  </div>
          <!-- /top tiles -->

          </div>

                <div class="clearfix"></div>











<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " type="text" placeholder="Tiger Nixon">
        </div>
        <div class="form-group">

        <input class="form-control " type="text" placeholder="System Architect">
        </div>
        <div class="form-group">


      <input class="form-control " type="text" placeholder="Edinburgh">

        </div>
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      </div>
        </div>
    <!-- /.modal-content -->
  </div>
      <!-- /.modal-dialog -->
    </div>



    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">

       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content -->
  </div>
      <!-- /.modal-dialog -->
    </div>


    </body>
              </div>
            </div>


              </div>


          <br />


















          <div class="clearfix"></div>

        <!-- /footer content -->


   </div>
  </div>
</div>


  </body>
</html>
<script>

				$(document).ready(function() {
    $('#datatable').dataTable();

     $("[data-toggle=tooltip]").tooltip();

} );

				</script>
