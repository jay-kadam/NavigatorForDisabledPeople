<div class="modal fade" id="register" aria-hidden="true" aria-labelledby="registerTitle" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="registerTitle">Select Account Type</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Please select type of account to be created.
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" data-bs-target="#registerUser" data-bs-toggle="modal">Customer</button>
				<button class="btn btn-primary" data-bs-target="#registerHotel" data-bs-toggle="modal">Hotel</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade modal-lg" id="registerUser" aria-hidden="true" aria-labelledby="registerUserTitle" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="registerUserTitle">Create an Account</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="register_user" method="POST" action="register.php">
				<div class="form-row">
					<div class="mb-3">
						<input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
					</div>
					<div class="mb-3">
						<input type="email" class="form-control" id="email" name="email" placeholder="Enter you email" required>
					</div>
					<div class="mb-3">
						<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter your password" required>
					</div>
				</div>
				<div class="mb-3">
					<input type="number" class="form-control" id="age" name="age" min=18 placeholder="Enter your age" required>
				</div>
				<div class="mb-3">
					<select class="form-control" name="gender" required>
						<option value="">Select your gender</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
				</div>
				<div class="mb-3">
					<input type="placeOrigin" class="form-control" id="origin" name="origin" placeholder="Enter your place of origin" required>
				</div>
				<button type="submit" name="submitU" class="btn btn-primary">Register</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade modal-lg" id="registerHotel" aria-hidden="true" aria-labelledby="registerHotelTitle" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="registerHotelTitle">Create an Account</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="register_hotel" method="POST" action="register.php" enctype="multipart/form-data">
				<div class="form-row">
					<div class="mb-3">
						<input type="text" class="form-control" id="hName" name="hName" placeholder="Enter hotel name" required>
					</div>
					<div class="mb-3">
						<input type="text" class="form-control" id="hPhone" name="hPhone" placeholder="Enter 10 digits phone number" pattern="^[6789]\d{9}$" required>
					</div>
					<div class="mb-3">
						<input type="email" class="form-control" id="hEmail" name="hEmail" placeholder="Enter email" required>
					</div>
					<div class="mb-3">
						<input type="password" class="form-control" id="hPwd" name="hPwd" placeholder="Enter password" required>
					</div>
				</div>
				<div class="mb-3">
					<input type="text" class="form-control" id="hAdd" name="hAdd" placeholder="Enter address" required>
				</div>
				<div class="form-floating">
					<textarea class="form-control" id="hDesc" name="hDesc" style="height: 100px; resize: none;" required></textarea>
				</div>
				<div class="input-group mb-3 py-3">
					<label class="input-group-text" for="fileUpload">Upload an image of your hotel</label>
					<input type="file" name="fileUpload" id="fileUpload" class="form-control" required>
				</div>
				<div class="form-row">
					<div class="mb-3">
						<input type="text" class="form-control" id="hLat" name="hLat" pattern="^\d+.\d+$" placeholder="Enter hotel latitude" required>
					</div>
					<div class="mb-3">
						<input type="text" class="form-control" id="hLong" name="hLong" pattern="^\d+.\d+$" placeholder="Enter hotel longitude" required>
					</div>
				</div>
				<div class="form-row">
					<label for=""><b>Hotel Amenities</b></label>
					<table class="table table-bordered">
					<tr>
						<td>1.</td><td>Designated handicap parking with a priority location in the parking lot.</td><td><input type="checkbox" name="op1"  value=1></td>
					</tr>
					<tr>
						<td>2.</td><td>Step free access (level or ramped) and/or lift access to main entrance.</td><td><input type="checkbox" name="op2"  value=1></td>
					</tr>
					<tr>
						<td>3.</td><td>Automated door opening.</td><td><input type="checkbox" name="op3"  value=1></td>
					</tr>
					<tr>	
						<td>4.</td><td>Ground level/lobby level accessible washroom.</td><td><input type="checkbox" name="op4"  value=1></td>
					</tr>
					<tr>
						<td>5.</td><td>Level or ramped access to public areas.</td><td><input type="checkbox" name="op5"  value=1></td>
					</tr>
					<tr>
						<td>6.</td><td>Wider entry and bathroom doorways – external 80 cm, internal 75 cm. Easy to open?</td><td><input type="checkbox" name="op6"  value=1></td>
					</tr>
					<tr>
						<td>7.</td><td>Mid-height light switches and power outlets</td><td><input type="checkbox" name="op7"  value=1></td>
					</tr>
					<tr>
						<td>8.</td><td>Lever type door handles</td><td><input type="checkbox" name="op8"  value=1></td>
					</tr>
					<tr>
						<td>9.</td><td>Maneuvering space on each side of the bed – 90 cm</td><td><input type="checkbox" name="op9"  value=1></td>
					</tr>
					<tr>
						<td>10.</td><td>Roll in shower</td><td><input type="checkbox" name="op10"  value=1></td>
					</tr>
					<tr>
						<td>11.</td><td>Wheeled shower chair and/or wall mounted shower seat</td><td><input type="checkbox" name="op11"  value=1></td>
					</tr>
					<tr>
						<td>12.</td><td>Grab bars in bathroom</td><td><input type="checkbox" name="op12"  value=1></td>
					</tr>
					<tr>
						<td>13.</td><td>Raised toilet</td><td><input type="checkbox" name="op13"  value=1></td>
					</tr>
					<tr>
						<td>14.</td><td>Proximity to markets, pubs, restaurants ... up to 500 m distant.</td><td><input type="checkbox" name="op14"  value=1></td>
					</tr>
					<tr>
						<td>15.</td><td>Proximity to health services.</td><td><input type="checkbox" name="op15"  value=1></td>
					</tr>
					</table>	
				</div>
				<button type="submit" name="submitH" class="btn btn-primary">Register</button>
				</form>
			</div>
		</div>
	</div>
</div>