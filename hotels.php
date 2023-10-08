<?php
	session_start();
	include "config.php";

	if(isset($_GET["del"])){
		mysqli_query($con, "delete from hotel where hotel_id=".$_GET["del"]);
	}

	if(isset($_GET["status"])){
		$status = $_GET["status"]==0?1:0;
		mysqli_query($con, "update hotel set status=$status where id=".$_GET["id"]);		
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
        			<?php $rs = mysqli_query($con, "select * from hotel"); ?>

        			<h3>Registered Customers</h3>

        			<table id="tableID" class="display" style="width:100%">
        			<thead>
            				<tr>
				                <th></th>
				                <th>Name</th>
                				<th>Address</th>
						<th>Phone</th>
                				<th>Email</th>
                				<th>Status</th>
						<th>Amenities</th>
                				<th></th>
            				</tr>
        			</thead>
        			<tbody>
<?php while ($row = mysqli_fetch_assoc($rs)) { ?>
            				<tr>
						<td><img src="<?=$row['hotel_pic']?>" width="150" height="100"></td>
                				<td><?= $row['hotel_name'] ?></td>
                				<td><?= $row['hotel_address'] ?></td>
                				<td><?= $row['hotel_phone'] ?></td>
                				<td><?= $row['hotel_email'] ?></td>
                				<td><a href="hotels.php?status=<?=$row['status']?>&id=<?=$row['id']?>"><?=$row['status']==0?"Not Verified":"Verified"?>
                				<td><a href="#myModal" data-toggle="modal" data-id="<?=$row['id']?>" class="btn-block"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                				<td><a href="hotels.php?del=<?=$row['id']?>" title="Delete" onclick="return confirm('Sure you want to delete?');"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
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


<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
        		<div class="modal-header">
          			<button type="button" class="close" data-dismiss="modal">&times;</button>
          			<h4 class="modal-title">Hotel Amenities</h4>
        		</div>
        		<div class="modal-body" id="result">
          			
        		</div>
        		<div class="modal-footer">
          			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        		</div>
      		</div>
      
	</div>
</div>

<script>
	$('.btn-block').on('click',function(){
    		var id = $(this).data('id');
		$('.modal-body').html('loading');
		$.ajax({
        		type: 'POST',
        		url: 'get-amenities.php?id='+id,
        		data:{id: id},
        		success: function(data) {
          			$('.modal-body').html(data);
        		},
        		error:function(err){
          			alert("error"+JSON.stringify(err));
        		}
    		});
 	});
</script>
</body>
</html>
