<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'navbar.php';
include 'config.php';

$hotelUid = $_SESSION['hotelUid'];
$rs = mysqli_query($con, "select * from hotel where id=$hotelUid");
$row = mysqli_fetch_assoc($rs);
$rs = mysqli_query($con, "select * from amenities where id=$hotelUid");
$row1 = mysqli_fetch_row($rs);
?>

<html>
    <div class="col d-flex justify-content-center">
        <div class="card mb-4" style="width: 700px; margin-top:20px">
            <div class="card-body">
                <h5 class="card-title">Welcome back,
                    <?php echo $row['hotel_name']; ?>
                </h5>

                <center>
                <div class="card mb-4" style="width: 500px; margin-top:10px">
                    <img class="card-img-top" src="<?= $row[
                        'hotel_pic'
                    ] ?>" alt="Card image cap" />
                </div>
                </center>

                <p class="card-text"><small class="text-muted"><b>Name:</b> 
                    <?= $row['hotel_name'] ?>
                </small></p>

                <p class="card-text"><small class="text-muted"><b>Email:</b> 
                    <?= $row['hotel_email'] ?>
                </small></p>

                <p class="card-text"><small class="text-muted"><b>Phone:</b> 
                    <?= $row['hotel_phone'] ?>
                </small></p>

                <p class="card-text"><small class="text-muted"><b>Address:</b> 
                    <?= $row['hotel_address'] ?>
                </small></p>

                <p class="card-text"><small class="text-muted"><b>Latitude:</b> 
                    <?= $row['hotel_lat'] ?>
                </small></p>

                <p class="card-text"><small class="text-muted"><b>Longitute:</b> 
                    <?= $row['hotel_long'] ?>
                </small></p>

                <p class="card-text" style="text-align: justify;"><small class="text-muted"><b>Description:</b> 
                    <?= $row['hotel_disc'] ?>
                </small></p>

                <p class="card-text" style="text-align: justify;">
<small class="text-muted"><b>Amenities:</b>
                </small>

