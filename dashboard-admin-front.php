<?php
	session_start();
	include 'config.php';

	$rs = mysqli_query($con, 'select count(*) from customer');
	$row = mysqli_fetch_row($rs);
	$noc = $row[0];

	$rs = mysqli_query($con, 'select count(*) from hotel');
	$row = mysqli_fetch_row($rs);
	$noh = $row[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  	<style>
		.row.content {height: 550px}
		.sidenav {
			background-color: #f1f1f1;
      			height: 100%;
    		}
        
    		@media screen and (max-width: 767px) {
      			.row.content {height: auto;} 
    		}
  	</style>
</head>
<body>
<div class="container-fluid">
	<div class="row content">
		<?php include 'side-bar.php'; ?>
		<br>
    		<div class="col-sm-8">
      			<div class="well">
        			<h4>Dashboard</h4>
        			<p>Welcome Admin <b><u><?= $_SESSION['adminName'] ?></u></b></p>
      			</div>
      			<div class="row">
        			<div class="col-sm-4">
          				<div class="well">
            					<h4>Total Customers</h4>
            					<p><i class="fa fa-user" aria-hidden="true"></i> <?= $noc ?></p> 
          				</div>
        			</div>
        			<div class="col-sm-4">
          				<div class="well">
            					<h4>Total Hotels</h4>
            					<p><i class="fa-solid fa-hotel"></i> <?= $noh ?></p> 
          				</div>
        			</div>
      			</div>
    		</div>
  	</div>
</div>
</body>
</html>
