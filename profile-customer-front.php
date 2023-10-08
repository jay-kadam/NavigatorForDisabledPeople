<?php
session_start();
include 'navbar.php';
include 'config.php';

$custId = $_SESSION['custUid'];

$sql = "select * from customer where custUid=$custId";

$rs = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($rs);
?>

<html>

	<div class="col d-flex justify-content-center">
		<div class="card mb-3" style="width: 700px; margin-top:20px">
			<div class="card-body">
				<h5 class="card-title">Welcome back,
					<?php echo $row['custName']; ?>
				</h5>
				<p class="card-text"><small class="text-muted"><b>Name:</b> 
					<?= $row['custName'] ?>
				</small></p>

				<p class="card-text"><small class="text-muted"><b>Email:</b> 
					<?= $row['custEmail'] ?>
				</small></p>

				<p class="card-text"><small class="text-muted">Password: ********
				</small></p>

				<p class="card-text"><small class="text-muted"><b>Age:</b> 
					<?= $row['custAge'] ?>
				</small></p>

				<p class="card-text"><small class="text-muted"><b>Gender:</b> 
					<?= $row['custGender'] ?>
				</small></p>

				<p class="card-text"><small class="text-muted"><b>Place of origin:</b> 
					<?= $row['custPlace'] ?>
				</small></p>
			</div>
		</div>
	</div>
	<div class="row px-2 py-2 justify-content-center col d-flex">
		<div class="col-sm-7 px-3 py-3">
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
						<div class="col-lg-8">
							<form id="updateProfile" method="POST" action="profile-customer-inc.php">
							<div class="form-row">
								<div class="mb-3">
									<label for="text"><b>Name</b></label>
									<input type="text" class="form-control" id="name" name="name" value="<?= $row[
             'custName'
         ] ?>" required>
								</div>
								<div class="mb-3">
									<label for="email"><b>Email</b></label>
									<input type="email" class="form-control" id="email" name="email" value="<?= $row[
             'custEmail'
         ] ?>" required>
								</div>
							</div>
							<div class="mb-3">
								<label for="pwd"><b>Password</b></label>
								<input type="password" class="form-control" id="pwd" name="pwd" value="<?= $row[
            'custPwd'
        ] ?>" required>
							</div>
							<div class="mb-3">
								<label for="age"><b>Age</b></label>
								<input type="number" class="form-control" id="age" name="age" value="<?= $row[
            'custAge'
        ] ?>" required>
							</div>
							<div class="mb-3">
								<label><b>Gender</b></label>
								<select class="form-control" name="gender" required>
								<option value="">Select your gender</option>
								<option value="Male" <?php if ($row['custGender'] == 'Male') {
            echo ' selected';
        } ?>>Male</option>
								<option value="Female" <?php if ($row['custGender'] == 'Female') {
            echo ' selected';
        } ?>>Female</option>
								</select>
							</div>
							<div class="mb-3">
								<label for="placeOrigin"><b>Place of Origin</b></label>
								<input type="placeOrigin" class="form-control" id="origin" name="origin" value="<?= $row[
            'custPlace'
        ] ?>" required>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button class="btn btn-primary" name="submit" id="submit">Save changes</button>
							</form>
				</div>
			</div>
		</div>
	</div>

</html>