<table class="table table-bordered">
<tr>
	<td>1.</td><td>Designated handicap parking with a priority location in the parking lot.</td><td><?php if (
     $row1[1] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
<tr>
	<td>2.</td><td>Step free access (level or ramped) and/or lift access to main entrance.</td><td><?php if (
     $row1[2] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
<tr>
	<td>3.</td><td>Automated door opening.</td><td><?php if (
     $row1[3] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
<tr>	
	<td>4.</td><td>Ground level/lobby level accessible washroom.</td><td><?php if (
     $row1[4] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
<tr>
	<td>5.</td><td>Level or ramped access to public areas.</td><td><?php if (
     $row1[5] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
<tr>
	<td>6.</td><td>Wider entry and bathroom doorways – external 80 cm, internal 75 cm. Easy to open?</td><td><?php if (
     $row1[6] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
<tr>
	<td>7.</td><td>Mid-height light switches and power outlets</td><td><?php if (
     $row1[7] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
<tr>
	<td>8.</td><td>Lever type door handles</td><td><?php if (
     $row1[8] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
<tr>
	<td>9.</td><td>Maneuvering space on each side of the bed – 90 cm</td><td><?php if (
     $row1[9] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
<tr>
	<td>10.</td><td>Roll in shower</td><td><?php if (
     $row1[10] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
<tr>
	<td>11.</td><td>Wheeled shower chair and/or wall mounted shower seat</td><td><?php if (
     $row1[11] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
<tr>
	<td>12.</td><td>Grab bars in bathroom</td><td><?php if (
     $row1[12] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
<tr>
	<td>13.</td><td>Raised toilet</td><td><?php if (
     $row1[13] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
<tr>
	<td>14.</td><td>Proximity to markets, pubs, restaurants ... up to 500 m distant.</td><td><?php if (
     $row1[14] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
<tr>
	<td>15.</td><td>Proximity to health services.</td><td><?php if (
     $row1[15] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
</table>

            </p>

            </div>
        </div>
    </div>

    <div class="row px-2 py-2">
        <div class="col-sm-12 px-3 py-3">
            <div class="card bg-light border-light text-center">
                <h5 class="card-header">Update Profile</h5>
                <div class="card-body">
                    <p class="card-text">Update or make changes to your profile</p>
                    <a href="#updateProfile" data-bs-toggle="modal" data-target="#updateProfile" class="btn btn-primary">Update Profile</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateProfile" tabindex="-1" role="dialog" aria-labelledby="profileTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileTitle">Update Profile</h5>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12">
                            <form id="update_hotel" method="POST" action="profile-hotel-inc.php" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="mb-4">
                                    <label for="name"><b>Name</b></label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= $row[
                                        'hotel_name'
                                    ] ?>" required>
                                </div>
                                <div class="mb-4">
                                    <label for="email"><b>Email</b></label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $row[
                                        'hotel_email'
                                    ] ?>" required>
                                </div>
                                <div class="mb-4">
                                    <label for="phone"><b>Phone</b></label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="<?= $row[
                                        'hotel_phone'
                                    ] ?>" required>
                                </div>
                                <div class="mb-4">
                                    <label for="pwd"><b>Password</b></label>
                                    <input type="password" class="form-control" id="pwd" name="pwd" value="<?= $row[
                                        'hotel_pwd'
                                    ] ?>"
                                </div>
                                <div class="mb-4">
                                    <label for="address"><b>Address</b></label>
                                    <input type="text" class="form-control" id="address" name="address" value="<?= $row[
                                        'hotel_address'
                                    ] ?>" required>
                                </div>
                                <div class="mb-4">
                                    <label for="description"><b>Description</b></label>
                                    <textarea class="form-control" id="description" name="description" cols="30" rows="10" required><?= $row[
                                        'hotel_disc'
                                    ] ?></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="lat"><b>Latitude</b></label>
                                    <input type="text" class="form-control" id="lat" name="lat" value="<?= $row[
                                        'hotel_lat'
                                    ] ?>" required>
                                </div>
                                <div class="mb-4">
                                    <label for="long"><b>Longitude</b></label>
                                    <input type="text" class="form-control" id="long" name="long" value="<?= $row[
                                        'hotel_long'
                                    ] ?>" required>
                                </div>

                                <div class="mb-4">
                                    <label class="input-group-text" for="fileUpload"><b>Upload image</b></label>
                                    <input type="hidden" name="oldimg" value="<?= $row[
                                        'hotel_pic'
                                    ] ?>">
                                    <input type="file" name="fileUpload" id="fileUpload" class="form-control">
                                </div>

                                <div class="mb-4">
                                <label for=""><b>Hotel Amenities</b></label>
                                <table class="table table-bordered">
                                <tr>
                                    <td>1.</td><td>Designated handicap parking with a priority location in the parking lot.</td><td><input type="checkbox" name="op1"  value=1 <?= $row1[1] ==
                                    1
                                        ? 'checked'
                                        : '' ?>></td>
                                </tr>
                                <tr>
                                    <td>2.</td><td>Step free access (level or ramped) and/or lift access to main entrance.</td><td><input type="checkbox" name="op2"  value=1 <?= $row1[3] ==
                                    1
                                        ? 'checked'
                                        : '' ?>></td>
                                </tr>
                                <tr>
                                    <td>3.</td><td>Automated door opening.</td><td><input type="checkbox" name="op3" value=1 <?= $row1[3] ==
                                    1
                                        ? 'checked'
                                        : '' ?>></td>
                                </tr>
                                <tr>	
                                    <td>4.</td><td>Ground level/lobby level accessible washroom.</td><td><input type="checkbox" name="op4" value=1 <?= $row1[4] ==
                                    1
                                        ? 'checked'
                                        : '' ?>></td>
                                </tr>
                                <tr>
                                    <td>5.</td><td>Level or ramped access to public areas.</td><td><input type="checkbox" name="op5" value=1 <?= $row1[5] ==
                                    1
                                        ? 'checked'
                                        : '' ?>></td>
                                </tr>
                                <tr>
                                    <td>6.</td><td>Wider entry and bathroom doorways – external 80 cm, internal 75 cm. Easy to open?</td><td><input type="checkbox" name="op6" value=1 <?= $row1[6] ==
                                    1
                                        ? 'checked'
                                        : '' ?>></td>
                                </tr>
                                <tr>
                                    <td>7.</td><td>Mid-height light switches and power outlets</td><td><input type="checkbox" name="op7" value=1 <?= $row1[7] ==
                                    1
                                        ? 'checked'
                                        : '' ?>></td>
                                </tr>
                                <tr>
                                    <td>8.</td><td>Lever type door handles</td><td><input type="checkbox" name="op8" value=1 <?= $row1[8] ==
                                    1
                                        ? 'checked'
                                        : '' ?>></td>
                                </tr>
                                <tr>
                                    <td>9.</td><td>Maneuvering space on each side of the bed – 90 cm</td><td><input type="checkbox" name="op9" value=1 <?= $row1[9] ==
                                    1
                                        ? 'checked'
                                        : '' ?>></td>
                                </tr>
                                <tr>
                                    <td>10.</td><td>Roll in shower</td><td><input type="checkbox" name="op10" value=1 <?= $row1[10] ==
                                    1
                                        ? 'checked'
                                        : '' ?>></td>
                                </tr>
                                <tr>
                                    <td>11.</td><td>Wheeled shower chair and/or wall mounted shower seat</td><td><input type="checkbox" name="op11" value=1 <?= $row1[11] ==
                                    1
                                        ? 'checked'
                                        : '' ?>></td>
                                </tr>
                                <tr>
                                    <td>12.</td><td>Grab bars in bathroom</td><td><input type="checkbox" name="op12" value=1 <?= $row1[12] ==
                                    1
                                        ? 'checked'
                                        : '' ?>></td>
                                </tr>
                                <tr>
                                    <td>13.</td><td>Raised toilet</td><td><input type="checkbox" name="op13" value=1 <?= $row1[13] ==
                                    1
                                        ? 'checked'
                                        : '' ?>></td>
                                </tr>
                                <tr>
                                    <td>14.</td><td>Proximity to markets, pubs, restaurants ... up to 500 m distant.</td><td><input type="checkbox" name="op14" value=1 <?= $row1[14] ==
                                    1
                                        ? 'checked'
                                        : '' ?>></td>
                                </tr>
                                <tr>
                                    <td>15.</td><td>Proximity to health services.</td><td><input type="checkbox" name="op15" value=1 <?= $row1[15] ==
                                    1
                                        ? 'checked'
                                        : '' ?>></td>
                                </tr>
                                </table>	
                                </div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary" name="submit" id="submit">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
            alert('Hello');
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

</html>