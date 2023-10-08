<?php
	session_start();
	include "config.php";

	if(isset($_GET["del"])){
		mysqli_query($con, "delete from customer where custUid=".$_GET["del"]);
	}
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
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
  	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  	<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
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
    		<?php include "side-bar.php"; ?>
  		<br>
    		<div class="col-sm-9">
      			<div class="well">
        			<h4>Dashboard</h4>
        			<p>Welcome <b><u><?= $_SESSION["adminName"] ?></u></b></p>
      			</div>
      			<div class="row" style="padding: 5px;">
        			<?php $rs = mysqli_query($con, "select * from customer"); ?>

        			<h3>Registered Customers</h3>

        			<table id="tableID" class="display" style="width:100%">
        			<thead>
            				<tr>
				                <th>ID</th>
				                <th>Name</th>
                				<th>Email</th>
                				<th>Mobile</th>
                				<th>Address</th>
						<th>Gender</th>
                				<th></th>
            				</tr>
        			</thead>
        			<tbody>
<?php while ($row = mysqli_fetch_assoc($rs)) { ?>
            				<tr>
                				<td><?= $row['custUid'] ?></td>
                				<td><?= $row['custName'] ?></td>
                				<td><?= $row['custEmail'] ?></td>
                				<td><?= $row['custAge'] ?></td>
                				<td><?= $row['custPlace'] ?></td>
                				<td><?= $row['custGender'] ?></td>
                				<td><a href="customers.php?del=<?= $row['custUid'] ?>" class="btn btn-warning" title="Delete" onclick="return confirm('Sure you want to delete?');"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            				</tr>
<?php } ?>
				</tbody>
        			</table>
			</div>
    		</div>
  	</div>
</div>
<script>
	$(document).ready(function() {
		$('#tableID').DataTable({ });
	});
</script>
</body>
</html>
